<?php
/**
 * Created by PhpStorm.
 * User: jondeluz
 * Date: 2016-02-10
 * Time: 3:41 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends Application {


    public function index()
    {
        //$data['stocks'] = $this->stocks->getAllStocks();
        //$this->load->view('stock/index');

        $this->data['title'] = "Stocks";
        $this->data['pagebody'] = 'stock/index';
        $this->data['left-panel-content'] = 'stock/index';
        //$this->data['right-panel-content'] = 'stock/index';

        $this->data['stocks'] = $this->stocks->getAllStocks();
        $this->render();
    }

    public function search(){
        $code = $this->input->post('dropdown');
        redirect('stock/display/' . $code);
    }

    public function display($code){
        $data['transactions'] = $this->transactions->displayTransactions($code);
        $data['movements'] = $this->movements->displayMovements($code);

        $this->load->view('stock/display', $data);
    }
}