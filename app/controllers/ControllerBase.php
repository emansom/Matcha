<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->t = $this->translation;
        $this->view->logged_in = $this->session->has('user_id');

        if ($this->session->has('user_id')) {
            // TODO: use ORM cache
            $this->view->user = \Users::findFirst(
                [
                    'conditions' => 'id = ?1',
                    'bind' => [
                        1 => $this->session->get('user_id')
                    ],
                    'cache' => [
                        'key' => 'user-' . $this->session->getId(),
                        'lifetime' => 3600
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
