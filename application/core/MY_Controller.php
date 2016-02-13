<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2015, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct() {
        parent::__construct();
        $this->data          = array();
        $this->data['title'] = '?';
        $this->data['date'] = date('l\, F jS Y');
        $this->errors        = array();

        $players_link = '<button type="button" class="btn btn-info">Players</button>';
        $stocks_link = '<button type="button" class="btn btn-info">Stocks</button>';
        $this->data['stocks_link'] = anchor('stock', $stocks_link, 'title="List of All the Stocks"');
        $this->data['players_link'] = anchor('player', $players_link, 'title="List of All the Players"');
    }

    /**
     * Render this page
     */
    function render() {

        if(empty($this->session->userdata('username'))) {
            $this->data['login_control'] = $this->parser->parse('templates/_login_control', $this->data, true);
        } else {
            $data = array('username' => $this->session->userdata('username'));
            $this->data['login_control'] = $this->parser->parse('templates/_logout_control', $data, true);

        }
        $this->data['header'] = $this->parser->parse('templates/_header', $this->data, true);


        $this->data['left-panel']  = $this->parser->parse($this->data['left-panel-content'], $this->data, true);
        $this->data['right-panel'] = $this->parser->parse($this->data['right-panel-content'], $this->data, true);

        $this->data['content'] = $this->parser->parse('templates/_content', $this->data, true);
        $this->data['footer']  = $this->parser->parse('templates/_footer', $this->data, true);

        // finally, build the browser page!
        $this->data['data'] = &$this->data;
        $this->parser->parse('templates/_master', $this->data);
    }

}
