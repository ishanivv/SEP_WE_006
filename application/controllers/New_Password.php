<?php
class New_Password extends CI_Controller {

        public function index()
        {
            
            $this->load->view('pages/templates/header');
            $this->load->view('pages/myprofile');
            $this->load->view('pages/templates/footer');
        }

        //Function for the validation of the new password
        public function newp()
        {
            $data['message'] = 'Please correct these errors...';
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
                $this->load->view('pages/templates/header');
                $this->load->view('pages/changePassword');
                $this->load->view('pages/templates/footer');
        	}
        	else
        	{
        		$this->Password = $_POST['password'];

        		$this->database->set_new_password(md5($_POST['password']),$this->session->userdata['logged_in']['email']);
                $this->database->unsetReset($this->session->userdata['logged_in']['email']);
                $data['message']='Password has been changed';
                $this->load->view('pages/templates/header');
        		//$this->load->view('pages/newPasswordSet');
                $this->load->view('pages/changePassword',$data);
                $this->load->view('pages/templates/footer');
        	}
        }

        public function check_old_password($value)
        {
            $this->load->model('database','',TRUE);
            return $this->database->check_old_password($value,$this->session->userdata['logged_in']['email']);
        }
}
?>