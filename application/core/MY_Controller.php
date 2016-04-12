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
        $this->data['date']  = date('l\, F jS Y');
        $this->errors        = array();

        $players_link = '<button type="button" class="btn btn-info">Players</button>';
        $stocks_link = '<button type="button" class="btn btn-info">Stocks</button>';
        $gameplays_link = '<button type="button" class="btn btn-info">Gameplay</button>';
        $managements_link = '<button type="button" class="btn btn-info">Management</button>';

        $this->data['stocks_link'] = anchor('stock', $stocks_link, 'title="List of All the Stocks"');
        $this->data['players_link'] = anchor('player', $players_link, 'title="List of All the Players"');
        $this->data['gameplays_link'] = anchor('gameplay', $gameplays_link, 'title="Gameplay"');
        $this->data['managements_link'] = anchor('management', $managements_link, 'title="Management"');

    }

    /**
     * Render this page
     */
    function render() {


        if(empty($this->session->userdata('username'))) {
            $this->data['login_control'] = $this->parser->parse('templates/_login_control', $this->data, true);
        } else {
            $data = array('username' => $this->session->userdata('username'), 'avatar' => $this->session->userdata('avatar'));
            $this->data['login_control'] = $this->parser->parse('templates/_logout_control', $data, true);

        }
//        $this->data['header'] = $this->parser->parse('templates/_header', $this->data, true);

        $mychoices = array('menudata' => $this->makemenu());
        $this->data['menubar'] = $this->parser->parse('templates/_menubar', $mychoices, true);
        $this->data['header'] = $this->parser->parse('templates/_header', $this->data, true);
        
        $this->data['left-panel']  = $this->parser->parse($this->data['left-panel-content'], $this->data, true);
        $this->data['right-panel'] = $this->parser->parse($this->data['right-panel-content'], $this->data, true);

        $this->data['content'] = $this->parser->parse('templates/_content', $this->data, true);
        $this->data['footer']  = $this->parser->parse('templates/_footer', $this->data, true);

        // finally, build the browser page!
        $this->data['data'] = &$this->data;
        $this->parser->parse('templates/_master', $this->data);
    }

    function makemenu(){
        $choices = array();
        $userRole = $this->session->userdata('role');
        
        if(strcmp($userRole, ROLE_PLAYER)==0){
            $choices[] = array('name' => "Stock", 'link' => '/stock');
            $choices[] = array('name' => "Player", 'link' => '/player');
            $choices[] = array('name' => "Gameplay", 'link' => '/gameplay');
        }else{
            $choices[] = array('name' => "Stock", 'link' => '/stock');
            $choices[] = array('name' => "Player", 'link' => '/player');
            $choices[] = array('name' => "Gameplay", 'link' => '/gameplay');
            $choices[] = array('name' => "Management", 'link' => '/management');

        }
        return $choices;

    }
    
    
}
