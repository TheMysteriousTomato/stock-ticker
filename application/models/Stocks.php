<?php

class Stocks extends MY_Model
{
    function __construct()
    {
        parent::__construct('stocks','Code');
    }

    /**
     * Grabs all of the Stocks.
     *
     * @return array
     */
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

    /**
     * Grabs the most recent Stock.
     *
     * @return null|object
     */
    function getRecentStock()
    {
        $key = $this->movements->latestMovement();
        return $this->get($key);
    }
}
