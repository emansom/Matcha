<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->shortname = GameConfiguration::getString('site.shortname');
        $this->view->fullname = GameConfiguration::getString('site.fullname');
        $this->view->t = $this->translation;
        $this->view->logged_in = $this->session->has('user_id');
        $this->view->footer_text = strtr(GameConfiguration::getString('site.footer'), [
            '%shortname%' => $this->view->shortname,
            '%fullname%'  => $this->view->fullname
        ]);

        if ($this->view->logged_in) {
            $this->view->user = \Users::findFirst(
                [
                    'conditions' => 'id = ?1',
                    'bind' => [
                        1 => $this->session->get('user_id')
                    ],
                    'limit' => 1
                ]
            );
        }

        // TODO: verify getBestLanguage with available languages
        $fmt = new \NumberFormatter($this->request->getBestLanguage(), \NumberFormatter::DECIMAL);
        $this->view->online_count = $fmt->format($this->rcon->getOnlineCount());
    }
}
