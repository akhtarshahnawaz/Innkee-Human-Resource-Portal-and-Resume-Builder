<?php

class Mjob extends CI_Model
{

    function __construct(){
        parent::__construct();
    }

    public function addJob($data){
        $insertArray=array(
            'fkey_login_jobs'=>$this->session->userdata('key'),
            'title'=>$data['title'],
            'details'=>$data['details'],
            'industry'=>$data['inputIndustry'],
            'closingDate'=>$data['closingDate']
        );

        if($this->db->insert('jobs',$insertArray)){
            $this->session->set_flashdata('notification', '<strong>Successfully Added</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
            redirect('/admin/job/index', 'refresh');
        }else{
            $this->session->set_flashdata('notification', '<strong>Problem occured while adding Job</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('/admin/job/index', 'refresh');
        }
    }

    public function updateJob($data){
        $updateArray=array(
            'title'=>$data['title'],
            'details'=>$data['details'],
            'industry'=>$data['inputIndustry'],
            'closingDate'=>$data['closingDate']
        );
        $this->db->where('pkey',$data['pkey']);

        if($this->db->update('jobs',$updateArray)){
            $this->session->set_flashdata('notification', '<strong>Successfully Updated</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
            redirect('/admin/job/index', 'refresh');
        }else{
            $this->session->set_flashdata('notification', '<strong>Problem occured while updating Job</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('/admin/job/index', 'refresh');
        }
    }

    public function deleteJob($pkey){
        $this->db->where('fkey_login_jobs',$this->session->userdata('key'));
        $this->db->where('pkey',$pkey);
        if($this->db->delete('jobs')){
            $this->session->set_flashdata('notification', '<strong>Successfully Deleted</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
            redirect('/admin/job/index', 'refresh');
        }else{
            $this->session->set_flashdata('notification', '<strong>Problem occured while deleting Job</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('/admin/job/index', 'refresh');
        }
    }

    public function getJobs(){
        $this->db->where('fkey_login_jobs',$this->session->userdata('key'));
        $query=$this->db->get('jobs');
        $result=$query->result_array();
        if(!empty($result)){
            return $result;
        }else{
            return false;
        }
    }

    public function getJob($jobKey){
        $this->db->where('pkey',$jobKey);
        $this->db->where('fkey_login_jobs',$this->session->userdata('key'));
        $query=$this->db->get('jobs');
        $result=$query->result_array();
        if(!empty($result)){
            return $result[0];
        }else{
            return false;
        }
    }

    public function getApplicants($jobKey){
        $this->db->where('jobKey',$jobKey);
        $this->db->where('jobCreator',$this->session->userdata('key'));
        $query=$this->db->get('jobApplicants');
        $result=$query->result_array();
        if(!empty($result)){
            $applicants=array();
            foreach($result as $row){
                $applicants[]=$row['jobApplicant'];
            }

            if(!empty($applicants)){
                $this->db->where_in('pkey',$applicants);
                $query=$this->db->get('applicants');
                $result=$query->result_array();
                if(!empty($result)){
                    return $result;
                }
            }
        }
        return false;
    }
}
