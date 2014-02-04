<?php

class Job extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('adminLoggedIn') && !$this->session->userdata('employerLoggedIn')){
            redirect('index/login','refresh');
        }
    }


    public function index(){
        $this->load->model('admin/mjob');
        $data['title']="My Jobs";
        $data['data']=$this->mjob->getJobs();
        $this->load->view('admin/struct/head',$data);
        $this->load->view('admin/struct/header');
        $this->load->view('admin/job/index',$data);
        $this->load->view('admin/struct/footer');
    }

    public function addJob(){
        $data=$this->input->post();
        $this->load->model('admin/mjob');
        if(!empty($data)){
            $this->mjob->addJob($data);
        }else{
            $data['title']="Post Job";
            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/job/form',$data);
            $this->load->view('admin/struct/footer');
        }
    }


    public function updateJob($pkey=null){
        $data=$this->input->post();
        $this->load->model('admin/mjob');
        if(!empty($data)){
            $this->mjob->updateJob($data);
        }else{
            $data['title']="Update Job";
            $data['data']=$this->mjob->getJob($pkey);
            $data['update']=true;
            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/job/form',$data);
            $this->load->view('admin/struct/footer');
        }

    }

    public function deleteJob($pkey){
        $this->load->model('admin/mjob');
        $this->mjob->deleteJob($pkey);
    }

    public function applicants($jobKey){
        $this->load->model('admin/mjob');
        $data['data']=$this->mjob->getApplicants($jobKey);

        $data['title']="Job Applicants";
        $this->load->view('admin/struct/head',$data);
        $this->load->view('admin/struct/header');
        $this->load->view('admin/job/applicants',$data);
        $this->load->view('admin/struct/footer');
    }
}
