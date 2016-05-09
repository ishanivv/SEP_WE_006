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

	//get the information about a particular approved advertisement using vehicleid
	public function getad_preview($vehicleid)
	{
		$data['details']=$this->ads_model->getad_preview($vehicleid);
		$data['bdetails']=$this->ads_model->getBusinessReviews($vehicleid);
		$data['noOfReviews']=$this->ads_model->countRatings($vehicleid);
		$data['noOfNullRatings']=$this->ads_model->countReviews($vehicleid);
		$data['fivestar']=$this->ads_model->count_5star_ratings($vehicleid);
		$data['fourstar']=$this->ads_model->count_4star_ratings($vehicleid);
		$data['threestar']=$this->ads_model->count_3star_ratings($vehicleid);
		$data['twostar']=$this->ads_model->count_2star_ratings($vehicleid);
		$data['onestar']=$this->ads_model->count_1star_ratings($vehicleid);

		$this->load->view('pages/templates/header');
		$this->load->view('pages/adpreview_view',$data);
		$this->load->view('pages/templates/footer');
	}

	//get the information about a particular pending advertisement using vehicle id
	public function getad_preview_notify($vehicleid){
		$this->data['details']=$this->ads_model->getad_preview($vehicleid);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/notification_view',$this->data);
		$this->load->view('pages/templates/footer');
	}

	//get google map according to the district and location
	public function get_map($district,$location)
	{
		$connected = @fsockopen("www.google.com", 80);
		if($connected)
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
		else
		{
			$this->load->view('pages/no_internet');
		}
		
	}

	public function is_connected()
	{
	    $connected = @fsockopen("www.google.com", 80); 
	                                        //website, port  (try 80 or 443)
	    if ($connected){
	        $is_conn = true; //action when connected
	        fclose($connected);
	    }else{
	        $is_conn = false; //action in connection failure
	    }
	    return $is_conn;

	}

	public function printPage($vehicleid){

		$data['details']=$this->ads_model->getad_preview($vehicleid);

		$this->load->view('pages/templates/header');
		$this->load->view('pages/printPage',$data);
		$this->load->view('pages/templates/footer');
	}

}

?>