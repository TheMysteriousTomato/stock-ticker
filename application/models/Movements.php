<?php

class Movements extends MY_Model2
{
    function __construct()
    {
        parent::__construct('movements', 'seq', 'Datetime');
    }

    /**
     * Grabs and displays the Movements grouped by the given stock.
     *
     * @param $code
     * @return mixed
     */
    function displayMovements($code)
    {

        return $this->group($code);
    }

    /**
     * Grabs the latest Movement.
     *
     * @return mixed
     */
    function latestMovement()
    {
      
        $movements = $this->getCSV();
        foreach($movements as $movement){
          $this->add($movement);
        }

        $this->db->select('Code');
        $this->db->from('movements');
        $this->db->order_by('Datetime', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        $result = $query->result_array();
        return $result[0]["Code"];
    }

}
