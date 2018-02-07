<?php
class ClubController extends ControllerBase
{
    public function indexAction()
    {
        return $this->dispatcher->forward([
            'controller' => 'club',
            'action'     => 'benefits'
        ]);
    }

    public function benefitsAction()
    {
        // Cache club page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
    }

    public function joinAction()
    {
    }

    public function shopAction()
    {
    }
}
