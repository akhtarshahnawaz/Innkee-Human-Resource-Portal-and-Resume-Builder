<?php

class Mindex extends CI_Model
{
    function __construct(){
        parent::__construct();
    }


    public function checkLogin($data){
        $this->db->where('email',$data['email']);
        $this->db->where('password',sha1($data['password']));
        $this->db->where('status >',0);
        $query=$this->db->get('login');
        $result=$query->result_array();

        if(!empty($result)){
            if($result[0]['type']=='admin'){
                $sessiondata = array(
                    'username' => $result[0]['email'],
                    'adminLoggedIn' => TRUE,
                    'status' => $result[0]['status']
                );
                $this->session->set_userdata($sessiondata);
                redirect('/admin/index/', 'refresh');
            }elseif($result[0]['type']=='employer'){
                $this->db->where('fkey_login_employer',$result[0]['pkey']);
                $query=$this->db->get('employer');
                $result2=$query->result_array();
                $sessiondata = array(
                    'key' => $result[0]['pkey'],
                    'employerKey'=>$result2[0]['pkey'],
                    'username' => $result[0]['email'],
                    'type' => $result[0]['type'],
                    'status'=>$result[0]['status'],
                    'employerLoggedIn' => TRUE
                );
                $this->session->set_userdata($sessiondata);
                redirect('/admin/index/', 'refresh');
            }else{
                $this->db->where('fkey_login',$result[0]['pkey']);
                $query=$this->db->get('applicants');
                $result2=$query->result_array();
                $sessiondata = array(
                    'key' => $result[0]['pkey'],
                    'infoKey'=>$result2[0]['pkey'],
                    'username' => $result[0]['email'],
                    'type' => $result[0]['type'],
                    'status'=>$result[0]['status'],
                    'loggedIn' => TRUE
                );
                $this->session->set_userdata($sessiondata);
                redirect('/panel/index/', 'refresh');
            }
        }else{
            $this->session->set_flashdata('notification', '<strong>Wrong username or Password</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('/index/login/', 'refresh');
        }
    }


    public function insertApplicant($data){
        $error=$this->generateSignupErrors($data);
        if($error['status']=='yes'){
            $returnArray=array(
                'errors'=>$error['error'],
                'data'=>$data,
                'status'=>'inputError'
            );
            return $returnArray;
        }else{
            if($data['type']=='employer'){
                $this->insertEmployer($data);
            }else{
                $insert=array(
                    'email'=>$data['inputEmail'],
                    'password'=>sha1($data['inputPassword']),
                    'type'=>$data['type'],
                    'status'=>1,
                );

                $this->db->insert('login',$insert);
                $insertId=$this->db->insert_id();

                $insert2=array(
                    'fkey_login'=>$insertId,
                    'name'=>$data['inputFullName'],
                    'phone'=>$data['inputPhone'],
                    'location'=>$data['inputAddress']
                );


                if($this->db->insert('applicants',$insert2)){
                    $insertId2=$this->db->insert_id();
                    $sessiondata = array(
                        'key' => $insertId,
                        'infoKey'=>$insertId2,
                        'username' => $data['inputEmail'],
                        'type' => $data['type'],
                        'status'=>1,
                        'loggedIn' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);
                    $this->sendVerificationMail($data['inputEmail'],$data['inputFullName']);

                    $this->session->set_flashdata('notification', '<strong>Succesfully Registered. A verification mail is send to you. Please verify your email.</strong>');
                    $this->session->set_flashdata('alertType', 'alert-success');
                    redirect('/panel/index/', 'refresh');
                }else{
                }
            }
        }
    }





    function insertEmployer($data){
        $insert=array(
            'email'=>$data['inputEmail'],
            'password'=>sha1($data['inputPassword']),
            'type'=>$data['type'],
            'status'=>1,
        );

        $this->db->insert('login',$insert);
        $insertId=$this->db->insert_id();

        $insert2=array(
            'fkey_login_employer'=>$insertId,
            'name'=>$data['inputFullName'],
            'job_title'=>$data['inputJobTitle'],
            'company'=>$data['inputCompany'],
            'phone'=>$data['inputPhone'],
            'address'=>$data['inputAddress']
        );


        if($this->db->insert('employer',$insert2)){
            $insertId2=$this->db->insert_id();
            $sessiondata = array(
                'key' => $insertId,
                'infoKey'=>$insertId2,
                'username' => $data['inputEmail'],
                'type' => $data['type'],
                'status'=>1,
                'employerLoggedIn' => TRUE
            );
            $this->session->set_userdata($sessiondata);
            $this->sendVerificationMail($data['inputEmail'],$data['inputFullName']);

            $this->session->set_flashdata('notification', '<strong>Succesfully Registered. A verification mail is send to you. Please verify your email.</strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
            redirect('/admin/index/', 'refresh');
        }else{
            $this->session->set_flashdata('notification', '<strong>Problem while registering. Try again later!</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('/admin/index/','redirect');
        }
    }



    public function generateSignupErrors($data){
        /* Generating errors based on Input Data*/
        $error='<strong>There were some problems with your request</strong></br> ';
        $status='no';

        //Validating duplicate Email
        $this->db->where('email',$data['inputEmail']);
        $query=$this->db->get('login');
        $result=$query->result_array();
        if(!empty($result)){
            $error.="This E-Mail address is already registered with us.</br>";
            $status='yes';
        }

        //Validating Email Address
        if($data['inputEmail']==''){
            $error.="Missing e-mail address.</br>";
            $status='yes';
        }else{
            if(!filter_var($data['inputEmail'], FILTER_VALIDATE_EMAIL)){
                $error.="Invalid e-mail address.</br>";
                $status='yes';
            }
        }
        //Validating Password
        if($data['inputPassword']==''){
            $error.="Please enter your password.</br>";
            $status='yes';
        }elseif(mb_strlen($data['inputPassword'])<8){
            $error.="Password must have at least 8 characters.</br>";
            $status='yes';
        }else{
            if($data['inputPassword']!= $data['inputRePassword']){
                $error.="Please check that your passwords match.</br>";
                $status='yes';
            }
        }

        //Validating First Name
        if($data['inputFullName']==''){
            $error.="You must provide a name.</br>";
            $status='yes';
        }
        //Validating Phone
        if($data['inputPhone']==''){
            $error.="You must provide a phone number.</br>";
            $status='yes';
        }


        return array(
            'status'=>$status,
            'error'=>$error
        );
    }

    public function sendVerificationMail($email,$name){
        $vcode=sha1(strtolower($email));
        $this->db->set('verification', $vcode);
        $this->db->where('pkey',$this->session->userdata('pkey'));
        $this->db->update('login');

        $from='support@innkee.com';
        $fromHeader='Welcome to InnKee.com';
        $replyTo='support@innkee.com';
        $replyToHeader='Reply to InnKee.com';
        $to=$email;
        $subject='Welcome to InnKee.com';
        $data['name']=$name;
        $data['verifyLink']=site_url('index/verifyUser').'/'.$vcode;
        $message=$this->load->view('emails/verificationMail',$data,true);


        $this->load->library('email');
        $this->email->from($from, $fromHeader);
        $this->email->reply_to($replyTo, $replyToHeader);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $result=$this->email->send();
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function verifyUser($vcode){
        $this->db->where('verification',$vcode);
        $query=$this->db->get('login');
        $result=$query->result_array();
        if(!empty($result)){
            $this->db->set('status', 2);
            $this->db->where('verification',$vcode);
            if($this->db->update('login')){
                $this->session->set_flashdata('notification', '<strong>Successfully Verified!</strong>');
                $this->session->set_flashdata('alertType', 'alert-success');
            }
            redirect('index/login','redirect');
        }else{
            $this->session->set_flashdata('notification', '<strong>Wrong or expired verification code!</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('index/login','redirect');
        }
    }

    public  function verifyResetCode($resetCode){
        $this->db->where('verification',$resetCode);
        $query=$this->db->get('login');
        $result=$query->result_array();
        if(!empty($result)){
            return true;
        }else{
            $this->session->set_flashdata('notification', '<strong>Wrong or expired verification code!</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            return false;
        }
    }

    public function sendResetEmail($data){
        $this->db->where('email',$data['email']);
        $query=$this->db->get('login');
        $result=$query->result_array();
        if(!empty($result)){
            $vcode=sha1(strtolower($result[0]['email'].$result[0]['password']));
            $this->db->set('verification', $vcode);
            $this->db->where('pkey',$result[0]['pkey']);
            $this->db->update('login');

            $from='support@innkee.com';
            $fromHeader='InnKee.com Password Reset';
            $replyTo='support@innkee.com';
            $replyToHeader='Reply to InnKee.com';
            $to=$data['email'];
            $subject='InnKee.com Password Reset Email';
            $data['resetLink']=site_url('index/resetPassword').'/'.$vcode;
            $message=$this->load->view('emails/passwordResetLink',$data,true);

            $this->load->library('email');
            $this->email->from($from, $fromHeader);
            $this->email->reply_to($replyTo, $replyToHeader);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            $result=$this->email->send();
            if($result){
                $this->session->set_flashdata('notification', '<strong> An email with a confirmation link has been sent your admin email address. </strong>');
                $this->session->set_flashdata('alertType', 'alert-success');
                redirect('index/login','refresh');
            }else{
                $this->session->set_flashdata('notification', '<strong> Problem while sending Mail! Try Again Later </strong>');
                $this->session->set_flashdata('alertType', 'alert-error');
                redirect('index/resetPassword','refresh');
            }
        }else{
            $this->session->set_flashdata('notification', '<strong> This email is not registered with us</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('index/resetPassword','refresh');
        }
    }

    public function resetPassword($data){
        if($data['password']==''){
            $error="Please enter your password.</br>";
            $this->session->set_flashdata('notification', '<strong>'. $error .'</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('index/resetPassword'.'/'.$data['resetCode'],'refresh');
        }elseif(mb_strlen($data['password'])<8){
            $error="Password must have at least 8 characters.</br>";
            $this->session->set_flashdata('notification', '<strong>'. $error .'</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('index/resetPassword'.'/'.$data['resetCode'],'refresh');
        }elseif($data['password']!= $data['rePassword']){
            $error="Please check that your passwords match.</br>";
            $this->session->set_flashdata('notification', '<strong>'. $error .'</strong>');
            $this->session->set_flashdata('alertType', 'alert-error');
            redirect('index/resetPassword'.'/'.$data['resetCode'],'refresh');
        }else{
            $this->db->set('password',sha1($data['password']));
            $this->db->where('verification',$data['resetCode']);
            $this->db->update('login');
            $this->session->set_flashdata('notification', '<strong> You can now login with your new Password </strong>');
            $this->session->set_flashdata('alertType', 'alert-success');
            redirect('index/login','refresh');
        }
    }
}
