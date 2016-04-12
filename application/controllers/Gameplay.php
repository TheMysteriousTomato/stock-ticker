<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gameplay extends Application {

    /**
     * Index Page for the Homepage controller.
     */
    public function index()
    {

        /* Set up data to render page */
        $this->data['title'] = "Gameplay";
        $this->data['left-panel-content'] = 'gameplay/status.php';
        $this->data['right-panel-content'] = 'gameplay/actions.php';

        $this->render();
    }
}