<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
        $this->view->setMainView('home');
    }

    public function notFoundAction()
    {
        $this->response->setHeader("Cache-Control", "private, no-cache, no-store, max-age=0, must-revalidate");
        $this->response->setStatusCode(404, 'Not Found');
        $this->view->setMainView('404');
    }

    public function privacyPolicyAction()
    {
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
        $this->view->setMainView('privacy_policy');
    }

    public function termsAndConditionsAction()
    {
        $this->response->setHeader("Cache-Control", "max-age=30, stale-while-revalidate=3600");
        $this->view->setMainView('terms_and_conditions');
    }

    public function clientAction()
    {
        $this->response->setHeader("Cache-Control", "private, no-cache, no-store, max-age=0, must-revalidate");

        if (!$this->rcon->ping()) {
            $this->view->setMainView('client-closed');
            return;
        }

        $result = new WhichBrowser\Parser($this->request->getHeaders());

        if (!$result->isBrowser('Pale Moon') || !$result->isOs('Windows')) {
            $this->view->setMainView('client-instructions');
            return;
        }

        // Regenerate SSO if logged in
        if ($this->session->has('user_id')) {
            // Generate new SSO
            $token = $this->security->getToken();

            // Update in database
            $user = \Users::findFirst($this->session->get('user_id'));
            $user->sso_ticket = $token;
            $user->update(); // TODO: disable SSO in view if update() doesn't return true

            // Update in view
            $this->view->user->sso_ticket = $token;
        }

        // Assign gamedata
        $this->view->dcr = $this->config->client->dcr;
        $this->view->external_variables = $this->config->client->externalVariables;
        $this->view->external_texts = $this->config->client->externalTexts;
        $this->view->server_host = $this->config->emulator->serverExternalHost;
        $this->view->server_port = $this->config->emulator->serverPort;
        $this->view->mus_host = $this->config->emulator->serverExternalHost;
        $this->view->mus_port = $this->config->emulator->musPort;

        $this->view->setMainView('client');
    }
}
