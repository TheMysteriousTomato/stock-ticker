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
//        var_dump($this);
//        die();
//        return $this->group($code);
        return $this->movements->some('Code', $code);
    }

    /**
     * Grabs the latest Movement.
     *
     * @return mixed
     */
    function latestMovement()
    {
        if(SERVER) {
            $movements = $this->getCSV();
            $this->clearTable();

            foreach ($movements as $movement) {
                $this->add($movement);
            }
        }

        $this->db->select('Code');
        $this->db->from('movements');
        $this->db->order_by('Datetime', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        $result = $query->result_array();
        return $result[0]["Code"];
    }

    function latest5Movements()
    {
        $this->db->from('movements');
        $this->db->order_by('Datetime', 'desc');
        $this->db->limit(5, 0);
        $query = $this->db->get();

        $result = $query->result_array();
        return $result;
    }
}
