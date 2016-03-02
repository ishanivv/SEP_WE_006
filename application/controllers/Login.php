<?php

class Login extends CI_Controller 
{

    public $email = '';
    public $password = '';
    public $rememberMe = '';

    public function index()
    {
        $data['message'] = "";
        $this->load->view('login',$data);
    }

    public function log()
    {
            $data['message'] = "";
            $this->load->model('database','',TRUE);
            $this->load->helper(array('form', 'url','security'));
            $this->load->library('form_validation');
            $this->load->library('session');

            $this->form_validation->set_rules
            (
                'email', 
                'Email',
                'required|callback_email_does_not_exists',
                array
                (
                    'required'      => 'You have not provided %s.',
                    'email_does_not_exists'     => 'This %s does not exists.'
                )
            );
            $this->form_validation->set_rules
            (
                'password', 
                'Password', 
                'required',
                array
                (
                    'required'      => 'Enter your %s.'
                )
            );

            if ($this->form_validation->run() == FALSE)
            {
                //$data['message'] = 'correct these mistakes or <a href="http://localhost/ci/ResetPassword">Reset password</a>';
                $this->load->view('pages/templates/header');
                $this->load->view('pages/login');
                $this->load->view('pages/templates/footer');
            }
            else
            {
                $this->Email = $_POST['email'];
                $this->Password = $_POST['password'];
                if(isset($_POST['rememberMe']))
                {
                    $this->rememberMe = $_POST['rememberMe'];
                }


                $result=$this->database->login($_POST['email'],md5($_POST['password']));
                if($result)
                {
                        $this->load->model('Ads_model');
                        $ads=$this->Ads_model->count_my_ads($_POST['email']);
                        $pendingads=$this->Ads_model->count_pending_ads();

                        $this->load->model('main_model');
                        $messages=$this->main_model->count_feedbacks();

                        $session_data=array(
                            'email'=>$result[0]->Email,
                            'type'=>$result[0]->Type,
                            'ads'=>$ads,
                            'pendingads'=>$pendingads,
                            'messages'=>$messages,
                        );
                        $this->session->set_userdata('logged_in',$session_data);
                    
                    
                        $this->load->view('pages/templates/header');
                        $this->load->view('pages/loginSuccessful');
                        $this->load->view('pages/templates/footer');
                }
                else
                {
                    $data['message'] = 'Invalid username password combination';
                    $this->load->view('pages/templates/header');
                    $this->load->view('pages/login',$data);
                    $this->load->view('pages/templates/footer');
                }
            }
    }

    public function email_does_not_exists($value)
    {
        $this->load->model('database','',TRUE);
        return !($this->database->email_exists($value));
    }

    public function auth($em,$pw)
    {
        $this->load->model('database');
        if($this->database->login($em,$pw) == TRUE)
        {
            return;
        }
        else
        {
            $data['message'] = 'Invalid username password combination';
            $this->load->view('pages/templates/header');
            $this->load->view('pages/login',$data);
            $this->load->view('pages/templates/footer');
        }
    }
}