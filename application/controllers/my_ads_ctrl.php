<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class My_ads_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');

	}

	//get all the ads posted by the logged in user.
	public function get_my_ads($email)
	{
		$this->data['posts']=$this->Ads_model->get_my_ads($email);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/manageads',$this->data);
		$this->load->view('pages/templates/footer');
	}

}

?>