<?php
class Register extends CI_Controller {

        public function index()
        {
                $this->load->view('pages/templates/header');
                $this->load->view('pages/register');
                $this->load->view('pages/templates/footer');
        }

        public function reg()
        {

            $this->load->model('database','',TRUE);
            $this->load->helper(array('form', 'url','security'));
            $this->load->library('form_validation');
            $this->load->library('encrypt');

            $this->form_validation->set_rules
            (
                'email', 
                'Email', 
                'required|callback_email_exists|valid_email',
                array
                (
                    'required'      => 'You have not provided %s.',
                    'email_exists'     => 'There is an account already registered with this %s.'
                )
            );
            $this->form_validation->set_rules
            (
                'Name', 
                'Name',
                'required|alpha',
                array
                (
                    'required'      => 'You have not provided %s.',
                    'alpha'      => 'Name can only contain alphabatical values.'
                )
            );
            $this->form_validation->set_rules
            (
                'password', 
                'Password', 
                'required|min_length[6]',
                array
                (
                    'required'      => 'You have not provided %s.',
                    'min_length'      => 'Password must be atleast 6 characters long.'
                )
            );
            $this->form_validation->set_rules('confirmPassword', 'Password Confirmation', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('pages/templates/header');
                $this->load->view('pages/register');
                $this->load->view('pages/templates/footer');
            }
            else
            {
        
                $this->database->register();
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'autotraderslk@gmail.com', // change it to yours
                    'smtp_pass' => 'autotraderslk1', // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );

                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('autotraderslk@gmail.com');
                $this->email->to($_POST['email']); 
                //$this->email->cc('another@another-example.com'); 
                //$this->email->bcc('them@their-example.com'); 

                $this->email->subject('Thank you for registering with Autotraders');
                $this->email->message('Dear customer,You are successfully registered as a private member in our web site. You can now proceed with posting free advertisements.');  

                //$this->email->send();

                if($this->email->send())
                {
                    $this->load->view('pages/templates/header');
                    $this->load->view('pages/registrationSuccessful');
                    $this->load->view('pages/templates/footer');
                }
                else
                {
                    show_error($this->email->print_debugger());
                }
                
            }
        }

        function userName_exists($value)
        {
            $this->load->model('database','',TRUE);
            return $this->database->name_exists($value);
        }

        function email_exists($value)
        {
            $this->load->model('database','',TRUE);
            return $this->database->email_exists($value);
        }
}
?>