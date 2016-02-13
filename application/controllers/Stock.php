<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends Application {

    /**
     * Displays the latest movement of a stock.
     */
    public function index()
    {
        $this->load->helper('form');

        $this->data['title'] = "Stocks";
        $this->data['left-panel-content']  = 'stock/index';
        $this->data['right-panel-content'] = 'stock/sales';

        $stock = $this->stocks->getRecentStock();

        $trans = $this->transactions->getSalesTransactions($stock->Code);

        $form        = form_open('stock/display');

        $stocks      = $this->stocks->getAllStocksForDisplay();



        $select = form_dropdown('stock',
                                $stocks,
                                $stock->Code,
                                "class = 'form-control'" .
                                "onchange = 'this.form.submit()'");

        $this->data['Name']     = $stock->Name;
        $this->data['Code']     = $stock->Code;
        $this->data['Category'] = $stock->Category;
        $this->data['Value']    = money_format("$%i", $stock->Value);

        $this->data['form']     = $form;
        $this->data['select']   = $select;

        //hokey
        $this->data['src'] = "../assets/js/stock-history.js";

        $this->data['trans'] = $trans;

        $this->render();
    }

    /**
     * Displays the details of the requested stock.
     */
    public function display()
    {
        $this->load->helper('form');

        if(!(empty($this->input->post('stock'))))
        {
            $code = $this->input->post('stock');
            $this->data['src'] = "../assets/js/stock-history.js";
        }
        else {
            $code = $this->uri->segment(3);
            $this->data['src'] = "../../assets/js/stock-history.js";
        }

        $this->data['title'] = "Stocks ~ $code";
        $this->data['left-panel-content'] = 'stock/index';
        $this->data['right-panel-content'] = 'stock/sales';
        $this->data['stock_code'] = $code;

        $this->data['trans'] = $this->transactions->getSalesTransactions($code);

        $form        = form_open('stock/display');
        $stocks      = $this->stocks->getAllStocksForDisplay();
        $stock       = $this->stocks->get($code);



        $select                 = form_dropdown('stock',
                                                $stocks,
                                                $code,
                                                "class = 'form-control'" .
                                                "onchange = 'this.form.submit()'");

        $this->data['Name']     = $stock->Name;
        $this->data['Code']     = $stock->Code;
        $this->data['Category'] = $stock->Category;
        $this->data['Value']    = money_format("$%i", $stock->Value);

        $this->data['form']     = $form;
        $this->data['select']   = $select;
        $this->render();
    }

}