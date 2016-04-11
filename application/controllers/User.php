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

        $player = $this->players->some('Player', $user);

        // If player exists
        if ( !empty($player) )
        {
            // If password matches
            if ( strcmp( $player[0]->password, sha1($pass) ) == 0 )
            {
                // start session for player
                $userdata = array('username' => $user, 'avatar' => $player[0]->avatar);
                $this->session->set_userdata($userdata);
            }

        }
        else {
            // Register player

            // hash password
            $new_pass = sha1($pass);

            // new empty user
            $player = $this->players->create();
            $player->Player = $user;
            $player->password = $new_pass;
            $player->role = ROLE_PLAYER;
            $player->Cash = 1000;

            if (!($img)) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $user;

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload("avatar")) {
                    $error = $this->upload->display_errors();
                    var_dump($error);
                    die();
                }
                else {
                    $filedata = $this->upload->data();
                    $player->avatar = '/uploads/' . $filedata['file_name'];
                }
            }

            // add user to db
            $this->players->add($player);

            // start session for player
            $userdata = array('username' => $user, 'avatar' => $player->avatar);
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