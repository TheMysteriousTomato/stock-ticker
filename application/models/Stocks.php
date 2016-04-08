<?php

class Stocks extends MY_Model
{
    function __construct()
    {
        parent::__construct('stocks','code');
    }

    /**
     * Grabs all of the Stocks.
     *
     * @return array
     */
    function getAllStocks()
    {
        $stocks = $this->all();
        //print_r($stocks);

        /* Add additional attributes to each Stock */
        foreach ($stocks as $stock)
        {
            // Add a link to each stock's history page
            $stock->href = '/stock/display/' . $stock->code;
        }

        return $stocks;
    }

    function getAllStocksForDisplay()
    {
        $stock_codes = array();
        $stock_names = array();

        $stocks = $this->all();

        /* Add additional attributes to each Stock */
        foreach ($stocks as $stock)
        {
            // Add a link to each stock's history page
            $stock->href = '/stock/display/' . $stock->code;
            array_push($stock_codes, $stock->code);
            array_push($stock_names, $stock->name);
        }

        $stocks = array_combine($stock_codes, $stock_names);

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

    /**
     * Grabs all transactions for the stock
     * @param $code
     * @return mixed
     */
    function getSalesTransactions($code){
        return $this->transactions->getSalesTransactions($code);
    }
}
