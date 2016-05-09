<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Favourite_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');

	}

	public function insert_into_favourite()
	{


		$email = $this->session->userdata['logged_in']['email']; 

		$info=$this->main_model->insert_into_favourite($email,$_POST['vehicleID']);
			
		
			
	
	}

	
}

?>