<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movement extends Application
{

    public function getMovements($code)
    {
        $movements = $this->movements->displayMovements($code);
        header('application/json');
        echo json_encode($movements);
    }

    public function getMostRecent()
    {
        $recent = $this->movements->latestMovement();
        header('application/json');
        echo json_encode($recent);
    }
}