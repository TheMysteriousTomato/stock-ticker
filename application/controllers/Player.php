<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {

    /**
     * Displays the last recently active Player.
     */
    public function index()
    {
        $this->load->helper('form');
        /* Grab data from database for Transactions and Players */
        $this->data['transactions'] = $this->transactions->getAllTransactions();
        $this->data['players'] = $this->players->getAllPlayers();

        /* Set up data to render page */
        $this->data['title'] = "Stock Ticker";
        $this->data['left-panel-content'] = 'player/players';
        $this->data['right-panel-content'] = 'player/transactions';

        /* Grabbing username if logged in */
        if(empty($this->session->userdata('username'))) {
            $latestPlayer = $this->transactions->latestTransaction();
        } else
            $latestPlayer = $this->session->userdata('username');

        $this->data['Playername'] = $latestPlayer;

        $players_select         = $this->players->getPlayersForSelect();
        $select                 = form_dropdown('player',
                                                $players_select, $latestPlayer,
                                                "class = 'form-control'" .
                                                "onchange = 'this.form.submit()'");
        $this->data['form']     = form_open('player/display');
        $this->data['select']   = $select;
        $this->data['ptrans']   = $this->transactions->getPlayerTransactions($latestPlayer);
        $this->data['holdings'] = $this->transactions->getCurrentHoldings($latestPlayer);

        $this->render();
    }

    /**
     * Displays a Player based on an post request of the dropdown menu.
     */
    public function display()
    {
        $this->load->helper('form');
        $this->data['transactions'] = $this->transactions->getAllTransactions();
        $this->data['players'] = $this->players->getAllPlayers();
        $code = $this->input->post('player');
        $this->data['Playername'] = $code;
        $this->data['title'] = "Stock Ticker";
        $this->data['left-panel-content'] = 'player/players';
        $this->data['right-panel-content'] = 'player/transactions';
        $this->data['player_code'] = $code;

        $players_select      = $this->players->getPlayersForSelect();

        $select              = form_dropdown('player',
                                             $players_select,
                                             $code,
                                             "class = 'form-control'" .
                                             "onchange = 'this.form.submit()'");
        $this->data['form']     = form_open('player/display');
        $this->data['select']   = $select;
        $this->data['ptrans']   = $this->transactions->getPlayerTransactions($code);
        $this->data['holdings'] = $this->transactions->getCurrentHoldings($code);

        $this->render();
    }

    /**
     * Grabs the current holdings of a Player and returns it as a JSON object.
     * @param $name
     */
    public function getTransactions($name) {
        $transactions = $this->players->getTransactionsArray($name);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($transactions);
    }
}