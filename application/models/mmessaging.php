<?php

class Mmessaging extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function submitContactForm($data){
        $message='Name :  '.$data['inputName']."\n";
        $message.='Email :  '.$data['inputEmail']."\n";
        $message.='Phone :  '.$data['inputPhone']."\n";
        $message.='Address :  '.$data['inputAddress']."\n";
        $message.='Message :  '.$data['inputMessage']."\n";
        $to='sakhtar0092@gmail.com';
        $subject=$data['inputName']." contacted from contact form";
        $from="InnKee.com Website Form";

        if(mail($to,$subject,$message,$from)){
            $this->session->set_flashdata('notification', '<strong>Message Succesfully Submitted. We will contact to you shortly.</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
            redirect('index/index/contact', 'refresh');
        }else{
            $this->session->set_flashdata('notification', '<strong>Problem occured while submitting message. Try again Later.</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('index/index/contact', 'refresh');
        }
    }

}
