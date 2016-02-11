<?php

class Players extends MY_Model
{
    // constructor
    function __construct()
    {
        parent::__construct('players', 'Player');
    }

    function getAllPlayers(){
        return $this->all();
    }

}