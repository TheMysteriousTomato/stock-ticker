<?php

class Stocks extends MY_Model
{
    // constructor
    function __construct()
    {
        parent::__construct('stocks','Code');
    }

    function getAllStocks(){
        return $this->all();
    }


}