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
                    'required'      => 'Enter %s.'
                )
            );

            if ($this->form_validation->run() == FALSE)
            {
                $data['message'] = 'correct these mistakes or <a href="http://localhost/ci/ResetPassword">Reset password</a>';
                $this->load->view('pages/templates/header');
                $this->load->view('pages/login',$data);
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
                if($this->database->login($_POST['email'],$_POST['password']) == TRUE)
                {
                    session_start();
                    $_SESSION['email'] = $_POST['email'];
                    if(isset($_POST['rememberMe']))
                    {
                        if(true/*$_POST['rememberMe'] == 'yes'*/)
                        {
                            setcookie('remember', 'yes', time() + (600), "/");
                            setcookie('email',$_SESSION['email'], time() + (600), "/");
                        }
                    }
                    //$data['message'] = '<p>Hello '.$_SESSION['name'].'</p>';
                    if($this->database->isadmin($_POST['email'])==TRUE)
                     {
                        $_SESSION['type']='admin';
                        setcookie('type',$_SESSION['type'],time()+(600),"/");
                        //$data['admin']='yes';
                        $this->load->view('pages/templates/header');
                       
                     } 
                     else {  
                        $data['admin']='';
                        $this->load->view('pages/templates/header',$data);
                       
                    }

                    $data['auth'] = '<a href="http://localhost/ci/Logout/out" style="text-align:right">Log Out</a>';
                    $this->load->view('pages/loginSuccessful',$data);
                    $this->load->view('pages/templates/footer');
                }
                else
                {
                    $data['message'] = 'correct these mistakes or <a href="http://localhost/ci/ResetPassword">Reset password</a><br/>Invalid username password combination';
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