<?php

class HotelController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setMainView('hotel/index');
    }

    public function welcomeAction()
    {
        $this->view->setMainView('hotel/welcome');
    }

    public function tourAction()
    {
        $this->view->setMainView('hotel/tour');
    }

    public function furnitureAction()
    {

    }

    public function petsAction()
    {

    }

    public function homesAction()
    {

    }

    public function webAction()
    {

    }

    public function gamesAction()
    {

    }

    public function badgesAction()
    {

    }

    public function teamAction()
    {

    }
}
