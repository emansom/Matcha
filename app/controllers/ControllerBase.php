<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->t = $this->di->getTranslation();
        $this->view->s = $this->di->getSession();
        $this->view->onlineCount = '1,337'; // TODO: query via RCON and use Internationalization

        // TODO: verify getBestLanguage
        // better TODO: contribute validation for getBestLanguage to Phalcon
        //$fmt = new \NumberFormatter($this->request->getBestLanguage(), \NumberFormatter::DECIMAL);

    }
}
