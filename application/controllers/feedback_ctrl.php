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

	public function insert_into_feedback()
	{
		$this->load->model('main_model');
		$this->main_model->insert_into_feedback();
		//$this->load->view('pages/templates/header');
		//data['message'] = 'Data Inserted Successfully';
		//Loading View
		//$this->load->view('pages/contactus', $data);
		$this->load->view('pages/success');
		//$this->load->view('pages/templates/footer');
	}
}

?>