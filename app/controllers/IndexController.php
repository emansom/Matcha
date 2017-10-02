<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->pick('index/index');
    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->view->pick('404/404');
    }

    public function privacyPolicyAction()
    {
        $this->view->pick('index/privacy_policy');
    }

    public function termsAndConditionsAction()
    {
        $this->view->pick('index/terms_and_conditions');
    }

    public function atlasController()
    {
        $this->view->pick('index/atlas');
    }
}
