<?php

class Index extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('adminLoggedIn')){
            redirect('admin/authentication/login','refresh');
        }
    }

    public function index(){
        $data['title']="Admin Panel";
        $this->load->view('admin/struct/head',$data);
        $this->load->view('admin/struct/header');
        $this->load->view('admin/index');
        $this->load->view('admin/struct/footer');
    }

    public function jobSeekers(){
        $this->load->model('admin/mindex');
        $data['data']=$this->mindex->getAllJobseekers();
        $data['title']="Registered JobSeekers";

        $this->load->view('admin/struct/head',$data);
        $this->load->view('admin/struct/header');
        $this->load->view('admin/jobSeekers',$data);
        $this->load->view('admin/struct/footer');
    }

    public function interns(){
            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->getAllInterns();
            $data['title']="Registered Interns";

            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/interns',$data);
            $this->load->view('admin/struct/footer');
    }

    public function employers(){
        $this->load->model('admin/mindex');
        $data['data']=$this->mindex->getAllEmployers();
        $data['title']="Registered Employers";

        $this->load->view('admin/struct/head',$data);
        $this->load->view('admin/struct/header');
        $this->load->view('admin/employer',$data);
        $this->load->view('admin/struct/footer');
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
