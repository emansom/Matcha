<?php
class ClubController extends ControllerBase
{
    public function indexAction()
    {
        // Cache club page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");

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
