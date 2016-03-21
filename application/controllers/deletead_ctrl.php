<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Deletead_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('database','',TRUE);
		$this->load->model('editad_model');

	}

	//show details of selected ad.Input parametr is vehicle id.
	public function show_selectedAd($vehicleid)
	{
		$data=array();
		
		$data['ad']=$this->editad_model->getselectedad($vehicleid);
		
		$this->load->view('pages/templates/header');
		$this->load->view('pages/DeleteAd_view',$data);
		$this->load->view('pages/templates/footer');
	}

	//remove the ad from the list. Input parameter is vehicle id
	public function delete_ad($vehicleid){

		$this->editad_model->delete_adModel($vehicleid);

		$this->load->view('pages/templates/header');
		$this->load->view('pages/DeleteAd_success');
		$this->load->view('pages/templates/footer');


	}


}


?>