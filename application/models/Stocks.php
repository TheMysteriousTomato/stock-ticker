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
      
        $this->clearTable();
        $csvStocks = $this->getCsvStocks();
          $this->clearTable();
          foreach($csvStocks as $csv){
            $this->addCSV($csv);
          }

        $stocks = $this->all();

        /* Add additional attributes to each Stock */
        foreach ($stocks as $stock)
        {
            // Add a link to each stock's history page
            $stock->href = '/stock/display/' . $stock->Code;
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
            $stock->href = '/stock/display/' . $stock->Code;
            array_push($stock_codes, $stock->Code);
            array_push($stock_names, $stock->Name);
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
