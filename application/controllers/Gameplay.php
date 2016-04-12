<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gameplay extends Application {

    /**
     * Index Page for the Homepage controller.
     */
    public function index()
    {

        $playername = $this->session->userdata('username');
        $player = $this->players->some('Player', $playername);

        if(!(empty($player))) {
            $player = $player[0];
            $this->data['PlayerName'] = $playername;
            $this->data['Cash'] = $player->Cash;
            $this->data['Equity'] = $this->players->getEquity($playername);
        }
        else {
           // TODO: If not logged in display error page??
        }

        /* Set up data to render page */
        $this->data['title'] = "Gameplay";
        $this->data['left-panel-content'] = 'gameplay/status.php';
        $this->data['right-panel-content'] = 'gameplay/actions.php';

        $this->render();
    }
}