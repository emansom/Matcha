<?php

class TopbarController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        // Never cache the top bar pages, as they might contain user data
        $this->response->setHeader("Cache-Control", "private, no-cache, no-store, max-age=0, must-revalidate");
    }

    public function getBalanceAction()
    {
        // TODO: Redirect to / if not logged in
        $this->view->disable();
        $credits = $this->view->user->credits;

         if ($credits > 0) {
            $fmt = new \NumberFormatter($this->request->getBestLanguage(), \NumberFormatter::DECIMAL);
            $this->response->setContent('You have <span id="amount-credits" class="amount habbocredits">'. $fmt->format($credits) .'</span> credits');
        } else {
            $this->response->setContent('You have no Credits');
        }

        $this->response->send();
    }

    public function getClubDaysAction()
    {
        $this->view->disable();

        // TODO: implement HC

        // $hc = $mysql->GetUser($_SESSION['username'], 'hc');
        //  if ($hc > 0) {
        //     return print 'You have <span id="amount-credits" class="amount">'. $hc .'</span> days left in your subscription';
        // } else {
            $this->response->setContent('You are not subscribed to Club.');
        //}

        $this->response->send();
    }

    public function onlineCountAction()
    {
        $this->view->disable();

        $this->response->setContent($this->view->online_count . ' members online');
        $this->response->send();
    }

    public function userDetailsAction()
    {
        $this->view->disable();

        if (!$this->view->logged_in) {
            $this->response->setJsonContent(new stdClass());
            $this->response->send();
            return;
        }

        $user = $this->view->user;

        $this->response->setJsonContent([
            'user' => [
                "username" => $user->username
            ]
        ]);

        $this->response->send();
    }
}
