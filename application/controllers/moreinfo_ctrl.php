<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Moreinfo_ctrl extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}
	
	public function get_sellers_email($vehicleid,$email)// display the email and message in the reply to feedback form
	{
	
		//$this->data['details']=$this->main_model->get_sellers_email($vehicleid);

		$this->load->view('pages/templates/header');
		$this->load->view('pages/moreinfo_view',compact('vehicleid','email'));
		$this->load->view('pages/templates/footer');

		
	}

}

	?>