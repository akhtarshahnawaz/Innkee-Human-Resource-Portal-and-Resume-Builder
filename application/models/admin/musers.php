<?php

class Mindex extends CI_Model
{

    function __construct(){
        parent::__construct();
    }


    public function getUsers(){
        $this->db->where('type','admin');
        $query=$this->db->get('login');
        $result=$query->result_array();
        return $result;
    }



}
