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

        // Check if we're using an NPAPI capable browser
        $capableBrowser = $result->isBrowser('Pale Moon') || $result->isBrowser('Chrome', '<=', '44') || $result->isBrowser('Firefox', '<=', '52');

        // If browser is not an NPAPI capable browser or if platform is not Windows, serve client instructions
        if (!$capableBrowser || !$result->isOs('Windows')) {
            $this->view->setMainView('client-instructions');
            return;
        }

        // Does the user want to go to a specific room?
        //$forwardType = $this->request->getQuery("forwardType", "int");
        //$forwardType = $this->request->getQuery("forwardId", "int");

        // Regenerate SSO if logged in
        if ($this->session->has('user_id')) {
            $userId = $this->view->user->id;

            // TODO: cast createRoom integer to enum value of RCON
            // TODO: create starter room if not existing
            // if (!$this->rcon->hasStarterRoom($userId)) {
            //     // Returns value from $_GET["createRoom"] with sanitizing
            //     $chosenTheme = $this->request->getQuery("createRoom", "int");
            //
            //     if ($chosenTheme == 0) {
            //         $this->view->setMainView('client/starter-room-picker');
            //         return;
            //     }
            //
            //
            //     list($createdRoomId, $error) = $this->rcon->createStarterRoom($userId, $theme);
            //
            //     if ($error !== null) {
            //         // log error
            //
            //         // Inform user we couldn't create starter room
            //     }
            //
            //     $forwardType = 2;
            //     $forwardId = $createdRoomId;
            // }

            // Generate new SSO
            $token = $this->security->getToken();

            // Find user in database
            $user = \Users::findFirst($this->session->get('user_id'));
            $user->sso_ticket = $token;

            // Update user in database and throw exception if it fails
            if ($user->update() !== true) {
                throw new \Phalcon\Exception('Could\'nt update SSO of user ' . $this->view->user->username);
            }

            // Update in view
            $this->view->user->sso_ticket = $token;
        }

        // Assign gamedata
        $this->view->dcr = GameConfiguration::getString('loader.dcr');
        $this->view->external_variables = GameConfiguration::getString('loader.external_variables');
        $this->view->external_texts = GameConfiguration::getString('loader.external_texts');
        $this->view->server_host = GameConfiguration::getString('loader.server_host');
        $this->view->server_port = GameConfiguration::getInteger('loader.server_port');
        $this->view->mus_host = GameConfiguration::getString('loader.mus_host');
        $this->view->mus_port = GameConfiguration::getInteger('loader.mus_port');
        //$this->view->forward_id = $forwardId;
        //$this->view->forward_type = $forwardType;

        $this->view->setMainView('client');
    }
}
