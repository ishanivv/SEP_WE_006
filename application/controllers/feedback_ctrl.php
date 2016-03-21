<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Feedback_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

	}

	// validations of the contact us form and view the contact us page with the successfull message 
	public function insert_into_feedback()
	{
		$this->load->library('form_validation');
		$this->load->model('main_model');
		$this->form_validation->set_rules(
				'name',
				'Name',
				'required|alpha',
			array
            (
                'required'      => 'You have not provided %s.',
                'alpha_dash'     => 'You cannot have numbers in your %s.'
            )

			);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|valid_email',
			array
			(
				'required' =>'You have not provided %s.',
				'valid_email'=>'Enter a valid %s.'
			)
		);
		$this->form_validation->set_rules(
				'message',
				'Message',
				'required',
			array
            (
                'required'      => 'You have not provided %s.',
                //'alpha'     => 'You cannot have numbers in your %s.'
            )

			);

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('pages/templates/header');
				$this->load->view('pages/contactus');
				$this->load->view('pages/templates/footer');
			}
			else{
				$this->main_model->insert_into_feedback();
				$this->session->set_flashdata('success_msg', 'Your message has sent successfully');
				$this->load->view('pages/templates/header');
				$this->load->view('pages/contactus');
				$this->load->view('pages/templates/footer');	
			}

	}
}

?>