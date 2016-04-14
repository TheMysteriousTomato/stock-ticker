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

    public function register()
    {

        $url = 'http://bsx.jlparry.com/register/';

        $post_data = array(
            'team' => urlencode($this->input->post('team')),
            'name' => urlencode($this->input->post('name')),
            'password' => urlencode($this->input->post('password'))
        );

        // url-ify the data for the POST
        $post_string = "";
        foreach($post_data as $key=>$value) { $post_string .= $key.'='.$value.'&'; }
        rtrim($post_string, '&');

        // open connection
        $curl = curl_init();

        // set the url, number of POST vars, POST data
        curl_setopt($curl,CURLOPT_URL, $url);
        curl_setopt($curl,CURLOPT_POST, count($post_data));
        curl_setopt($curl,CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // execute post
        $result = curl_exec($curl);

        // close connection
        curl_close($curl);

        $this->output->set_content_type('text/xml');
        $this->output->set_output($result);
    }

    public function buystock()
    {
        // POST: /buy
        /* DATA:
            team: your team code - s12
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