<?php

class Data extends CI_Controller
{

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('loggedIn')){
            redirect('index/login','refresh');
        }
    }

    public function addExperience($type=null){
        $data=$this->input->post();
        if(!empty($data)){
            $this->load->model('panel/mdata');
            $this->mdata->addExperience($data);
        }else{
            $data['title']="Add Experience";
            $data['type']=$type;
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/data/experience',$data);
            $this->load->view('footer');
        }
    }

    public function EditExperience($type=null,$id=null){
        $data=$this->input->post();
        $this->load->model('panel/mdata');

        if(!empty($data)){
            $this->mdata->editExperience($data);
        }else{
            $data['title']="Edit Experience";
            $data['type']=$type;
            $data['data']=$this->mdata->getExperience($id);
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/data/experience',$data);
            $this->load->view('footer');
        }
    }

    public function removeExperience($id){
        $this->load->model('panel/mdata');
        $this->mdata->removeExperience($id);
    }


    public function addEducation($type=null){
        $data=$this->input->post();
        if(!empty($data)){
            $this->load->model('panel/mdata');
            $this->mdata->addEducation($data);
        }else{
            $this->load->model('panel/mindex');
            $education=$this->mindex->getEducation();
            $highSchool=$intermediate=false;
            foreach($education as $row){
                if($row['type']=='highSchool'){
                    $highSchool=true;
                }elseif($row['type']=='intermediate'){
                    $intermediate=true;
                }
            }
            if(isset($type) && ($type=="highSchool" || $type=="intermediate" || $type=="diploma" || $type=="certification" || $type=="graduation" || $type=="postGraduation" || $type=="doctorate")){
                $show=true;
                if($type=='highSchool' && $highSchool){
                    $show=false;
                }elseif($type=='intermediate' && $intermediate){
                    $show=false;
                }
                if($show){
                    $data['title']="Add Education";
                    $data['type']=$type;
                    $this->load->view('head',$data);
                    $this->load->view('header');
                    $this->load->view('panel/sidebar');
                    $this->load->view('panel/data/education',$data);
                    $this->load->view('footer');
                }
            }
        }
    }

    public function editEducation($type=null,$id=null){
        $data=$this->input->post();
        $this->load->model('panel/mdata');

        if(!empty($data)){
            $this->mdata->editEducation($data);
        }else{
            $data['title']="Edit Education";
            $data['type']=$type;
            $data['data']=$this->mdata->getEducation($id);
            $this->load->view('head',$data);
            $this->load->view('header');
            $this->load->view('panel/sidebar');
            $this->load->view('panel/data/education',$data);
            $this->load->view('footer');
        }
    }


    public function removeEducation($id){
        $this->load->model('panel/mdata');
        $this->mdata->removeEducation($id);
    }



}
