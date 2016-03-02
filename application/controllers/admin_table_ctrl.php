<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



	class Admin_table_ctrl extends CI_Controller{
		public function _Construct(){
			parent::_Construct();
			$this->load->database();
			
		}


		public function index(){
			$this->load->model('admin_model');
			$this->data['admins']=$this->admin_model->get_all_admins();
			$this->load->view('pages/templates/header');
			$this->load->view('pages/addadmin',$this->data);
			$this->load->view('pages/templates/footer');
		}
	}

?>