<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {

    /**
     * Displays the last recently active Player.
     */
    public function index()
    {
        /* Grabbing username if logged in */
        if(empty($this->session->userdata('username')))
        {
            $latestPlayer = $this->players->latestTransaction();
        } else
        {
            $latestPlayer = $this->session->userdata('username');
        }

        /* Grab data from database for Transactions and Players */
        $this->data['transactions'] = $this->players->getAllTransactions();
        $this->data['players']      = $this->players->getAllPlayers();

        /* Set up data to render page */
        $this->data['title'] = "Players ~ $latestPlayer";
        $this->data['left-panel-content']  = 'player/players';
        $this->data['right-panel-content'] = 'player/transactions';
        $this->data['Playername'] = $latestPlayer;
        $this->data['ptrans']     = $this->players->getPlayerTransactions($latestPlayer);
        $this->data['holdings']   = $this->players->getCurrentHoldings($latestPlayer);
        $this->data['form']       = form_open('player/display');
        $this->data['select']     = form_dropdown('player',
                                                  $this->players->getPlayersForSelect(),
                                                  $latestPlayer,
                                                  "class = 'form-control'" .
                                                  "onchange = 'this.form.submit()'");
        $this->render();
    }

    /**
     * Displays a Player based on an post request of the dropdown menu.
     */
    public function display()
    {
        $name = $this->input->post('player');

        $this->data['title']               = "Player ~ $name";
        $this->data['left-panel-content']  = 'player/players';
        $this->data['right-panel-content'] = 'player/transactions';
        $this->data['Playername']          = $name;
        $this->data['player_code']         = $name;
        $this->data['ptrans']              = $this->players->getPlayerTransactions($name);
        $this->data['holdings']            = $this->players->getCurrentHoldings($name);
        $this->data['transactions']        = $this->players->getAllTransactions();
        $this->data['players']             = $this->players->getAllPlayers();
        $this->data['form']                = form_open('player/display');
        $this->data['select']              = form_dropdown('player',
                                                           $this->players->getPlayersForSelect(),
                                                           $name,
                                                           "class = 'form-control'" .
                                                           "onchange = 'this.form.submit()'");
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