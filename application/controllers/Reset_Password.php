<?php
class Reset_Password extends CI_Controller 
{

	public function index()
	{
		$this->load->view('pages/templates/header');
		$this->load->view('pages/resetPassword');
		$this->load->view('pages/templates/footer');
	}

        //Function is for the validation of the reset password
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
                                $this->email->to($_POST['email']);
                                $this->email->subject('New Password');
                                $message = 'Your password has been reset. Your new password is "'.$newpassword.'"(without quotes). Use this password to login. We recommend you to change the password after logged in.';
                                $this->email->message($message);        
                
                                if($this->email->send())
                                {
                                        $data['message'] = 'Your password has been reset. Check your email inbox for new password';
                
                                     $this->load->view('pages/templates/header');
                                     $this->load->view('pages/resetPassword',$data);
                                     $this->load->view('pages/templates/footer');
                                        //return true;
                                }
                                else
                                {
                                        $data['message'] = 'Please try again';
                
                                     $this->load->view('pages/templates/header');
                                     $this->load->view('pages/resetPassword',$data);
                                     $this->load->view('pages/templates/footer');
                                //show_error($this->email->print_debugger());
                                        //return false;
                                }
        		      /*if($this->database->sendPasswordResetMail($_POST['email'],$newpassword))
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
        		      }*/
        		
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

        // Function for check email exist
	function email_exists($value)
	{
		$this->load->model('database','',TRUE);
		return !($this->database->email_exists($value));
	}
}
?>