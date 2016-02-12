<?php

class Movements extends MY_Model2
{
    // constructor
    function __construct()
    {
        parent::__construct('movements', 'Code', 'Datetime');
    }

    function displayMovements($code)
    {
        return $this->group($code);
    }

    function latestMovement()
    {
        $this->db->select('Code');
        $this->db->from('movements');
        $this->db->order_by('Datetime', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();

        $result = $query->result_array();
        return $result[0]["Code"];
    }

}