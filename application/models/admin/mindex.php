<?php

class Mindex extends CI_Model
{

    function __construct(){
        parent::__construct();
    }


    public function getAllInterns($page){
        $this->db->select('*,login.pkey as loginKey, login.status as loginStatus');
        $this->db->from('login');
        $this->db->join('applicants','applicants.fkey_login=login.pkey','left');
        $this->db->where('type','intern');
        $this->db->limit($this->config->item('maxPageSize'), $this->config->item('maxPageSize')*$page);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }

    public function countInterns(){
        $this->db->select('*,login.pkey as loginKey, login.status as loginStatus');
        $this->db->from('login');
        $this->db->join('applicants','applicants.fkey_login=login.pkey','left');
        $this->db->where('type','intern');
        $totalResults=$this->db->count_all_results();
        return $totalResults;
    }

    public function getAllJobseekers($page){
        $this->db->select('*,login.pkey as loginKey, login.status as loginStatus');
        $this->db->from('login');
        $this->db->join('applicants','applicants.fkey_login=login.pkey','left');
        $this->db->where('type','jobSeeker');
        $this->db->limit($this->config->item('maxPageSize'), $this->config->item('maxPageSize')*$page);

        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }

    public function countJobSeekers(){
        $this->db->select('*,login.pkey as loginKey, login.status as loginStatus');
        $this->db->from('login');
        $this->db->join('applicants','applicants.fkey_login=login.pkey','left');
        $this->db->where('type','jobSeeker');
        $totalResults=$this->db->count_all_results();
        return $totalResults;
    }


    public function getAllEmployers($page){
        $this->db->select('*,login.pkey as loginKey, login.status as loginStatus');
        $this->db->from('login');
        $this->db->join('employer','employer.fkey_login_employer=login.pkey','left');
        $this->db->where('type','employer');
        $this->db->limit($this->config->item('maxPageSize'), $this->config->item('maxPageSize')*$page);

        $query=$this->db->get();
        $result=$query->result_array();
        return $result;
    }

    public function countEmployers(){
        $this->db->select('*,login.pkey as loginKey, login.status as loginStatus');
        $this->db->from('login');
        $this->db->join('employer','employer.fkey_login_employer=login.pkey','left');
        $this->db->where('type','employer');
        $totalResults=$this->db->count_all_results();
        return $totalResults;
    }


    public function getInfo($id){
        $this->db->select('*');
        $this->db->from('login');
        $this->db->join('applicants','applicants.fkey_login = login.pkey','left');
        $this->db->where('login.pkey',$id);
        $query=$this->db->get();
        $result=$query->result_array();
        return $result[0];
    }

    public function getExperience($infoKey){
        $this->db->where('fkey_applicants_experience',$infoKey);
        $query=$this->db->get('experience');
        $result=$query->result_array();
        return $result;
    }


    public function getEducation($infoKey){
        $this->db->where('fkey_applicants_education',$infoKey);
        $query=$this->db->get('education');
        $result=$query->result_array();
        return $result;
    }

    public function getEmail($id){
        $this->db->where('pkey',$id);
        $query=$this->db->get('login');
        $result=$query->result_array();
        if(!empty($result)){
            return $result[0];
        }
    }

