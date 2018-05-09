<?php

class TopbarController extends ControllerBase
{
    public function getBalanceAction()
    {
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
}