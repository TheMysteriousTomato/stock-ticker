<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Application {

    /**
     * Index Page for the Homepage controller.
     */
    public function index()
    {
        /* Grab data from database for Stocks and Players */
        $this->data['stocks']  = $this->stocks->getAllStocks();
        $this->data['players'] = $this->players->getAllPlayers();
        //$this->data['status']  = $this->managements->getServerStatus();
        //print_r($this->managements->getServerStatus());
        /* Set up data to render page */
        $this->data['title'] = "Stock Ticker";
        $this->data['left-panel-content'] = 'base/players.php';
        $this->data['right-panel-content'] = 'base/stocks.php';

        $this->render();
    }
}
