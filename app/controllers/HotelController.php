<?php

class HotelController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->pick('hotel/index');
    }

    public function welcomeAction()
    {
        $this->view->pick('hotel/welcome');
    }

    public function tourAction()
    {
        $this->view->pick('hotel/tour');
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
