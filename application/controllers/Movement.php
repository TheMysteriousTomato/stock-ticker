<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movement extends Application
{

    public function getMovements($code)
    {
        $movements = $this->movements->displayMovements($code);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($movements);

    }

    public function getMostRecent()
    {
        $recent = $this->movements->latestMovement();
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($recent);
    }
}