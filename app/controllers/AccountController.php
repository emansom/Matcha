<?php

class AccountController extends ControllerBase
{
    public function loginAction()
    {
        $this->view->pick('login/login');

        // Redirect to homepage if already logged in
        if ($this->session->has("user_id")) {
            return $this->response->redirect("/");
        }

        if ($this->request->isPost()) {
            $username = $this->request->getPost("username");
            $password = $this->request->getPost("password");

            if ($username === "") {
                $this->flash->error('Please enter your username');
                //pick up the same view to display the flash session errors
                return $this->view->pick("login");
            }

            if ($password === "") {
                $this->flash->error('Please enter your password');
                //pick up the same view to display the flash session errors
                return $this->view->pick("login");
            }

            $user = Users::findFirst([
                "conditions" => "username = ?0",
                "bind" == [
                    0 => $username
                ]
            ]);

            if ($user) {
                if ($this->security->checkHash($password, $user->password)) {
                    // Check if we need a rehash
                    if ($this->security->needsRehash($user->password)) {
                        $user->password = $this->security->hash($password);
                        $user->save();
                    }

                    // Clear password from memory securely
                    $this->security->memZeroPassword($password);

                    $this->session->regenerateId(true);
                    $this->session->set("user_id", $user->id);

                    return $this->response->redirect("/");
                }
            } else {
                // To protect against timing attacks. Regardless of whether a user exists or not, the script will take roughly the same amount as it will always be computing a hash.
                $this->security->hash(rand());

                $this->flash->error("Wrong username or password");
                //pick up the same view to display the flash session errors
                return $this->view->pick("login");
            }
        }
    }

    public function logoutAction()
    {
        $this->view->disable();

        // Redirect to homepage if already logged in
        if ($this->session->has("user_id")) {
            $this->session->regenerateId(true);
            $this->session->destroy(true);
        }

        return $this->response->redirect("/");
    }
}

