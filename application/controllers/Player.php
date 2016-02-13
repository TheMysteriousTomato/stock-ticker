<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Application {

    /**
     * Displays the last recently active Player.
     */
    public function index()
    {
        /* Grab data from database for Transactions and Players */
        $this->data['transactions'] = $this->transactions->getAllTransactions();

        $this->data['players'] = $this->players->getAllPlayers();
        $this->load->helper('form');

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

        $form       = form_open('player/display');
        $player_cash  = array();
        $player_names  = array();
        $players     = $this->players->getAllPlayers();

        foreach( $players as $item )
        {
            array_push($player_names, $item->Player);
            array_push($player_cash, $item->Cash);

        }
        $players = array_combine($player_names, $player_names);

        $select                 = form_dropdown('player',
            $players, $latestPlayer,
            "class = 'form-control'" .
            "onchange = 'this.form.submit()'");

        $this->data['form']     = $form;
        $this->data['select']   = $select;
        $this->data['ptrans'] = $this->transactions->getPlayerTransactions($latestPlayer);
        $this->data['holdings'] = $this->transactions->getCurrentHoldings($latestPlayer);

        $this->render();
    }

    /**
     * Displays a Player based on an post request of the dropdown menu.
     */
    public function display()
    {
        $this->data['transactions'] = $this->transactions->getAllTransactions();
        $this->data['players'] = $this->players->getAllPlayers();
        $this->load->helper('form');
        $code = $this->input->post('player');
        $this->data['Playername'] = $code;

        $this->data['title'] = "Stock Ticker";
        $this->data['left-panel-content'] = 'player/players';
        $this->data['right-panel-content'] = 'player/transactions';
        $this->data['player_code'] = $code;

        $form       = form_open('player/display');
        $player_cash  = array();
        $player_names  = array();
        $players     = $this->players->getAllPlayers();

        foreach( $players as $item )
        {
            array_push($player_names, $item->Player);
            array_push($player_cash, $item->Cash);

        }

        $players = array_combine($player_names, $player_names);

        $select                 = form_dropdown('player',
            $players,
            $code,
            "class = 'form-control'" .
            "onchange = 'this.form.submit()'");

        $this->data['form']     = $form;
        $this->data['select']   = $select;
        $this->data['ptrans'] = $this->transactions->getPlayerTransactions($code);
        $this->data['holdings'] = $this->transactions->getCurrentHoldings($code);

        $this->render();
    }

    /**
     * Grabs the current holdings of a Player and returns it as a JSON object.
     * @param $name
     */
    public function getTransactions($name) {
        $transactions = $this->transactions->getCurrentHoldings($name);
        $keys = array_keys($transactions[0]);
        $values = array_values($transactions[0]);

        $dataPoints = array();
        foreach($values as $value)
        {
            $arr = array();
            array_push($arr, $value);
            array_push($dataPoints, $arr);
        }

        $result = array();

        array_push($result, $keys);
        array_push($result, $dataPoints);

        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
}