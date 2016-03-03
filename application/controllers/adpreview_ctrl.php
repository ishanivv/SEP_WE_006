<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Adpreview_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('ads_model');

	}

	public function getad_preview($vehicleid)
	{
		$this->data['details']=$this->ads_model->getad_preview($vehicleid);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/adpreview_view',$this->data);
		$this->load->view('pages/templates/footer');
	}

	public function getad_preview_notify($vehicleid){
		$this->data['details']=$this->ads_model->getad_preview($vehicleid);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/notification_view',$this->data);
		$this->load->view('pages/templates/footer');
	}

	public function get_map($district,$location)
	{
		$this->load->library('googlemaps');

		$config= array();
		$config['center']=$location.$district;
		$this->googlemaps->initialize($config);

		$marker= array();
		$marker['position']=$location.$district;
		$this->googlemaps->add_marker($marker);

		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('pages/demomap', $data);
	}
}

?>