<?php

class Index extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('adminLoggedIn') && !$this->session->userdata('employerLoggedIn')){
            redirect('index/login','refresh');
        }
    }

    public function index(){
        $data=$this->input->post();
        if(!empty($data)){
            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->searchBasic($data);
            $data['title']="Search Result";
        }else{
            $data['title']="Adminstrator Panel";
        }
        $this->load->view('admin/struct/head',$data);
        $this->load->view('admin/struct/header');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/struct/footer');
    }

    public function jobSeekers(){
        if(!$this->session->userdata('adminLoggedIn')){

            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->getAllJobseekers();
            $data['title']="Registered JobSeekers";

            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/jobSeekers',$data);
            $this->load->view('admin/struct/footer');
        }
    }

    public function interns(){
        if(!$this->session->userdata('adminLoggedIn')){

            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->getAllInterns();
            $data['title']="Registered Interns";

            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/interns',$data);
            $this->load->view('admin/struct/footer');
        }
    }

    public function employers(){
        if(!$this->session->userdata('adminLoggedIn')){

            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->getAllEmployers();
            $data['title']="Registered Employers";

            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/employer',$data);
            $this->load->view('admin/struct/footer');
        }
    }

    public function viewApplicant($id=null){
        if(isset($id)){
            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->getInfo($id);
            $data['education']=$this->mindex->getEducation($data['data']['pkey']);
            $data['experience']=$this->mindex->getExperience($data['data']['pkey']);

            $data['title']=$data['data']['name'];
            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/viewApplicant',$data);
            $this->load->view('admin/struct/footer');
        }
    }

    public function sendMail($id=null){
        $data=$this->input->post();
        if(isset($id)){
            $this->load->model('admin/mindex');
            $values=$this->mindex->getEmail($id);
            $data['email']=$values['email'];
            $data['type']=$values['type'];

            $data['title']="Send Email";
            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/EmailSender',$data);
            $this->load->view('admin/struct/footer');
        }elseif(!empty($data)){
            $this->load->model('admin/mindex');
            $this->mindex->sendEmail($data);
        }
    }
}
