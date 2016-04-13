<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends Application {

    /**
     * Displays the latest movement of a stock.
     */
    public function index()
    {
        $this->getStatus();
        $stock     = $this->stocks->getRecentStock();
        $trans     = $this->stocks->getSalesTransactions($stock->Code);
        $stocks    = $this->stocks->getAllStocksForDisplay();
        $stockinfo = array('Name'     => $stock->Name,
                           'Code'     => $stock->Code,
                           'Category' => $stock->Category,
                           'Value'    => money_format("$%i", $stock->Value));

        /* Set up data to render page */
        $this->data['title']               = "Stocks ~ $stock->Code";
        $this->data['left-panel-content']  = 'stock/index';
        $this->data['right-panel-content'] = 'stock/sales';
        $this->data['trans']               = $trans;
        $this->data['info']                = array($stockinfo);
        $this->data['form']                = form_open('stock/display');
        $this->data['select']              = form_dropdown('stock',
                                                            $stocks,
                                                            $stock->Code,
                                                            "class = 'form-control'" .
                                                            "onchange = 'this.form.submit()'");
        $this->render();
    }

    /**
     * Displays the details of the requested stock.
     */
    public function display()
    {
        /* Either get stock from submit/url */
        if(!(empty($this->input->post('stock'))))
        {
            $code = $this->input->post('stock');
        }
        else
        {
            $code = $this->uri->segment(3);
        }

        $stocks    = $this->stocks->getAllStocksForDisplay();
        $stock     = $this->stocks->get($code);
        $stockinfo = array('Name'     => $stock->Name,
                           'Code'     => $stock->Code,
                           'Category' => $stock->Category,
                           'Value'    => money_format("$%i", $stock->Value));

        /* Set up data to render page */
        $this->data['title']               = "Stocks ~ $code";
        $this->data['left-panel-content']  = 'stock/index';
        $this->data['right-panel-content'] = 'stock/sales';
        $this->data['stock_code']          = $code;
        $this->data['trans']               = $this->stocks->getSalesTransactions($code);
        $this->data['info']                = array($stockinfo);
        $this->data['form']                = form_open('stock/display');
        $this->data['select']              = form_dropdown('stock',
                                                          $stocks,
                                                          $code,
                                                          "class = 'form-control'" .
                                                          "onchange = 'this.form.submit()'");

        $this->render();
    }

}
