<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Myads_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');

	}

	public function getmyads($email)
	{
		$this->data['posts']=$this->Ads_model->getmyads($email);
		//$_SESSION['ads']=count($this->data);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/manageads',$this->data);
		$this->load->view('pages/templates/footer');
	}

	public function sendemail()
	{
		

		$config = Array(
  			'protocol' => 'smtp',
  			'smtp_host' => 'ssl://smtp.googlemail.com',
  			'smtp_port' => 465,
  			'smtp_user' => 'ishanivv@gmail.com', // change it to yours
  			'smtp_pass' => '31947vvv', // change it to yours
  			'mailtype' => 'html',
  			'charset' => 'iso-8859-1',
  			'wordwrap' => TRUE
		);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('ishanivv@gmail.com');
		$this->email->to('ishkhans30@gmail.com'); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');	

		//$this->email->send();

		if($this->email->send())
    	{
      		echo 'Email sent.';
     	}
     	else
    	{
     		show_error($this->email->print_debugger());
    	}

	}
}

?>