<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->t = $this->di->getTranslation();
        $this->view->loggedIn = $this->di->getSession()->has('user_id');

        // TODO: verify getBestLanguage with available languages
        $fmt = new \NumberFormatter($this->request->getBestLanguage(), \NumberFormatter::DECIMAL);
        $this->view->onlineCount = $fmt->format($this->rcon->getOnlineCount());
    }
}
