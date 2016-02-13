<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Movement extends Application
{
    /**
     * Retrieves the data from the Movements table and groups them by codename of the stocks.
     *
     * @param $code codename of a stock
     */
    public function getMovements($code)
    {
        $movements = $this->movements->displayMovements($code);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($movements);
    }

    /**
     * Retrieves the most up to date record in the Movements table.
     */
    public function getMostRecent()
    {
        $recent = $this->movements->latestMovement();
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($recent);
    }
}