<?php
class Home extends CI_Controller 
{
	public function index()
	{
		if((isset($_COOKIE['remember']))&&(isset($_COOKIE['name']))&&($_COOKIE['remember']=='yes'))
		{
			session_start();
			$_SESSION['name'] = $_COOKIE['name'];
		}
		if(isset($_SESSION['name']))
		{
			$data['message'] = '<p style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);"><h1>Hello '.$_SESSION['name'].'</h1></p>';
			$data['auth'] = '<a href="http://localhost/UserPart/Logout" style="text-align:right">Log Out</a>';
			$this->load->view('home',$data);
		}
		else
		{
			$data['message'] = '<p style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);"><h1>Hello Guest</h1></p>';
			$data['auth'] = '<a href="http://localhost/UserPart/Login" style="text-align:right">Log In</a>';
			$this->load->view('home',$data);
		}
	}
}
?>