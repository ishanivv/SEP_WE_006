<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_feedback_ctrl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('main_model');

	}

	//view all the feedbacks in the database
	public function index()
	{
		$this->data['adminfeeds']=$this->main_model->get_feedback();
		$this->load->view('pages/templates/header');
		$this->load->view('pages/all_feedbacks',$this->data);
		$this->load->view('pages/templates/footer');	

	}

	// change the feedback status into checked in all feedbacks view
	public function change_feedback_status($feedbackid)
	{
		$this->main_model->change_feedback_status($feedbackid);
		$messages=$this->main_model->count_feedbacks();
    	$this->session->set_userdata('messages',$messages);
		$this->session->set_flashdata('success_msg', 'Message status has been changed');
      	redirect("http://www.autotraders.ga/admin_feedback_ctrl");
	}

	// delete the feedback from the all feedback view
	public  function delete_feedback($feedbackid)
	{

		$this->load->model('main_model');
		$this->main_model->delete_feedback($feedbackid);
		$this->session->set_flashdata('success_msg', 'Message has deleted successfully');
      	redirect("http://www.autotraders.ga/admin_feedback_ctrl");
	}

	// display the email and message in the reply to feedback form
	public function get_feedback_email($feedbackid)
	{
		$this->data['details']=$this->main_model->get_feedback_email($feedbackid);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/feedbackemail',$this->data);
		$this->load->view('pages/templates/footer');
	}

	// display the view form of the feedback according to the selection 
	public function get_feedback_view($feedbackid)
	{
		$this->data['details']=$this->main_model->get_feedback_view($feedbackid);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/feedback_view',$this->data);
		$this->load->view('pages/templates/footer');
	}


}


	



	?>