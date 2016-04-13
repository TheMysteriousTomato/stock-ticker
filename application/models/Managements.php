<?php

class Managements extends MY_Model
{
    public function __construct()
    {
        parent::__construct('managements', 'id');
    }

    function getServerStatus()
    {
        $status = $this->getStatus();
        return $status;
    }

}
