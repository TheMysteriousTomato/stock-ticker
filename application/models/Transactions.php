<?php

class Transactions extends MY_Model2
{
    // constructor
    function __construct()
    {
        parent::__construct('transactions', 'Stock', 'Player');
    }

    function displayTransactions($code){
        return $this->group($code);
    }
}