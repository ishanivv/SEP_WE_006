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

		$this->data['posts']=$this->Ads_model->get_ad_to_send($vehicleid);

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
			/*$this->data['posts']=$this->Ads_model->getpendingads();
      		$data['message']='Ad has been approved';*/
      		$pendingads=$this->Ads_model->count_pending_ads;
      		$pendingads--;
      		//$this->session->set_userdata('pendingads',$pendingads);
      		$this->session->set_userdata((['logged_in']['pendingads']),$pendingads);
      		$this->session->set_flashdata('success_msg', 'Advertisement has been approved and email has sent successfully');
      		redirect("http://localhost/ci/notify_ctrl");
      		
     	}
     	else
     	{
			$this->session->set_flashdata('success_msg', 'Check your internet connection and try again');
      		redirect("http://localhost/ci/notify_ctrl");
     	}

		
	}

	public function reject($vehicleid,$email)
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

		$this->data['posts']=$this->Ads_model->get_ad_to_send($vehicleid);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('autotraderslk@gmail.com');
		$this->email->to($email); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Your ad has been rejected');
		$body=$this->load->view('pages/send_rejectemail',$this->data,TRUE);
		$this->email->message($body);	

		//$this->email->send();

		if($this->email->send())
    	{
    		$this->Ads_model->reject($vehicleid);
    		$pendingads=$this->Ads_model->count_pending_ads;
      		$pendingads--;
      		//$this->session->set_userdata('pendingads',$pendingads);
      		$this->session->set_userdata((['logged_in']['pendingads']),$pendingads);
      		//$this->session->set_userdata('pendingads',$pendingads);
      		$this->session->set_flashdata('success_msg', 'Advertisement has been rejected and email has sent successfully');
      		redirect("http://localhost/ci/notify_ctrl");
    	}
    	else
    	{
    		$this->session->set_flashdata('success_msg', 'Check your internet connection and try again');
      		redirect("http://localhost/ci/notify_ctrl");
    	}

	}
}

?>