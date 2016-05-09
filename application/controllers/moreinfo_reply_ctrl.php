<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Moreinfo_reply_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}
	public function send_email_moreinfo($email,$vehicleid)// send s mail accoring to the email & message
	{


			/*$this->load->library('form_validation');
			$this->form_validation->set_rules(
				'Name',
				'required|alpha',
				array
				(
					'required'      => 'You have not provided %s.',
	                'alpha_dash'     => 'You cannot have numbers in your %s.'

				)

				);
			$this->form_validation->set_rules(
				'Email',
				'required',
				array
				(
					'required'      => 'You have not provided %s.',
	            

				)

				);
			$this->form_validation->set_rules(
				'Phone',
				'required|numeric',
				array
				(
					'required'      => 'You have not provided %s.',
	                'numeric'     => 'You cannot have anything other than numbers'

				)

				);

			if($this->form_validation->run==FALSE)
			{

				$this->load->view('pages/templates/header');
				$this->load->view('pages/moreinfo_view');
				$this->load->view('pages/templates/footer');

			}
			else{*/

		

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

			//$subject=$_POST['subject'];
			//$message=$_POST['reply'];

			$subject=$_POST['Name'];
			$useremail=$_POST['Email'];
			$phone=$_POST['Phone'];
			$cmail=$_POST['checkemail'];
			$cphone=$_POST['checkphn'];
			$url="http://www.autotraders.ga/adpreview_ctrl/getad_preview/".$vehicleid;

			//$subject = ('Request more information about the vehicle');
			//$message = 'Dear Customer'$name'is want more information about the vehicle, So send more information for' $user_email.

			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from('autotraderslk@gmail.com');
			$this->email->to($email);

			

			


			$this->email->subject('Request more information about the vehicle');
			
							
                  if ((int) $cmail == 1 || is_null($cphone))   {
                                 
					$this->email->message('Dear Customer, '.$subject.' is need more information about the following vehicle you added.'.$url.' please use  '.$useremail.' to send more information about your vehicle');	
	

                  }
                  elseif ((int) $cphone == 1 || is_null($cmail)) {
                  	$this->email->message('Dear Customer, '.$subject.' is need more information about the following vehicle you added.'.$url.'  please use  '.$phone.'to inform more details about youur vehicle');	
                  }
                                            
                  else{
					$this->email->message('Dear Customer, '.$subject.' is need more information about the following vehicle you added.'.$url.' please send more information to this email  '.$useremail.' or please use  '.$phone.' to inform more details about your vehicle');	
					}

		

			if($this->email->send())
    		{
    			//$this->main_model->change_feedback_status($feedbackid);
				$this->session->set_flashdata('success_msg', 'Email has sent successfully');
      			redirect("http://www.autotraders.ga/adpreview_ctrl/getad_preview/".$vehicleid);
     		}
     		else
    		{
     			$this->session->set_flashdata('success_msg', 'Check your internet connection and try again');
      			redirect("http://www.autotraders.ga/adpreview_ctrl/getad_preview/".$vehicleid);
    		}

    		
    	
	//}
}

}

?>