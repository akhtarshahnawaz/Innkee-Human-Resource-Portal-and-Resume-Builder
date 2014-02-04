<?php

class Mdata extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function getExperience($id){
        $this->db->where('pkey',$id);
        $query=$this->db->get('experience');
        $result=$query->result_array();
        return $result[0];
    }


    public function addExperience($data){
        if(isset($data['inputWorking'])){
            $data['inputTill']=null;
        }
        $insertArray=array(
            'fkey_applicants_experience'=>$this->session->userdata('infoKey'),
            'type'=>$data['inputExperienceType'],
            'company'=>$data['inputCompany'],
            'from'=>$data['inputFrom'],
            'to'=>$data['inputTill'],
            'function'=>$data['inputFunction'],
            'designation'=>$data['inputDesignation']
        );
        if($this->db->insert('experience',$insertArray)){
            $this->session->set_flashdata('notification', '<strong>Successfully Added!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/experience/', 'refresh');
    }


    public function editExperience($data){
        if(isset($data['inputWorking'])){
            $data['inputTill']=null;
        }
        $updateArray=array(
            'type'=>$data['inputExperienceType'],
            'company'=>$data['inputCompany'],
            'from'=>$data['inputFrom'],
            'to'=>$data['inputTill'],
            'function'=>$data['inputFunction'],
            'designation'=>$data['inputDesignation']
        );
        $this->db->where('pkey',$data['inputPkey']);

        if($this->db->update('experience',$updateArray)){
            $this->session->set_flashdata('notification', '<strong>Successfully Updated!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('panel/index/experience','refresh');
    }

    public function removeExperience($id){
        $this->db->where('pkey',$id);

        if($this->db->delete('experience')){
            $this->session->set_flashdata('notification', '<strong>Successfully Deleted!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('panel/index/experience','refresh');
    }

    public function getEducation($id){
        $this->db->where('pkey',$id);
        $query=$this->db->get('education');
        $result=$query->result_array();
        return $result[0];
    }


    public function addEducation($data){
        if(isset($data['inputPersuing'])){
            $data['inputTill']=null;
        }
        $insertArray=array(
            'fkey_applicants_education'=>$this->session->userdata('infoKey'),
            'type'=>$data['inputCourseType'],
            'name'=>$data['inputCourseName'],
            'branch'=>$data['inputBranch'],
            'from'=>$data['inputFrom'],
            'to'=>$data['inputTill'],
            'institute'=>$data['inputInstitution'],
            'percentage'=>$data['inputPercentage']
        );

        if($this->db->insert('education',$insertArray)){
            $this->session->set_flashdata('notification', '<strong>Successfully Added!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/education/', 'refresh');
    }

    public function editEducation($data){
        if(isset($data['inputPersuing'])){
            $data['inputTill']=null;
        }
        $updateArray=array(
            'type'=>$data['inputCourseType'],
            'name'=>$data['inputCourseName'],
            'branch'=>$data['inputBranch'],
            'from'=>$data['inputFrom'],
            'to'=>$data['inputTill'],
            'institute'=>$data['inputInstitution'],
            'percentage'=>$data['inputPercentage']
        );
        $this->db->where('pkey',$data['inputPkey']);

        if($this->db->update('education',$updateArray)){
            $this->session->set_flashdata('notification', '<strong>Successfully Updated!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/education/', 'refresh');
    }

    public function removeEducation($id){
        $this->db->where('pkey',$id);

        if($this->db->delete('education')){
            $this->session->set_flashdata('notification', '<strong>Successfully Deleted!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('panel/index/education','refresh');
    }

}
