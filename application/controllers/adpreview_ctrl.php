<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Adpreview_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

	}

	public function getad_preview($vehicleid)
	{
		$this->load->model('main_model');
		$this->data['details']=$this->main_model->getad_preview($vehicleid);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/adpreview_view',$this->data);
		$this->load->view('pages/templates/footer');
	}

	public function getad_preview_notify($vehicleid){
		$this->load->model('main_model');
		$this->data['details']=$this->main_model->getad_preview($vehicleid);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/notification_view',$this->data);
		$this->load->view('pages/templates/footer');
	}
}

?>