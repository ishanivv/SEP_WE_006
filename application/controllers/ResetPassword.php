<?php
class ResetPassword extends CI_Controller 
{

	public function index()
	{
		$this->load->view('pages/templates/header');
		$this->load->view('pages/resetPassword');
		$this->load->view('pages/templates/footer');
	}

	public function reset()
	{
		$this->load->model('database','',TRUE);
		$this->load->helper(array('form', 'url','security'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules
		(
			'email', 
			'Email', 
			'required|valid_email|callback_email_exists',
			array
			(
				'required'      => 'You have not provided %s.',
				'email_exists'     => 'There is no user account registered with this emai address.'
			)
		);
        if($this->form_validation->run() == FALSE)
        {
        	$this->load->view('pages/templates/header');
        	$this->load->view('pages/resetPassword');
        	$this->load->view('pages/templates/footer');
        }
        else
        {
        	$newpassword= $this->database->resetPassword($_POST['email']);

        	if($newpassword)
        	{
        		if($this->database->sendPasswordResetMail($_POST['email'],$newpassword))
        		{
        			$data['message'] = 'Your password has been reset. Check your email inbox for new password';
        	
        			$this->load->view('pages/templates/header');
        			$this->load->view('pages/resetPassword',$data);
        			$this->load->view('pages/templates/footer');
        		}
        		else
        		{
        			$data['message'] = 'Please try again';
        	
        			$this->load->view('pages/templates/header');
        			$this->load->view('pages/resetPassword',$data);
        			$this->load->view('pages/templates/footer');
        		}
        		
        	}
        	else
        	{
        		$data['message'] = 'Please try again';
        	
        		$this->load->view('pages/templates/header');
        		$this->load->view('pages/resetPassword',$data);
        		$this->load->view('pages/templates/footer');
        	}
        }
	}

	function email_exists($value)
	{
		$this->load->model('database','',TRUE);
		return !($this->database->email_exists($value));
	}
}
?>