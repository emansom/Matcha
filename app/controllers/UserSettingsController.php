<?php

class UserSettingsController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        // Never cache the served page
        $this->response->setHeader("Cache-Control", "private, no-cache, no-store, max-age=0, must-revalidate");

        // Redirect to homepage if not logged in
        if (!$this->session->has("user_id")) {
            return $this->response->redirect("/");
        }
    }

    public function updateLookAction()
    {
        $this->view->setMainView('profile/update-look');

        if ($this->request->isPost()) {
            // Get submitted gender and figure, default to current user' figure and gender
            $figure = $this->request->getPost("figure", null, $this->view->user->figure);
            $gender = strtoupper($this->request->getPost("gender", null, $this->view->user->sex));

            // TODO: validate gender
            // TODO: output error to view
            if ($gender != 'M' && $gender != 'F') {
                return;
            }

            $user = Users::findFirst([
                "id = :id:",
                "bind" => [
                    'id' => $this->session->get('user_id')
                ],
                'limit' => 1
            ]);

            if ($user) {
                $user->figure = $figure;
                $user->sex = $gender;
                $user->pool_figure = '';

                // Update in database
                $user->update(); // TODO: check return value and show error in view if false

                // Remove cached user model from modelCache to force flush
                // TODO: check if cache exists first
                $this->modelsCache->delete('user-' . $this->session->getId());

                // Update in hotel via RCON
                $this->rcon->refreshLook($user->id);

                // Update in view
                $this->view->user->figure = $figure;
                $this->view->user->sex = $gender;

                // TODO: update succesful message in view
            }
        }
    }
}
