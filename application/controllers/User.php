<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Application {

    /**
     * Logins a user.
     */
    public function login(){
        $user  = $this->input->post('username');
        $pass  = $this->input->post('password');
        $img   = $this->input->post('avatar');

        $player = $this->players->get($user);

        // If player exists
        if ( !is_null($player) )
        {
            // If password matches
            if ( strcmp( $player->password, sha1($pass) ) == 0 )
            {
                // start session for player
                $userdata = array('username' => $user);
                $this->session->set_userdata($userdata);
            }

        }
        else
        {
            // Register player

            // hash password
            $new_pass = sha1($pass);

            // new empty user
            $player = $this->players->create();
            $player->Player   = $user;
            $player->password = $new_pass;
            $player->role     = ROLE_PLAYER;
            $player->Cash     = 1000;

            // add user to db
            $this->players->add($player);

            // start session for player
            $userdata = array('username' => $user);
            $this->session->set_userdata($userdata);
        }

        redirect(base_url());
    }

    /**
     * Logouts a user.
     */
    public function logoff(){
        $this->session->unset_userdata('username');

        redirect(base_url());
    }

}