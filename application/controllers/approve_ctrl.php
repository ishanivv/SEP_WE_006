<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Approve_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');

	}

	public function approve($vehicleid)
	{
		$this->Ads_model->approve($vehicleid);
		$this->data['posts']=$this->Ads_model->getpendingads();
		$data['message']='Ad has been approved';
		$this->load->view('pages/templates/header');
		$this->load->view('pages/notifications',$this->data);
		$this->load->view('pages/templates/footer');
	}

	public function reject($vehicleid)
	{
		$this->Ads_model->reject($vehicleid);
		$this->data['posts']=$this->Ads_model->getpendingads();
		$data['message']='Ad has been approved';
		$this->load->view('pages/templates/header');
		$this->load->view('pages/notifications',$this->data);
		$this->load->view('pages/templates/footer');
	}
}

?>