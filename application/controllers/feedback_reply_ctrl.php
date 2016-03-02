<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Feedback_reply_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}

	public function get_feedback_email($feedbackid)
	{
		$this->data['details']=$this->main_model->get_feedback_email($feedbackid);
		$this->load->view('pages/templates/header');
		$this->load->view('pages/feedbackemail',$this->data);
		$this->load->view('pages/templates/footer');
	}

	public function reply_to_feedback($email,$feedbackid)
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

			$subject=$_POST['subject'];
			$message=$_POST['reply'];

			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('autotraderslk@gmail.com');
			$this->email->to($email);


			$this->email->subject($subject);
			$this->email->message($message);	
			//$this->email->send();

			if($this->email->send())
    		{
    			$this->main_model->change_feedback_status($feedbackid);
				$this->session->set_flashdata('success_msg', 'Email has sent successfully');
      			redirect("http://localhost/ci/admin_feedback_ctrl");
     		}
     		else
    		{
     			$this->session->set_flashdata('success_msg', 'Check your internet connection and try again');
      			redirect("http://localhost/ci/admin_feedback_ctrl");
    		}
    	
	}

}

?>