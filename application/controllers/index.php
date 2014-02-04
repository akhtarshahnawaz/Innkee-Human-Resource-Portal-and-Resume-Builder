<?Php

class Index extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function index($page=null){
        if(isset($page)){
            $this->load->view('static/'.$page);
        }else{
            $this->load->view('static/index');
        }
    }

    public function login(){
        if($this->session->userdata('loggedIn')){
            redirect('/panel/index/', 'refresh');
        }else{
            $data=$this->input->post();
            if(!empty($data)){
                $this->load->model('mindex');
                $this->mindex->checkLogin($data);
            }else{
                $data['title']="Login";
                $this->load->view('head',$data);
                $this->load->view('login');
                $this->load->view('footer');
            }
        }
    }

    public function logout(){
        if($this->session->userdata('loggedIn') || $this->session->userdata('adminLoggedIn') || $this->session->userdata('employerLoggedIn')){
            $this->session->sess_destroy();
            redirect('/index/login/', 'refresh');
        }else{
            echo "Page not Found";
        }
    }

    public function register($type=null){
        if($this->session->userdata('loggedIn')){
            redirect('/panel/index/', 'refresh');
        }else{
            $data=$this->input->post();
            if(empty($data)){
                if($type=='intern' || $type=='jobSeeker' || $type=='employer'){
                    if($type=='intern'){
                        $data['title']="Intern Register";
                    }elseif($type=='jobSeeker'){
                        $data['title']="Jobseeker Register";
                    }
                    elseif($type=='employer'){
                        $data['title']="Employer Register";
                    }
                    $data['type']=$type;
                    $this->load->view('head',$data);
                    $this->load->view('panel/register_form',$data);
                    $this->load->view('footer');
                }
            }else{
                $this->load->model('mindex');
                $result=$this->mindex->insertApplicant($data);
                if(is_array($result)){
                    $type=$result['data']['type'];
                }
                if($type=='intern'){
                    $data['title']="Intern Register";
                }elseif($type=='jobSeeker'){
                    $data['title']="Jobseeker Register";
                }
                $data['type']=$type;
                $data['data']=$result['data'];
                $data['errors']=$result['errors'];
                $this->load->view('head',$data);
                $this->load->view('panel/register_form',$data);
                $this->load->view('footer');
            }
        }
    }

    public function registerEmployer(){
        $data=$this->input->post();
        if(empty($data)){
            $data['title']="Employer Register";
            $this->load->view('head',$data);
            $this->load->view('employer/register_form');
            $this->load->view('footer');

        }else{
            $this->load->model('mindex');
            $this->mindex->insertEmployer($data);
        }
    }

    public function verifyUser($vcode=null){
        if(isset($vcode)){
            $this->load->model('mindex');
            $this->mindex->verifyUser($vcode);
        }
    }

    public function resetPassword($resetCode=null){
        $data=$this->input->post();
        $this->load->model('mindex');

        if(isset($resetCode)){
            $VRCode=$this->mindex->verifyResetCode($resetCode);
             if($VRCode == true){
               if(!empty($data)){
                    $this->mindex->resetPassword($data);
                }else{
                    $data['title']="Reset Password";
                    $data['resetCode']=$resetCode;
                    $this->load->view('head',$data);
                    $this->load->view('resetPassword',$data);
                    $this->load->view('footer');
                }
            }
        }else{
            if(!empty($data)){
                $this->mindex->sendResetEmail($data);
            }else{
                $data['title']="Enter Reset Email";
                $this->load->view('head',$data);
                $this->load->view('enterResetEmail');
                $this->load->view('footer');
            }
        }
    }
}


