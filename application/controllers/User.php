<?php
/**
 * Created by PhpStorm.
 * User: jondeluz
 * Date: 2016-02-10
 * Time: 3:41 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Application {


    public function login(){
        $user  = $this->input->post('username');
        $userdata = array('username' => $user);
        $this->session->set_userdata($userdata);

        redirect($this->agent->referrer());
    }

    public function logoff(){
        $this->session->unset_userdata('username');

        redirect($this->agent->referrer());
    }

}