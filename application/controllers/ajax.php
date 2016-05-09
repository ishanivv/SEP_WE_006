<?php
class Ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ads_model');
	}

	public function index()
	{	

		//echo $_POST['vehicleID']; 
		$info = $this->Ads_model->getVehicleAjax($_POST['vehicleID']);

		echo json_encode($info['0']);


		//$vehicleList = json_decode($_POST['vehicleID']);

		// foreach ($vehicleList as $vehicle) {
		//   echo "$vehicle\n";
		// }

		//echo $vehicleList[0];
		//$json = json_decode($_POST['vehicleList'], true);
		//echo print_r($json);
	}
}
?>