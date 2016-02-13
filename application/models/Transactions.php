<?php

class Transactions extends MY_Model2
{
    function __construct()
    {
        parent::__construct('transactions', 'Stock', 'Player');
    }

    /**
     * Displays the transactions grouped by the given Stock.
     *
     * @param $code
     * @return mixed
     */
    function displayTransactions($code){
        return $this->group($code);
    }

    /**
     * Grabs the latest Transaction.
     *
     * @return mixed
     */
    function latestTransaction()
    {
        $this->db->select('Player');
        $this->db->from('transactions');
        $this->db->order_by('Datetime', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        $result = $query->result_array();
        return $result[0]["Player"];
    }

    /**
     * Get all the Transactions.
     *
     * @return array
     */
    function getAllTransactions()
    {
        $transactions = $this->all();

        /* Add additional attributes to each Stock */
        foreach ($transactions as $transaction)
        {
            // Add a link to each stock's history page
            $transaction->href = '/transaction/' . $transaction->DateTime;
        }

        return $transactions;
    }

    /**
     * Grabs the Transactions of the given Player.
     *
     * @param $player
     * @return array
     */
    public function getPlayerTransactions($player){

        $this->db->select('*');
        $this->db->from('transactions t');
        $this->db->where('t.Player', $player);
        $query = $this->db->get();
        $noData = array();
        $noPlayer = [
            "DateTime" => "N/A",
            "Player"   => "N/A",
            "Stock"    => "N/A",
            "Trans"    => "N/A",
            "Quantity" => "N/A",
        ];
        array_push($noData, $noPlayer);

        if($query->num_rows() != 0)
        {
            $resultset = $query->result_array();
        }else{
            $resultset = $noData;
        }

        return $resultset;
    }

    /**
     * Joins the Transactions and Stocks together and returns the result set.
     *
     * @param $stock
     * @return array
     */
    public function getSalesTransactions($stock){

        $this->db->select('*');
        $this->db->from('transactions t');
        $this->db->where('t.Stock', $stock);
        $query = $this->db->get();

        $item = [
            "DateTime" => "N/A",
            "Player"   => "N/A",
            "Stock"    => "N/A",
            "Trans"    => "N/A",
            "Quantity" => "N/A"
        ];

        $resultset = array();

        array_push($resultset, $item);

        if($query->num_rows() != 0)
        {
            $resultset = $query->result_array();
        }

        return $resultset;
    }

    /**
     * Calculates the current holdings of the given Player.
     *
     * @param $player
     * @return array
     */
    public function getCurrentHoldings($player){
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
        $resultBond = 0;
        $resultGold = 0;
        $resultGrain = 0;
        $resultInd = 0;
        $resultOil = 0;
        $resultTech = 0;
        $resultArray = Array();

        if($resultset != null)
        {
            foreach($resultset as $key => &$value)
            {
                if($value['Stock'] == "BOND") {
                    if ($value['Trans'] == 'buy')
                        $resultBond += $value['Quantity'];
                    elseif ($value['Trans'] == 'sell')
                        $resultBond -= $value['Quantity'];
                } else if($value['Stock'] == "GOLD") {
                    if ($value['Trans'] == 'buy')
                        $resultGold += $value['Quantity'];
                    elseif ($value['Trans'] == 'sell')
                        $resultGold -= $value['Quantity'];
                } else if($value['Stock'] == "GRAN") {
                    if ($value['Trans'] == 'buy')
                        $resultGrain += $value['Quantity'];
                    elseif ($value['Trans'] == 'sell')
                        $resultGrain -= $value['Quantity'];
                }else if($value['Stock'] == "IND") {
                    if ($value['Trans'] == 'buy')
                        $resultInd += $value['Quantity'];
                    elseif ($value['Trans'] == 'sell')
                        $resultInd -= $value['Quantity'];
                }else if($value['Stock'] == "OIL") {
                    if ($value['Trans'] == 'buy')
                        $resultOil += $value['Quantity'];
                    elseif ($value['Trans'] == 'sell')
                        $resultOil -= $value['Quantity'];
                }else if($value['Stock'] == "TECH") {
                    if ($value['Trans'] == 'buy')
                        $resultTech += $value['Quantity'];
                    elseif ($value['Trans'] == 'sell')
                        $resultTech -= $value['Quantity'];
                }
            }

        }

        $resultArray = [
            "BOND" => $resultBond,
            "GOLD" => $resultGold,
            "GRAN" => $resultGrain,
            "IND" => $resultInd,
            "OIL" => $resultOil,
            "TECH" => $resultTech
        ];

        $holdings = array();
        array_push($holdings, $resultArray);

        return $holdings;
    }

}