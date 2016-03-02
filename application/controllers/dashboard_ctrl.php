<?php
class Dashboard_ctrl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');

	}

	public function load_my_ads($email)
	{
		$this->data['posts']=$this->Ads_model->get_my_ads($email);
		//$_SESSION['ads']=count($this->data);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/user-dashboard',$this->data);
		$this->load->view('pages/templates/footer');
	}




}
?>