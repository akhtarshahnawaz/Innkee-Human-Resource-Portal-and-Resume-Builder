<?php

class Index extends CI_Controller
{
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('adminLoggedIn') && !$this->session->userdata('employerLoggedIn')){
            redirect('index/login','refresh');
        }
    }

    public function index($page=null){
        $data=$this->input->get();
        if(!empty($data)){
            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->searchBasic($data,$page);
            $data['title']="Search Result";
            $data['totalEntries']=$this->mindex->countSearchBasic($data);

        }else{
            $data['title']="Adminstrator Panel";
        }
        $data['page']=$page;

        $this->load->view('admin/struct/head',$data);
        $this->load->view('admin/struct/header');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/struct/footer');
    }

    public function jobSeekers($page=null){
        if($this->session->userdata('adminLoggedIn')){

            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->getAllJobseekers($page);
            $data['title']="Registered JobSeekers";
            $data['page']=$page;
            $data['totalEntries']=$this->mindex->countJobSeekers();

            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/jobSeekers',$data);
            $this->load->view('admin/struct/footer');
        }else{
            redirect('index/login','refresh');
        }
    }

    public function interns($page=null){
        if($this->session->userdata('adminLoggedIn')){

            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->getAllInterns($page);
            $data['title']="Registered Interns";
            $data['page']=$page;
            $data['totalEntries']=$this->mindex->countInterns();

            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/interns',$data);
            $this->load->view('admin/struct/footer');
        }else{
            redirect('index/login','refresh');
        }
    }

    public function employers($page=null){
        if($this->session->userdata('adminLoggedIn')){

            $this->load->model('admin/mindex');
            $data['data']=$this->mindex->getAllEmployers($page);
            $data['title']="Registered Employers";
            $data['page']=$page;
            $data['totalEntries']=$this->mindex->countEmployers();

            $this->load->view('admin/struct/head',$data);
            $this->load->view('admin/struct/header');
            $this->load->view('admin/employer',$data);
            $this->load->view('admin/struct/footer');
        }else{
            redirect('index/login','refresh');
        }
    }

    public function stopAccess($userKey){
        if($this->session->userdata('adminLoggedIn')){
            $this->load->model('admin/mindex');
            $this->mindex->stopAccess($userKey);
        }else{
            redirect('index/login','refresh');
        }
    }

    public function unStopAccess($userKey){
        if($this->session->userdata('adminLoggedIn')){
            $this->load->model('admin/mindex');
            $this->mindex->unStopAccess($userKey);
        }else{
            redirect('index/login','refresh');
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
