<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Saved_cars_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');

	}

	public function get_saved_cars($array)
	{
		/*$this->data['details']=$this->Ads_model->get_saved_cars($email);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/savedcars',$this->data);
		$this->load->view('pages/templates/footer');*/

		$querywhere="";
		$arr=explode(',', $array);
		for ($i=0; $i <sizeof($arr) ; $i++) {
			if(empty($querywhere)) 
			{
				//echo $array[$i];
				$querywhere=$querywhere."Vehicleid='$arr[$i]'";
			}
			else
			{
				$querywhere=$querywhere." or Vehicleid='$arr[$i]'";
			}
		}

		$this->data['details']=$this->Ads_model->get_saved_cars($querywhere);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/savedcars',$this->data);
		$this->load->view('pages/templates/footer');
	}


}

?>