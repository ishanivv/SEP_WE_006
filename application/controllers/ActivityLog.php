<?php
	class ActivityLog extends CI_Controller 
	{
		public function index()
		{
		}

		public function actLog(){

			$this->load->model('database','',TRUE);
			$activities = $this->database->getActivities(($this->session->userdata['logged_in']['email']));

			$data['activities'] = $activities;

			$this->load->view('pages/templates/header');
			$this->load->view('pages/activityLog',$data);
			$this->load->view('pages/templates/footer');
		}
	}
?>