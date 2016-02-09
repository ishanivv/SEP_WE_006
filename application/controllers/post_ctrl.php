<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Post_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

	}

	public function insert_into_vehicle()
	{
		$this->load->model('main_model');
		$this->main_model->insert_into_vehicle();
		//$this->load->view('pages/templates/header');
		$this->load->view('pages/success');
		//$this->load->view('pages/templates/footer')
	}
}

?>