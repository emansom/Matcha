<?php

class AuthenticationController extends ControllerBase
{
    public function loginAction()
    {
        // Never cache the served page
        $this->response->setHeader("Cache-Control", "private, no-cache, no-store, max-age=0, must-revalidate");

        // Redirect to homepage if already logged in
        if ($this->session->has("user_id")) {
            return $this->response->redirect("/");
        }

        $this->view->setMainView("login");

        if ($this->request->isPost()) {
            // Sanitize input
            // TODO: handle -=?!@:. in username
            $username = $this->filter->sanitize($this->request->getPost('username', 'string'), 'trim');
            $password = $this->filter->sanitize($this->request->getPost('password', 'string'), 'trim');

            // Assign sanitized input to view
            $this->view->username = $username;
            $this->view->password = $password;

            $loginErrors = [];

            if (mb_strlen($username) == 0 || mb_strlen($password) == 0) {
                $loginErrors[] = 'Please enter your username and password';
            }

            // Do not continue if there are validation errors
            if (count($loginErrors) > 0) {
                $this->view->login_errors = $loginErrors;
                return;
            }

            // Check if username exists (match case-insensitive)
            $user = Users::findFirst([
                "LOWER(username) = :username:",
                "bind" => [
                    'username' => mb_strtolower($username)
                ],
                'limit' => 1
            ]);

            // If a user is found, check if password matches
            if ($user && $this->security->checkHash($password, $user->password)) {
                // Check if we need a rehash
                if ($this->security->needsRehash($user->password)) {
                    $user->password = $this->security->hash($password);
                    $user->save();
                }

                // Clear password from memory securely
                $this->security->memZeroPassword($password);

                // Regenerate session id to protect from session hijacking
                $this->session->regenerateId(true);
                $this->session->set("user_id", $user->id);

                return $this->response->redirect("/");
            }

            // Protect from timing attacks
            $this->security->hash(rand());

            $this->view->login_errors = ['Wrong username or password'];
        }
    }

    public function logoutAction()
    {
        $this->view->disable();

        // Destroy session and cache
        if ($this->session->has("user_id")) {
            $this->modelsCache->delete('user-' . $this->session->getId());

            $this->session->regenerateId(true);
            $this->session->destroy(true);
        }

        return $this->response->redirect("/");
    }
}

