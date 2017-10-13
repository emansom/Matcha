<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->setMainView('home');
    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->view->setMainView('404');
    }

    public function privacyPolicyAction()
    {
        $this->view->setMainView('privacy_policy');
    }

    public function termsAndConditionsAction()
    {
        $this->view->setMainView('terms_and_conditions');
    }

    public function clientAction()
    {
        // TODO: show hotel closed page if RCON ping doesn't return true
        
        // Regenerate SSO if logged in
        if ($this->session->has('user_id')) {
            // Generate new SSO
            $token = $this->security->getToken();

            // Update in database
            $user = \Users::findFirst($this->session->get('user_id'));
            $user->sso_ticket = $token;
            $user->update(); // TODO: throw exception if doesn't return true, and disable SSO in view

            // Update in view
            $this->view->user->sso_ticket = $token;
        }

        // Assign gamedata
        $this->view->dcr = $this->config->client->dcr;
        $this->view->external_variables = $this->config->client->external_variables;
        $this->view->external_texts = $this->config->client->external_texts;

        $this->view->setMainView('client');
    }
}
