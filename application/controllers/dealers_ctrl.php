<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Dealers_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}

	public function index()
	{
		$this->data['users']=$this->main_model->get_dealers();
		$this->load->view('pages/templates/header');
		$this->load->view('pages/dealers',$this->data);
		$this->load->view('pages/templates/footer');
	}

	public function load_dealer_view($dealeremail)
	{
		$data['posts']=$this->main_model->load_dealer_view($dealeremail);
		$data['users']=$this->main_model->get_dealer($dealeremail);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/dealer_view',$data);
		$this->load->view('pages/templates/footer');
	}

	public function account_search()
	{
		$name=$_POST['name'];
		$companyname=$_POST['companyname'];
		$city=$_POST['district'];

		
	}

	public function get_map($district)
	{
		$connected = @fsockopen("www.google.com", 80);
		if($connected)
		{
			$this->load->library('googlemaps');

			$config= array();
			$config['center']=$district;
			$this->googlemaps->initialize($config);

			$marker= array();
			$marker['position']=$district;
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

}
?>