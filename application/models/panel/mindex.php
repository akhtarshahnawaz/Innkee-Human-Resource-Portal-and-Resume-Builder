<?php

class Mindex extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function getInfo(){
        $this->db->select('*');
        $this->db->from('login');
        $this->db->join('applicants','applicants.fkey_login = login.pkey','left');
        $this->db->where('login.pkey',$this->session->userdata['key']);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result[0];
    }

    public function getExperience(){
        $this->db->where('fkey_applicants_experience',$this->session->userdata['infoKey']);
        $query=$this->db->get('experience');
        $result=$query->result_array();
        return $result;
    }


    public function updatePersonalInfo($data){
        $updateData=array(
            'name'=>$data['inputFullName'],
            'dob'=>$data['inputDOB'],
            'fatherName'=>$data['inputFatherName'],
            'motherName'=>$data['inputMotherName']
        );

        $this->db->where('pkey',$this->session->userdata('infoKey'));

        if($this->db->update('applicants',$updateData)){
            $this->session->set_flashdata('notification', '<strong>Successfully Updated!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/personalInfo/', 'refresh');

    }

    public function updateProfessionalInfo($data){
        if($data['inputYear']=='null'){
            $data['inputYear']=0;
        }
        if($data['inputMonths']=='null'){
            $data['inputMonths']=0;
        }
        $updateData=array(
            'experience'=>$data['inputYear'].'$-$'.$data['inputMonths'],
            'currentCompany'=>$data['inputCurrentCompany'],
            'currentFunctionalArea'=>$data['inputFunctionalArea'],
            'currentIndustry'=>$data['inputIndustry'],
            'currentCTC'=>$data['inputCurrentCTC'],
            'currentDesignation'=>$data['inputDesignation']
        );

        $this->db->where('pkey',$this->session->userdata('infoKey'));

        if($this->db->update('applicants',$updateData)){
            $this->session->set_flashdata('notification', '<strong>Successfully Updated!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/professionalInfo/', 'refresh');

    }


    public function updateContactInfo($data){
        $updateData=array(
            'phone'=>$data['inputPhone'],
            'location'=>$data['inputAddress'],
            'nationality'=>$data['inputNationality']
        );

        $this->db->where('pkey',$this->session->userdata('infoKey'));

        if($this->db->update('applicants',$updateData)){
            $this->session->set_flashdata('notification', '<strong>Successfully Updated!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/contactInfo/', 'refresh');

    }


    public function updateSkills($data){
        $updateData=array(
            'languages'=>$data['inputLanguages'],
            'hobbies'=>$data['inputHobbies'],
            'computerSkills'=>$data['inputComputerSkills'],
            'skills'=>$data['inputExtraSkills'],
            'foInterest'=>$data['inputInterest']
        );

        $this->db->where('pkey',$this->session->userdata('infoKey'));

        if($this->db->update('applicants',$updateData)){
            $this->session->set_flashdata('notification', '<strong>Successfully Updated!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/skills/', 'refresh');

    }

    public function updateResume($data){
        $updateData=array(
            'resume'=>$data['fileName']
        );

        $this->db->where('pkey',$this->session->userdata('infoKey'));

        if($this->db->update('applicants',$updateData)){
            $this->session->set_flashdata('notification', '<strong>Successfully Updated!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }

        redirect('/panel/index/resume/', 'refresh');
    }

    public function getEducation(){
        $this->db->where('fkey_applicants_education',$this->session->userdata['infoKey']);
        $query=$this->db->get('education');
        $result=$query->result_array();
        return $result;
    }

    public function setPhoto($filename){
        $updateData=array(
            'photo'=>$filename
        );

        $this->db->where('pkey',$this->session->userdata('infoKey'));
        $this->db->update('applicants',$updateData);
    }


    public function searchJobs(){

        $this->db->where('pkey',$this->session->userdata('infoKey'));
        $query=$this->db->get('applicants');
        $result=$query->result_array();
        if(!empty($result)){
            $this->db->select('*,jobs.pkey as jobKey,jobApplicants.pkey as applicationKey');
            $this->db->from('jobs');
            $this->db->join('jobApplicants','jobApplicants.jobKey=jobs.pkey','left');
            $this->db->where('industry',$result[0]['currentIndustry']);
            $query=$this->db->get();
            $result=$query->result_array();
            if(!empty($result)){
                return $result;
            }
        }
        return false;
    }

    public function applyJob($jobKey,$jobCreatorKey){
        $insertData=array(
            'jobKey'=>$jobKey,
            'jobCreator'=>$jobCreatorKey,
            'jobApplicant'=>$this->session->userdata('key')
        );

        if($this->db->insert('jobApplicants',$insertData)){
            $this->session->set_flashdata('notification', '<strong>Successfully Applied for Job!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/searchJobs/', 'refresh');
    }


    public function unApplyJob($jobKey,$jobCreatorKey){
        $this->db->where('jobKey',$jobKey);
        $this->db->where('jobCreator',$jobCreatorKey);
        $this->db->where('jobApplicant',$this->session->userdata('key'));
        if($this->db->delete('jobApplicants')){
            $this->session->set_flashdata('notification', '<strong>Successfully Un-Applied for Job!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }
        redirect('/panel/index/searchJobs/', 'refresh');

    }

}
