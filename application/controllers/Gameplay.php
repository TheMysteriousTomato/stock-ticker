<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gameplay extends Application {

    /**
     * Index Page for the Gameplay controller.
     */
    public function index()
    {

        $playername = $this->session->userdata('username');
        $player = $this->players->some('Player', $playername);

        if(!(empty($player))) {
            // Portfolio
            $player = $player[0];
            $this->data['PlayerName'] = $playername;
            $this->data['Cash'] = $player->Cash;
            $this->data['Equity'] = $this->players->getEquity($playername);

            // Stocks
            $this->data['Stocks'] = $this->stocks->getAllStocks();
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

    public function two()
    {
        // Game Status
        $gamestatus_url = 'http://bsx.jlparry.com/status';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $gamestatus_url);

        $response = curl_exec($curl);

        $gamestatus_xml = simplexml_load_string($response);

        return $gamestatus_xml;
    }

    public function buystock()
    {
        // POST: /buy
        /* DATA:
            team: your team code
            token: your agent authentication token
            player: the name of your player
            stock: the code of the stock your player wishes to purchase
            quantity: the number of that stock that the player wishes to purchase
        */

        //TODO: decrease player's cash
        //TODO: save certificates
        //TODO: update transactions


        // IF THE PLAYER HAS SUFFICIENT CASH

        /* RESPONSE:
            team: your team identifier
            player: your player's name
            stock: stock code
            quantity: # of shares on this certificate
            certificate: unique certificate number
        */
    }

    public function sellstock()
    {
        // POST: /sell
        /* DATA:
            team: your team code
            token: your agent authentication token
            player: the name of your player
            stock: the code of the stock your player wishes to sell
            quantity: the number of that stock that the player wishes to sell
            certificate: code for stock certificate being surrendered; there can be more than one of these
        */

        //TODO: increase player's cash
        //TODO: save certificates
        //TODO: update transactions
    }
}