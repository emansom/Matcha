<?php

class AccountController extends ControllerBase
{
    public function loginAction()
    {
        // Never cache the served page
        $this->response->setHeader("Cache-Control", "private, no-cache, no-store, max-age=0, must-revalidate");

        // Redirect to homepage if already logged in
        if ($this->session->has("user_id")) {
            return $this->response->redirect("/");
        }

        if ($this->request->isPost()) {
            $username = $this->request->getPost("username");
            $password = $this->request->getPost("password");

            if ($username === "") {
                $this->view->login_errors = ['Please enter your username'];
                return $this->view->setMainView("login");
            }

            if ($password === "") {
                $this->view->login_errors = ['Please enter your password'];
                return $this->view->setMainView("login");
            }

            $user = Users::findFirst([
                "username = :username:",
                "bind" => [
                    'username' => $username
                ],
                'limit' => 1
            ]);

            // If a user is found, check if password matches
            if ($user !== null && $this->security->checkHash($password, $user->password)) {
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

        return $this->view->setMainView("login");
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

