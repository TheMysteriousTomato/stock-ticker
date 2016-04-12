<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends Application {

    /**
     * Index Page for the Homepage controller.
     */
    public function index()
    {

        /* Set up data to render page */
        $this->data['title'] = "Management";
        $this->data['left-panel-content'] = 'management/player-managements.php';
        $this->data['right-panel-content'] = 'management/agent-managements.php';

        $this->render();
    }
}