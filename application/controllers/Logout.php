<?php
	class Logout extends CI_Controller 
	{
		public function index()
		{
			$this->load->library('session');

		}

		public function out()
		{
			
        	setcookie('remember', null, -1, '/');
			setcookie('email', null, -1, '/');
			setcookie('resetPassword', null, -1, '/');
			setcookie('type',null,-1,'/');

			$data['message'] = '';
			$this->load->view('pages/templates/header');
			$this->load->view('pages/Login',$data);
			$this->load->view('pages/templates/footer');
		}
	}
?>