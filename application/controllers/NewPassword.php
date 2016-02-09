<?php
class NewPassword extends CI_Controller {

        public function index()
        {
            $data['message'] = 'Please correct these errors...';
            $this->load->view('pages/templates/header1');
            $this->load->view('pages/newPassword',$data);
            $this->load->view('pages/templates/footer');
        }

        public function newp()
        {

        	$this->load->model('database','',TRUE);
        	$this->load->helper(array('form', 'url','security'));
        	$this->load->library('form_validation');

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
                $data['message'] = 'Enter and confirm your new password. Correct the following errors !';
                $data['resetPassword'] = 'yes';
                $this->load->view('pages/templates/header1');
        		$this->load->view('pages/newPassword',$data);
                $this->load->view('pages/templates/footer');
        	}
        	else
        	{
        		$this->Password = $_POST['password'];

        		$this->database->set_new_password($_POST['password'],$_COOKIE['email']);

                $this->load->view('pages/templates/header1');
        		$this->load->view('pages/newPasswordSet');
                $this->load->view('pages/templates/footer');
        	}
        }
}
?>