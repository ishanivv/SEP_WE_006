<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Approve_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');

	}

	public function approve($vehicleid,$email)
	{
		

		$config = Array(
  			'protocol' => 'smtp',
  			'smtp_host' => 'ssl://smtp.googlemail.com',
  			'smtp_port' => 465,
  			'smtp_user' => 'autotraderslk@gmail.com', // change it to yours
  			'smtp_pass' => 'autotraderslk1', // change it to yours
  			'mailtype' => 'html',
  			'charset' => 'iso-8859-1',
  			'wordwrap' => TRUE
		);

		$this->data['posts']=$this->Ads_model->getadtosend($vehicleid);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('autotraderslk@gmail.com');
		$this->email->to($email); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Your ad has been Approved and posted');
		$body=$this->load->view('pages/sendemail',$this->data,TRUE);
		$this->email->message($body);	

		//$this->email->send();

		if($this->email->send())
    	{
    		$this->Ads_model->approve($vehicleid);
			$this->data['posts']=$this->Ads_model->getpendingads();
      		$data['message']='Ad has been approved';
			$this->load->view('pages/templates/header');
			$this->load->view('pages/notifications',$this->data);
			$this->load->view('pages/templates/footer');
     	}
     	else
     	{
			$this->data['posts']=$this->Ads_model->getpendingads();
     		//$data['message']='Please try again';
			$this->load->view('pages/templates/header');
			$this->load->view('pages/notifications',$this->data);
			$this->load->view('pages/templates/footer');
     	}

		
	}

	public function reject($vehicleid)
	{
		$this->Ads_model->reject($vehicleid);
		$this->data['posts']=$this->Ads_model->getpendingads();
		$data['message']='Ad has been approved';
		$this->load->view('pages/templates/header');
		$this->load->view('pages/notifications',$this->data);
		$this->load->view('pages/templates/footer');
	}
}

?>