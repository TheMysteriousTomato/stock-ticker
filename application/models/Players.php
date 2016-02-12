<?php

class Players extends MY_Model
{
    // constructor
    function __construct()
    {
        parent::__construct('players', 'Player');
    }

    function getAllPlayers(){
        return $this->all();
    }

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
}