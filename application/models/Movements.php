<?php

class Movements extends MY_Model2
{
    // constructor
    function __construct()
    {
        parent::__construct('movements', 'Code', 'Datetime');
    }

    function displayMovements($code){
        return $this->group($code);
    }
}