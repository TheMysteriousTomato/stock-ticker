<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movement extends Application
{

    public function getMovements($code)
    {
        $movements = $this->movements->displayMovements($code);
        $this->load->view('templates/_json', json_encode($movements));
    }

    public function getMostRecent()
    {
        $recent = $this->movements->latestMovement();
        $this->load->view('templates/_json', json_encode($recent));
    }
}