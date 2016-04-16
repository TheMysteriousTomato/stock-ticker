<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gameplay extends Application
{

    /**
     * Index Page for the Gameplay controller.
     */
    public function index()
    {

        $playername = $this->session->userdata('username');
        $player = $this->players->some('Player', $playername);

        if (!(empty($player))) {
            // Portfolio
            $player = $player[0];
            $this->data['PlayerName'] = $playername;
            $this->data['Cash'] = $player->Cash;
            $this->data['Equity'] = $this->players->getEquity($playername);

            // Stocks
            $this->data['Stocks'] = $this->stocks->getAllStocks();
        } else {
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
        if (SERVER) {
            $gameState = $this->managements->getServerStatus();

            if (strcmp($gameState["state"], "2")) {
                $url = 'http://bsx.jlparry.com/register/';

                $post_data = array(
                    'team' => urlencode($this->input->post('team')),
                    'name' => urlencode($this->input->post('name')),
                    'password' => urlencode($this->input->post('password'))
                );

                // url-ify the data for the POST
                $post_string = "";
                foreach ($post_data as $key => $value) {
                    $post_string .= $key . '=' . $value . '&';
                }
                rtrim($post_string, '&');

                // open connection
                $curl = curl_init();

                // set the url, number of POST vars, POST data
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, count($post_data));
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_string);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

                // execute post
                $result = curl_exec($curl);

                // close connection
                curl_close($curl);

                $this->output->set_content_type('text/xml');
                $this->output->set_output($result);
            }
        }
//        return false;
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

        //TODO: update transactions

        $this->load->helper('cookie');

        if (SERVER) {
            $url = 'http://bsx.jlparry.com/buy';

            $post_data = array(
                'team' => urlencode($this->input->cookie('team')),
                'token' => urlencode($this->input->cookie('token')),
                'player' => urlencode($this->session->userdata('username')),
                'stock' => urlencode($this->input->post('stock')),
                'quantity' => urlencode($this->input->post('quantity'))
            );

            $post_length = count($post_data);
            $post_string = $this->urlify($post_data);

            // open connection
            $curl = curl_init();

            // set the url, number of POST vars, POST data
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, $post_length);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            // execute post
            $result = curl_exec($curl);

            // close connection
            curl_close($curl);

            $xml = simplexml_load_string($result);

            // store response
            $token = (string)$xml->token;
            $stockcode = (string)$xml->stock;
            $playername = (string)$xml->player;
            $amount = (string)$xml->amount;
            $datetime = (string)$xml->datetime;

            if(!empty($datetime)) {
                $dt = new DateTime("@$datetime");
            }

            // Update player cash balance
            $player = $this->players->some("Player", $playername);

            // if player exists
            if (!empty($player)) {
                $player = $player[0];
                $stock = $this->stocks->some("Code", $stockcode);

                // if stock exists
                if (!empty($stock)) {
                    $stock = $stock[0];
                    $balance = (double)$stock->Value * (int)$amount;
                    $playercash = $player->Cash;

                    // if player has enough cash, update cash balance
                    if ($playercash > $balance) {
                        $player->Cash = $player->Cash - $balance;
                        $this->players->update($player);

                        // store certificate
                        $certificate = $this->certificates->create();
                        $certificate->token = $token;
                        $certificate->stock = $stockcode;
                        $certificate->player = $playername;
                        $certificate->amount = $amount;
                        $certificate->datetime = $dt->format('Y.m.d-H:i:s');

                        $this->certificates->add($certificate);

                        // new transaction
                        $transaction = $this->transactions->create();
                        $transaction->DateTime = $dt->format('Y.m.d-H:i:s');
                        $transaction->Player = $playername;
                        $transaction->Stock = $stockcode;
                        $transaction->Trans = "buy";
                        $transaction->Quantity = $amount;

                        $this->transactions->add($transaction);

                        //TODO: On Success show something
                        $view_data = array(
                            "amount" => $amount,
                            "stock" => $stockcode
                        );
                        $this->parser->parse('gameplay/buysuccess', $view_data);
                    }
                }
            }
        }
        //TODO: On Fail show something
        print_r($xml);
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

        //TODO: SERVER
        //TODO: Game Status: ONLY 3
        //TODO: if player has stock and certificate
        //TODO: increase player's cash
        //TODO: save certificates
        //TODO: update transactions

        $this->load->helper('cookie');

        if (SERVER) {
            $url = 'http://bsx.jlparry.com/sell';
            $playername = $this->session->userdata('username');
            $certificates = $this->certificates->some('Player', $playername);

            if (!empty($certificates)) {
                $thecerts = array();
                foreach($certificates as $cert)
                {
                    if(strcmp($cert->stock, $this->input->post('stock')) == 0)
                        array_push($thecerts, $cert->token);
                }

                $thecert = implode(',', $thecerts);
//                $thecert .= ",";
                $x = explode(",", $thecert);

                var_dump($x);

                $post_data = array(
                    'team' => urlencode($this->input->cookie('team')),
                    'token' => urlencode($this->input->cookie('token')),
                    'player' => urlencode($this->session->userdata('username')),
                    'stock' => urlencode($this->input->post('stock')),
                    'quantity' => urlencode($this->input->post('quantity')),
                    'certificate' => $thecert
                );

                $post_length = count($post_data);
                $post_string = $this->urlify($post_data);

                echo " post string: ";
                var_dump($post_string);

                // open connection
                $curl = curl_init();

                // set the url, number of POST vars, POST data
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, $post_length);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

                // execute post
                $result = curl_exec($curl);

                // close connection
                curl_close($curl);

                $xml = simplexml_load_string($result);
                print_r($xml);
            }
        }
    }

    public function urlify($data)
    {
        // url-ify the data for the POST
        $post_string = "";
        foreach ($data as $key => $value) {
            $post_string .= $key . '=' . $value . '&';
        }
        rtrim($post_string, '&');

        return $post_string;
    }
}