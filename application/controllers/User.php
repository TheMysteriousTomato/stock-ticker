<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Application {

    /**
     * Logins a user.
     */
    public function login(){
        $user  = $this->input->post('username');
        $userdata = array('username' => $user);
        $this->session->set_userdata($userdata);

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