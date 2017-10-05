<?php
class RegisterController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->pick('register/register');
    }
}