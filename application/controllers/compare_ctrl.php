<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Compare_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('ads_model');

	}

	public function get_compare_details($array)
	{
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


		$this->data['posts']=$this->ads_model->get_compare_details($querywhere);

		if(empty($this->data['posts']))
        {
            $this->session->set_flashdata('no_list_msg', 'No comparison list found');
        }
		$this->load->view('pages/templates/header');
		$this->load->view('pages/comparison_table',$this->data);
		$this->load->view('pages/templates/footer');
	}
}

?>