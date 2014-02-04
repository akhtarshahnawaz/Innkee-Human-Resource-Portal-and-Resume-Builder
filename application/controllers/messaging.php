<?php

class Messaging extends CI_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function contactForm(){
        $data=$this->input->post();
        if(!empty($data)){
            $this->load->model('mmessaging');
            $this->mmessaging->submitContactForm($data);
        }else{
            $this->session->set_flashdata('notification', '<strong>Please fill all fields.</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('index/index/contact', 'refresh');
        }
    }

}
