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
        $status = $this->getStatus();

        $state = $status["state"];

        if($status !== false) {
            if(strcmp($state, "2") == 0 || strcmp($state, "3") == 0)
            {
                $this->clearTable();
                $csvStocks = $this->getCsvStocks();
                $this->clearTable();
                foreach($csvStocks as $csv)
                {
                    $this->addCSV($csv);
                }
            }

            else if(strcmp($state, "0") == 0 || strcmp($state, "1") == 0 || strcmp($state, "4") == 0)
            {
                $this->clearTable();
            }
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
