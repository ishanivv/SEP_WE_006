<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class All_ads_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');

	}

	public function index()
	{
		$this->data['posts']=$this->Ads_model->get_ads();
		$this->load->view('pages/templates/header');
		$this->load->view('pages/allads_view',$this->data);
		$this->load->view('pages/templates/footer');
	}
}

?>