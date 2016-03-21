<?php
	class Logout extends CI_Controller 
	{
		public function index()
		{
			$this->load->library('session');

		}
		//Function for the logout from the current session
		public function out()
		{
			
			$sess_array = array(
			'email' => '',
			'type' =>'',
			'ads'=>'',
			'pendingads'=>'',
			'messages'=>'',
			);
			$this->session->unset_userdata('logged_in', $sess_array);

			//$data['message'] = '';
			$this->load->view('pages/templates/header');
			$this->load->view('pages/login');
			$this->load->view('pages/templates/footer');
		}
	}
?>