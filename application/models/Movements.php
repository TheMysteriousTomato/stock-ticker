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

        if (!empty($result))
            return $result[0]["Code"];
        else
        {
            $this->db->select('Code');
            $this->db->from('stocks');
            $this->db->limit(1);
            $query = $this->db->get();

            $result = $query->result_array();

            return $result[0]["Code"];
        }
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

    function add($record)
    {
        // convert object to associative array, if needed
        if (is_object($record)) {
            $data = get_object_vars($record);
        } else {
            $data = $record;
        }
        //2016.02.01-09:01:56
        $ts = $data["datetime"];
        $date = new DateTime("@$ts");
        $data['datetime'] = $date->format('Y.m.d-H:i:s');

        $this->db->where('seq',$data["seq"]);
        $q = $this->db->get('movements');

        if ( $q->num_rows() == 0 )  {
            // update the DB table appropriately
            $key = $data[$this->_keyField];
            $this->db->set($data);
            $this->db->insert_id();
            $object = $this->db->insert($this->_tableName, $data);
        }
    }
}
