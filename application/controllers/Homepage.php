<?php
/**
 * Created by PhpStorm.
 * User: jondeluz
 * Date: 2016-02-09
 * Time: 1:22 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Application {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /players.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        /* Grab data from database for Stocks and Players */
        $this->data['stocks'] = $this->stocks->getAllStocks();
        $this->data['players'] = $this->players->getAllPlayers();

        /* Set up data to render page */
        $this->data['title'] = "Stock Ticker";
        $this->data['left-panel-content'] = 'base/players.php';
        $this->data['right-panel-content'] = 'base/stocks.php';
        $this->render();
    }
}