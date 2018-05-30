<?php
class RegisterController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        // Never cache the served page
        $this->response->setHeader("Cache-Control", "private, no-cache, no-store, max-age=0, must-revalidate");

        // Redirect to homepage if already logged in
        if ($this->session->has("user_id")) {
            return $this->response->redirect("/");
        }
    }

    public function pickLookAction()
    {
        if ($this->request->isPost()) {
            // TODO: validate figure
            // TODO: use proper Phalcon validators

            $figure = $this->request->getPost('figure', 'string', $this->config->newUser->figure); // TODO: preg_replace to only allow numeric and '-', '.' characters
            $this->session->set("register-figure", $figure);

            $gender = $this->request->getPost("gender", 'string', $this->config->newUser->gender);
            $this->session->set("register-gender", $gender);

            return $this->response->redirect('/register/enter-details');
        }

        if ($this->session->has('register-gender')) {
            $this->view->gender = $this->session->get('register-gender');
        } else {
            $this->view->gender = $this->config->newUser->gender;
        }

        if ($this->session->has('register-figure')) {
            $this->view->figure = $this->session->get('register-figure');
        } else {
            $this->view->figure = $this->config->newUser->figure;
        }

        $this->view->setMainView('register/pick-look');
    }

    public function detailsAction()
    {
        if ($this->request->isPost()) {
            // Sanitize input
            $username = $this->filter->sanitize($this->request->getPost('username', 'string'), 'alphanum');
            $password = $this->request->getPost('password', 'striptags');
            $retypedPassword = $this->request->getPost('retypedPassword', 'striptags');

            // Assign sanitized input to view
            $this->view->username = $username;
            $this->view->password = $password;
            $this->view->retypedPassword = $retypedPassword;

            $registrationErrors = [];

            // TODO: view errors
            if (mb_strlen($username) == 0) {
                $registrationErrors[] = 'Please enter your username';
            }

            if (mb_strlen($password) == 0) {
                $registrationErrors[] = 'Please enter your password';
            }

            if (mb_strlen($retypedPassword) == 0) {
                $registrationErrors[] = 'Please retype your password';
            }

            if ($password != $retypedPassword) {
                $registrationErrors[] = 'Passwords don\'t match';
            }

            // Do not continue if there are validation errors
            if (count($registrationErrors) > 0) {
                $this->view->register_errors = $registrationErrors;
                return;
            }

            // Check if username already exists (match case-insensitive)
            $user = \Users::findFirst([
                "LOWER(username) = :username:",
                "bind" => [
                    'username' => mb_strtolower($username)
                ],
                'limit' => 1
            ]);

            // If user already exists, show error, else create user
            if ($user) {
                $this->view->register_errors = ['Sorry, the name you picked is already in use.'];
            } else {
                $user = new \Users();
                $user->username = $username;
                $user->password = $this->security->hash($password);
                $user->motto = $this->config->newUser->motto;
                $user->credits = $this->config->newUser->credits;
                $user->tickets = $this->config->newUser->tickets;
                $user->film = $this->config->newUser->film;
                $user->rank = $this->config->newUser->rank;
                $user->console_motto = $this->config->newUser->consoleMotto;
                $user->last_online = 0;
                $user->sso_ticket = '';
                $user->pool_figure = '';
                $user->club_subscribed = 0;
                $user->club_expiration = 0;
                $user->badge = $this->config->newUser->badges[0];
                $user->badge_active = sizeof($this->config->newUser->badges) > 0;
                $user->allow_stalking = $this->config->newUser->allowStalking;

                // If user chose an gender in the previous page, use that, else use default
                if ($this->session->has('register-gender')) {
                    $user->sex = $this->session->get('register-gender');
                } else {
                    $user->sex = $this->config->newUser->gender;
                }

                // If user chose an figure in the previous page, use that, else use default
                if ($this->session->has('register-figure')) {
                    $user->figure = $this->session->get('register-figure');
                } else {
                    $user->figure = $this->config->newUser->figure;
                }

                // Try to create user, if this fails; show error in view
                // TODO: log create error
                if (!$user->create()) {
                    $this->view->register_errors = ['Unable to create user, contact administrator'];
                } else {
                    // User has been created!

                    // Add badges for new user
                    $badges = [];
                    $i = 0;

                    foreach ($this->config->newUser->badges as $badge) {
                        $badges[$i] = new UsersBadges();
                        $badges[$i]->user_id = $user->id;
                        $badges[$i]->badge = $badge;
                        $badges[$i]->create();
                        $i++;
                    }

                    // Let ORM know about badges
                    $user->badges = $badges;
                    $user->update();

                    // Regenerate session id to protect from session hijacking
                    $this->session->regenerateId(true);
                    $this->session->set("user_id", $user->id);

                    return $this->response->redirect('/');
                }
            }
        }
    }
}
