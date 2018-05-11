<?php
class ClubController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setMainView('club/index');
    }

    public function joinAction()
    {
        $this->view->setMainView('club/join');
    }

    public function shopAction()
    {
        $this->view->setMainView('club/shop');
    }
}
