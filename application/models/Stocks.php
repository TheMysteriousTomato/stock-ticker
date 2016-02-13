<?php

class Stocks extends MY_Model
{
    // constructor
    function __construct()
    {
        parent::__construct('stocks','Code');
    }

    function getAllStocks()
    {
        $stocks = $this->all();

        /* Add additional attributes to each Stock */
        foreach ($stocks as $stock)
        {
            // Add a link to each stock's history page
            $stock->href = '/stock/display/' . $stock->Code;
        }

        return $stocks;

    }

    function getRecentStock()
    {
        $key = $this->movements->latestMovement();
        return $this->get($key);
    }

}
