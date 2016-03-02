<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_feedback_ctrl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('main_model');

	}


	public function index()
	{
		$this->data['adminfeeds']=$this->main_model->get_feedback();
		$this->load->view('pages/templates/header');
		$this->load->view('pages/all_feedbacks',$this->data);
		$this->load->view('pages/templates/footer');	

	}
	public function change_feedback_status($feedbackid)
	{
		$this->main_model->change_feedback_status($feedbackid);
		$this->session->set_flashdata('success_msg', 'Message status has been changed');
      	redirect("http://localhost/ci/admin_feedback_ctrl");
	}

	public  function delete_feedback($feedbackid)
	{

		$this->load->model('main_model');
		$this->main_model->delete_feedback($feedbackid);
		$this->session->set_flashdata('success_msg', 'Message has deleted successfully');
      	redirect("http://localhost/ci/admin_feedback_ctrl");
	}


}


	



	?>