<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->pick('home');
    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->view->pick('404');
    }

    public function privacyPolicyAction()
    {
        $this->view->pick('privacy_policy');
    }

    public function termsAndConditionsAction()
    {
        $this->view->pick('terms_and_conditions');
    }

    public function clientAction()
    {
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

        $this->view->pick('client');
    }
}
