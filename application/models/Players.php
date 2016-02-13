<?php

class Players extends MY_Model
{
    function __construct()
    {
        parent::__construct('players', 'Player');
    }

    /**
     * Grabs all the Players.
     *
     * @return array
     */
    function getAllPlayers(){
        $players = $this->all();

        /* Add additional attributes to each Player */
        foreach ($players as $player)
        {
            // Grab each equity
            $player->Equity = $this->players->getEquity($player->Player);

            // Add a link to each player's portfolio
            $player->href = '/player/display/' . $player->Player;
        }

        return $players;
    }

    /**
     * Calculates the current equity of the requested Player
     *
     * @param $player
     * @return int
     */
    public function getEquity($player)
    {
        $resultset = null;

        $this->db->select('*');
        $this->db->from('transactions t');
        $this->db->join('stocks s', 's.Code=t.Stock', 'left');
        $this->db->join('players p', 'p.Player=t.Player', 'left');
        $this->db->where('t.Player', $player);
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            $resultset = $query->result_array();
        }
        $result = 0;

        if($resultset != null)
        {
            foreach($resultset as $key => $value)
            {
                if($value['Trans'] == 'buy')
                    $result += $value['Quantity'] * $value['Value'];
                elseif($value['Trans'] == 'sell')
                    $result -= $value['Quantity'] * $value['Value'];
            }
            $result += $resultset[0]['Cash'];
        }
        return $result;
    }

    /**
     * Generate the required array to create the dropdown select for Players.
     *
     * @return array
     */
    public function getPlayersForSelect()
    {
        $players = $this->getAllPlayers();
        $player_cash  = array();
        $player_names  = array();

        foreach( $players as $item )
        {
            array_push($player_names, $item->Player);
            array_push($player_cash, $item->Cash);

        }
        $players = array_combine($player_names, $player_names);

        return $players;
    }

    /**
     * Grabs the current holdings and creates a new friendly array for JSON object.
     *
     * @param $name
     * @return array
     */
    public function getTransactionsArray($name)
    {
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
        return $result;
    }

    /**
     * Grabs the latest transaction from the database
     * @return mixed
     */
    public function latestTransaction(){
        return $this->transactions->latestTransaction();
    }

    /**
     * Grabs all transactions from the database
     * @return mixed
     */
    public function getAllTransactions(){
        return $this->transactions->getAllTransactions();
    }

    /**
     * Grabs all transactions for the specified player
     * @param $latestPlayer
     * @return mixed
     */
    public function getPlayerTransactions($latestPlayer){
        return $this->transactions->getPlayerTransactions($latestPlayer);
    }

    /**
     * Grabs all stocks for the specified player
     * @param $latestPlayer
     * @return mixed
     */
    public function getCurrentHoldings($latestPlayer){
        return $this->transactions->getCurrentHoldings($latestPlayer);
    }
}