<?php
class Register extends CI_Controller {
        public $Name;
        public $Email;
        public $Phone;
        public $Password;
        public $Type;
        public $CompanyName;
        public $Address;
        public $WebSite;

        public function index()
        {
                $this->load->view('pages/templates/header');
                $this->load->view('pages/register',array('error'=>''));
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

            $this->form_validation->set_rules
            (
                'companyName', 
                'Company Name', 
                'required',
                array
                (
                    'required'      => 'You have not provided %s.'
                )
            );
            $this->form_validation->set_rules
            (
                'address', 
                'Address', 
                'required',
                array
                (
                    'required'      => 'You have not provided %s.'
                )
            );

            $this->form_validation->set_rules
            (
                'userfile', 
                'Company Logo', 
                'callback_upload_file',
                array
                (
                    'upload_file'   => 'Error uploading %s',
                    
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
        
                $this->Name = $_POST['Name'];
                $this->Email = $_POST['email'];
                $this->Phone = $_POST['telephoneNo'];
                $this->Address = $_POST['address'];
                $this->WebSite = $_POST['webSite'];
                $this->CompanyName = $_POST['companyName'];
                $this->Password = md5($_POST['password']);
                $this->Type = $_POST['userType'];
                

                $this->db->insert('user', $this);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $url = "http://www.autotraders.ga/MyProf/start";
                $activity = "Registered on www.AutoTraders.ga";
                $dateTime = date("Y-m-d").", ".date("h:i:sa");
                $email = $_POST['email'];
                $this->database->log_activity($email,$activity,$url,$dateTime);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $config = Array
                (
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'autotraderslk@gmail.com',
                    'smtp_pass' => 'autotraderslk1',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );

                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('autotraderslk@gmail.com');
                $this->email->to($email);
                $this->email->subject('Registration');
                $message = 'You have successfully registered. You can now proceed with posting free advertisements.';
                $this->email->message($message);    
                
                //if($this->email->send())
                //{
                    $this->load->view('pages/templates/header');
                    $this->load->view('pages/registrationSuccessful');
                    $this->load->view('pages/templates/footer');
                    //return true;
                //}
                /*else
                {
                    show_error($this->email->print_debugger());
                    
                    //return false;
                }*/
                
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

        function upload_file($value)
        {

            $config['upload_path']          = './images/logos/';
            $config['allowed_types']        = 'jpg|jpeg|gif|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('userfile'))
            {
                $upload_data = $this->upload->data();
                $this->Photo = $upload_data['file_name'];
                return true;
            }
            else
            {
                if(($_POST['userType'])=='Business'){
                    return false;
                }
                else{
                    $this->Photo = 'default-user.png';
                    return true;
                }
            }
        }
}
?>