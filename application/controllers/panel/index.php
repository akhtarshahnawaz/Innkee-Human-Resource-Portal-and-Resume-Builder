<?php

class Index extends CI_Controller
{
    function __construct(){
        parent::__construct();

        if(!$this->session->userdata('loggedIn')){
            redirect('index/login','refresh');
        }
    }

    public function generateResume($generate=null){
        $data=$this->input->post();
        if(!empty($data) && isset($generate) && $generate=='true'){
            $this->load->model('panel/mindex');
            $data['data']=$this->mindex->getInfo();
            $data['education']=$this->mindex->getEducation();
            $data['experience']=$this->mindex->getExperience();
            $data['objective']=$data['inputObjective'];

            $data['title']=$data['data']['name']."'s Resume";
            $resume=$this->load->view('head',$data,true);
            $resume.=$this->load->view('panel/generatePDF',$data,true);
            $resume.=$this->load->view('footer',true);
            echo $resume;

        }else{
            $data['title']="Generate Resume Now";
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/generateResume');
            $this->load->view('footer');
        }
    }
    public function index(){
        $this->load->model('panel/mindex');
        $data['data']=$this->mindex->getInfo();
        $data['education']=$this->mindex->getEducation();
        $data['experience']=$this->mindex->getExperience();

        $data['title']="Manage your Profile";
        $this->load->view('head',$data);
        $this->load->view('header');
        $this->load->view('panel/sidebar');
        $this->load->view('panel/index');
        $this->load->view('footer');
    }

    public function personalInfo(){
        $data=$this->input->post();
        if(!empty($data)){
            $this->load->model('panel/mindex');
            $this->mindex->updatePersonalInfo($data);
        }else{
            $this->load->model('panel/mindex');
            $data['data']=$this->mindex->getInfo();
            $data['title']="Personal Information";
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/personalInfo');
            $this->load->view('footer');

        }
    }

    public function contactInfo(){
        $data=$this->input->post();
        if(!empty($data)){
            $this->load->model('panel/mindex');
            $this->mindex->updateContactInfo($data);
        }else{
            $this->load->model('panel/mindex');
            $data['data']=$this->mindex->getInfo();
            $data['title']="Contact Information";
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/contactInfo');
            $this->load->view('footer');

        }
    }

    public function professionalInfo(){
        if($this->session->userdata('type')=='jobSeeker'){
            $data=$this->input->post();
            if(!empty($data)){
                $this->load->model('panel/mindex');
                $this->mindex->updateProfessionalInfo($data);
            }else{
                $this->load->model('panel/mindex');
                $data['data']=$this->mindex->getInfo();
                $data['title']="Professional Information";
                $this->load->view('head',$data);
                $this->load->view('header');
                $this->load->view('panel/sidebar');
                $this->load->view('panel/professionalInfo');
                $this->load->view('footer');

            }
        }
    }

    public function education(){
        $data=$this->input->post();
        if(!empty($data)){

        }else{
            $this->load->model('panel/mindex');
            $data['data']=$this->mindex->getEducation();
            $data['highSchool']=$data['intermediate']=false;
            foreach($data['data'] as $row){
                if($row['type']=='highSchool'){
                    $data['highSchool']=true;
                }elseif($row['type']=='intermediate'){
                    $data['intermediate']=true;
                }
            }
            $data['title']="Educational Qualifications";
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/education');
            $this->load->view('footer');

        }
    }

    public function skills(){
        $data=$this->input->post();
        if(!empty($data)){
            $this->load->model('panel/mindex');
            $this->mindex->updateSkills($data);
        }else{
            $this->load->model('panel/mindex');
            $data['data']=$this->mindex->getInfo();
            $data['title']="Skills and Expertise";
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/skills');
            $this->load->view('footer');

        }
    }

    public function experience(){
        $data=$this->input->post();
        if(!empty($data)){

        }else{
            $this->load->model('panel/mindex');
            $data['data']=$this->mindex->getExperience();
            $data['title']="Experience";
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/experience',$data);
            $this->load->view('footer');

        }
    }


    public function resume(){
        $data=$this->input->post();
        if(!empty($data)){
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size']	= '10000';
            $config['encrypt_name']=TRUE;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                $this->load->model('panel/mindex');
                $data['data']=$this->mindex->getInfo();
                $data['title']="Resume";
                $this->load->view('head',$data);
                $this->load->view('header');
                $this->load->view('panel/sidebar');
                $this->load->view('panel/resume',$data);
                $this->load->view('footer');
            }
            else
            {
                $uploadData= $this->upload->data();
                $data['fileName']=$uploadData['file_name'];
                $this->load->model('panel/mindex');
                $this->mindex->updateResume($data);
            }
        }else{
            $this->load->model('panel/mindex');
            $data['data']=$this->mindex->getInfo();
            $data['title']="Resume";
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/resume',$data);
            $this->load->view('footer');

        }
    }

    public function uploadImage(){

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        $config['max_width']  = '10240';
        $config['max_height']  = '7680';
        $config['encrypt_name']=TRUE;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('inputImage'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = $this->upload->data();
            $file= base_url().'uploads/'.$data['file_name'];
            $this->load->model('panel/mindex');
            $this->mindex->setPhoto($data['file_name']);
            echo $file;
        }
    }


    public function searchJobs(){
        $this->load->model('panel/mindex');
        $data['data']=$this->mindex->searchJobs();

        $data['title']="Search Jobs";
        $this->load->view('head',$data);
        $this->load->view('header');
        $this->load->view('panel/sidebar');
        $this->load->view('panel/searchJobs',$data);
        $this->load->view('footer');
    }


    public function applyJob($jobKey,$jobCreatorKey){
        $this->load->model('panel/mindex');
        $this->mindex->applyJob($jobKey,$jobCreatorKey);
    }

    public function unApplyJob($jobKey,$jobCreatorKey){
        $this->load->model('panel/mindex');
        $this->mindex->unApplyJob($jobKey,$jobCreatorKey);
    }

}
