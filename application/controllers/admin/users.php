<?php

class Users extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('adminLoggedIn')){
            redirect('index/login','refresh');
        }
    }

    public function index(){
        $this->load->model('admin/musers');
        $data['data']=$this->musers->getUsers();
        $data['title']="Users";

        $this->load->view('admin/struct/head',$data);
        $this->load->view('admin/struct/header');
        $this->load->view('admin/users/index');
        $this->load->view('admin/struct/footer');
    }


    public function addUser(){

    }

    public function editUser(){

    }

    public function removeUser(){

    }
}
