<?php
class Register extends CI_Controller {

        public $Name;
        public $Email;
        public $Password;
        public $Type;

        public function index()
        {
                $this->load->view('register');
        }

        public function reg()
        {

            $this->load->model('database','',TRUE);
            $this->load->helper(array('form', 'url','security'));
            $this->load->library('form_validation');

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
                'userName', 
                'Username',
                'required|min_length[6]|max_length[12]|callback_userName_exists|alpha',
                array
                (
                    'required'      => 'You have not provided %s.',
                    'userName_exists'     => 'This %s already exists.',
                    'min_length'      => 'Name must be atleast 6 characters long.',
                    'max_length'      => 'Name must be shorter than 12 characters.',
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
                $this->Name = $_POST['userName'];
                $this->Email = $_POST['email'];
                $this->Password = $_POST['password'];
                $this->Type = $_POST['userType'];

                $this->db->insert('user', $this);

                $this->load->view('pages/templates/header');
                $this->load->view('pages/registrationSuccessful');
                $this->load->view('pages/templates/footer');
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