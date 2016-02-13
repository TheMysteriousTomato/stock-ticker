<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movement extends Application
{

    public function getMovements($code)
    {
        $movements = $this->movements->displayMovements($code);
        $data['json'] = json_encode($movements);
        $this->load->view('templates/_json', $data);
    }

    public function getMostRecent()
    {
        $recent = $this->movements->latestMovement();
        $data['json'] = json_encode($recent);
        $this->load->view('templates/_json', $data);
    }
}