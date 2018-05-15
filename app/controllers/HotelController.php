<?php

class HotelController extends ControllerBase
{
    public function indexAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");

        $this->view->setMainView('hotel/index');
    }

    public function welcomeAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");

        $this->view->setMainView('hotel/welcome');
    }

    public function tourAction()
    {
        // Cache club page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");

        $this->view->setMainView('hotel/tour');
    }

    public function furnitureAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
    }

    public function petsAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
    }

    public function homesAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
    }

    public function webAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
    }

    public function gamesAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
    }

    public function badgesAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
    }

    public function teamAction()
    {
        // Cache page for 30 seconds, with a 1 hour grace period
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
    }
}
