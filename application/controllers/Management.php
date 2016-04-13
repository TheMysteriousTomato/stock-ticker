<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends Application {

    /**
     * Index Page for the Management controller.
     */
    public function index()
    {
        $players = $this->players->getAllPlayers();
        $player  = $this->session->userdata('username');
        $playerz = $this->players->some('Player', $player);
        $player = $playerz[0];

        foreach($players as $key => $val)
            if ($val->id == $player->id)
                unset($players[$key]);

        $this->data["players"] = $players;
        $this->data["player"]  = array($player);

        /* Set up data to render page */
        $this->data['title'] = "Management";
        $this->data['left-panel-content'] = 'management/player-managements.php';
        $this->data['right-panel-content'] = 'management/agent-managements.php';

        $this->render();
    }
}