<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
/**
*  
*/
class SubmitOfferCtrl extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('main_model');
    $this->load->helper(array('form', 'url'));

  

  }
  



public function submitOffer($selleremail,$offer,$msg,$id)
{

$msg = urldecode($msg);
  

  $this->main_model->submitOffer($selleremail,$offer,$msg,$id);
  	  

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

	

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('autotraderslk@gmail.com');
		$this->email->to($selleremail); 
	
  	
 
    $this->data['posts']=$this->main_model->getOffer($selleremail,$id);


   



		$this->email->subject('A offer has been made on your advertisement');
		$body=$this->load->view('pages/sendOffer',$this->data,TRUE);
		$this->email->message($body);	

		

		if($this->email->send())
    	{
    		
      		$this->session->set_flashdata('success_msg', 'Your offer has been sent succesfully to ' .$selleremail);
      		redirect("http://www.autotraders.ga/adpreview_ctrl/getad_preview"."/"."$id");
      		
     	}
     	else
     	{
			$this->session->set_flashdata('success_msg', 'Check your internet connection and try again');
      		redirect("http://www.autotraders.ga/adpreview_ctrl/getad_preview"."/"."$id");
     	}

		
	}
}
?>