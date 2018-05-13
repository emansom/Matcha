<?php
class RegisterController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        // Redirect to homepage if already logged in
        if ($this->session->has("user_id")) {
            return $this->response->redirect("/");
        }
    }

    public function pickLookAction()
    {
        if ($this->session->has('register-gender')) {
            $this->view->gender = $this->session->get('register-gender');
        } else {
            $this->view->gender = $this->config->newUser->defaultGender;
        }

        if ($this->session->has('register-figure')) {
            $this->view->figure = $this->session->get('register-figure');
        } else {
            $this->view->figure = $this->config->newUser->defaultFigure;
        }

        $this->view->setMainView('register/pick-look');
    }

    public function saveLookAction()
    {
        if (!$this->request->isPost()) {
            return;
        }

        // TODO: validate figure
        // TODO: use proper Phalcon validators

        $figure = $this->request->getPost("figure", null, $this->config->newUser->defaultFigure);
        $this->session->set("register-figure", $figure);

        $gender = $this->request->getPost("gender", null, $this->config->newUser->defaultGender);
        $this->session->set("register-gender", $gender);

        return $this->response->redirect('/register/enter-details');
    }

    public function detailsAction()
    {
        $this->view->setMainView('register/details');
    }

    public function registerAction()
    {
        if (!$this->request->isPost()) {
            return;
        }

        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        // TODO: view errors
        // if ($username === "") {
        //     $this->view->login_errors = ['Please enter your username'];
        //     return $this->view->setMainView("login");
        // }
        //
        // if ($password === "") {
        //     $this->view->login_errors = ['Please enter your password'];
        //     return $this->view->setMainView("login");
        // }

        // Check if username already exists (match case-insensitive)
        $user = \Users::findFirst([
            "username = :username:",
            "bind" => [
                'username' => $username
            ],
            'limit' => 1
        ]);

        // User doesn't exist! yay! Create it!
        if (!$user) {
            $user = new \Users();
            $user->username = $username;
            $user->password = $this->security->hash($password);
            $user->motto = $this->config->newUser->defaultMotto;
            $user->credits = $this->config->newUser->defaultCredits;
            $user->tickets = $this->config->newUser->defaultTickets;
            $user->film = $this->config->newUser->defaultFilm;
            $user->rank = $this->config->newUser->defaultRank;
            $user->console_motto = $this->config->newUser->defaultConsoleMotto;
            $user->last_online = 0;
            $user->pool_figure = '';
            $user->club_subscribed = 0;
            $user->club_expiration = 0;
            $user->active_badge = '';

            if ($this->session->has('register-gender')) {
                $user->sex = $this->session->get('register-gender');
            } else {
                $user->sex = $this->config->newUser->defaultGender;
            }

            if ($this->session->has('register-figure')) {
                $user->figure = $this->session->get('register-figure');
            } else {
                $user->figure = $this->config->newUser->defaultFigure;
            }

            // TODO: show error in view
            if (!$user->create()) {
                $this->view->disable();

                echo json_encode($user->getMessages());
            } else {
                // Regenerate session id to protect from session hijacking
                $this->session->regenerateId(true);
                $this->session->set("user_id", $user->id);

                return $this->response->redirect('/');
            }
        }
    }
}