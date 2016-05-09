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
	//approve an advertisement according to vehicle id and email, and send an email to that email address
	public function approve($vehicleid,$email)
	{
		

		$config = Array(
  			'protocol' => 'smtp',
  			'smtp_host' => 'ssl://smtp.googlemail.com',
  			'smtp_port' => 465,
  			'smtp_user' => 'autotraderslk@gmail.com', 
  			'smtp_pass' => 'autotraderslk1',
  			'mailtype' => 'html',
  			'charset' => 'iso-8859-1',
  			'wordwrap' => TRUE
		);

		$this->data['posts']=$this->Ads_model->get_ad_to_send($vehicleid);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('autotraderslk@gmail.com');
		$this->email->to($email); 
		

		$this->email->subject('Your ad has been Approved and posted');
		$body=$this->load->view('pages/sendemail',$this->data,TRUE);
		$this->email->message($body);	

		

		if($this->email->send())
    	{
    		$this->Ads_model->approve($vehicleid);
      		
      		
      		$emails=$this->Ads_model->check_saved_search($vehicleid);
      		$this->email->set_newline("\r\n");
			$this->email->from('autotraderslk@gmail.com');
			
			/*foreach ($emails as $row) {
				echo $row;
			}*/
			$this->email->to($emails);

			$this->email->subject("There's a vehicle available to your saved search");
			$body=$this->load->view('pages/searchemail',$this->data,TRUE);
			$this->email->message($body);

			if($this->email->send()){
				$data['pendingadss']=$this->Ads_model->count_pending_ads();
	      		$this->session->set_userdata('pendingads',$data['pendingadss']);
	      		$this->session->set_flashdata('success_msg', 'Advertisement has been approved and email has sent successfully');
	      		redirect("http://www.autotraders.ga/notify_ctrl");
	      	}
	      	else
	     	{
				$this->session->set_flashdata('success_msg', 'Check your internet connection and try again');
	      		redirect("http://www.autotraders.ga/notify_ctrl");
	     	}
      		
      		
     	}
     	else
     	{
			$this->session->set_flashdata('success_msg', 'Check your internet connection and try again');
      		redirect("http://www.autotraders.ga/notify_ctrl");
     	}

		
	}

	public function get_reason($vehicleid)
	{
		$this->data['posts']=$this->Ads_model->get_ad_to_send($vehicleid);
		$this->load->view("pages/templates/header");
		$this->load->view("pages/reject_reason",$this->data);
		$this->load->view("pages/templates/footer");
	}


	public function test($vehicleid,$email)
	{
		$data['posts']=$this->Ads_model->get_ad_to_send($vehicleid);
		$data['reason']=$this->input->post('reason');
		$this->load->view('pages/send_rejectemail',$data);
	}



	//reject a particular advertisement and send reject email to the user
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

		$data['posts']=$this->Ads_model->get_ad_to_send($vehicleid);
		$data['reason']=$this->input->post('reason');
		
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('autotraderslk@gmail.com');
		$this->email->to($email); 

		$this->email->subject('Your ad has been rejected');
		$body=$this->load->view('pages/send_rejectemail',$data,TRUE);
		$this->email->message($body);	


		if($this->email->send())
    	{
    		$this->Ads_model->reject($vehicleid);
    		$data['pendingadss']=$this->Ads_model->count_pending_ads();
      		$this->session->set_userdata('pendingads',$data['pendingadss']);
      		$this->session->set_flashdata('success_msg', 'Advertisement has been rejected and email has sent successfully');
      		redirect("http://www.autotraders.ga/notify_ctrl");
    	}
    	else
    	{
    		$this->session->set_flashdata('success_msg', 'Check your internet connection and try again');
      		redirect("http://www.autotraders.ga/notify_ctrl");
    	}

	}
}

?>