    public function sendEmail($data){
        $from='support@innkee.com';
        $fromHeader=$data['inputSubject'];
        $replyTo='support@innkee.com';
        $replyToHeader='Reply to InnKee.com';
        $to=$data['inputEmail'];
        $subject=$data['inputSubject'];
        $message=$data['inputMessage'];

        $this->load->library('email');
        $this->email->from($from, $fromHeader);
        $this->email->reply_to($replyTo, $replyToHeader);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $result=$this->email->send();

        if($result){
            $this->session->set_flashdata('notification', '<strong>Successfully Send!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }else{
            $this->session->set_flashdata('notification', '<strong>Error While Sending Message!</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
        }

        if($data['inputType']=='intern'){
            redirect('/admin/index/interns/', 'refresh');
        }elseif($data['inputType']=='jobSeeker'){
            redirect('/admin/index/jobSeekers/', 'refresh');
        }elseif($data['inputType']=='employer'){
            redirect('/admin/index/employers/', 'refresh');
        }

    }

    public function stopAccess($userKey){
        $this->db->set('status',0);
        $this->db->where('pkey',$userKey);
        $result=$this->db->update('login');
        if($result){
            $this->session->set_flashdata('notification', '<strong>Successfully Stopped Access!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }else{
            $this->session->set_flashdata('notification', '<strong>Error While Stopped Access!</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');

    }

    public function unStopAccess($userKey){
        $this->db->set('status',2);
        $this->db->where('pkey',$userKey);
        $result=$this->db->update('login');
        if($result){
            $this->session->set_flashdata('notification', '<strong>Successfully Access Granted!</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
        }else{
            $this->session->set_flashdata('notification', '<strong>Error While Granting Access!</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');

    }


    public function searchBasic($data){
        $experience=($data['inputYear']*12)+$data['inputMonths'];

        $this->db->select('*,login.pkey as loginKey, login.status as loginStatus');
        $this->db->from('login');
        $this->db->join('applicants','applicants.fkey_login=login.pkey','left');
        $this->db->having('type',$data['type']);

        if($data['inputIndustry']!='null'){
            $this->db->having('currentIndustry',$data['inputIndustry']);
        }
        if($data['inputFunctionalArea']!='null'){
            $this->db->having('currentFunctionalArea',$data['inputFunctionalArea']);
        }
        if($data['email']!='' && $data['email']!=null){
            $this->db->having('email',$data['email']);
        }
        if($data['name']!='' && $data['name']!=null){
            $this->db->like('name',$data['name']);
        }
        if($data['location']!='' && $data['location']!=null){
            $this->db->like('location',$data['location']);
        }


        $query=$this->db->get();
        $result=$query->result_array();

        foreach($result as $key=>$value){
            $exp=$value['experience'];
            $exp=explode('$-$',$exp);
            $realExp=($exp[0]*12)+$exp[1];

            if($data['inputYear']!='null' || $data['inputMonths']!='null'){
                if($realExp<$experience || $value['currentCTC']<=$data['inputCurrentCTC']){
                    unset($result[$key]);
                }
            }

            if($data['inputCurrentCTC']!=''){
                if($value['currentCTC']<=$data['inputCurrentCTC']){
                    unset($result[$key]);
                }
            }


        }
        return array_Slice($result,0,($this->config->item('maxPageSize')-1));
    }

    public function countSearchBasic($data){
        $experience=($data['inputYear']*12)+$data['inputMonths'];

        $this->db->select('*,login.pkey as loginKey, login.status as loginStatus');
        $this->db->from('login');
        $this->db->join('applicants','applicants.fkey_login=login.pkey','left');
        $this->db->having('type',$data['type']);

        if($data['inputIndustry']!='null'){
            $this->db->having('currentIndustry',$data['inputIndustry']);
        }
        if($data['inputFunctionalArea']!='null'){
            $this->db->having('currentFunctionalArea',$data['inputFunctionalArea']);
        }
        if($data['email']!='' && $data['email']!=null){
            $this->db->having('email',$data['email']);
        }
        if($data['name']!='' && $data['name']!=null){
            $this->db->like('name',$data['name']);
        }
        if($data['location']!='' && $data['location']!=null){
            $this->db->like('location',$data['location']);
        }


        $query=$this->db->get();
        $result=$query->result_array();

        foreach($result as $key=>$value){
            $exp=$value['experience'];
            $exp=explode('$-$',$exp);
            $realExp=($exp[0]*12)+$exp[1];

            if($data['inputYear']!='null' || $data['inputMonths']!='null'){
                if($realExp<$experience || $value['currentCTC']<=$data['inputCurrentCTC']){
                    unset($result[$key]);
                }
            }

            if($data['inputCurrentCTC']!=''){
                if($value['currentCTC']<=$data['inputCurrentCTC']){
                    unset($result[$key]);
                }
            }


        }
        return count($result);
    }


}
