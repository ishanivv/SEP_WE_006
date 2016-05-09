<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
/**
*  
*/
class MakeAnOfferCtrl extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('editad_model');
  

  }
  

  	public function sendSellerEmailToView($email,$vehicleid)
  	{

  		

       $data['details'] = array();
   $data['details']['email'] = $email;
   $data['details']['id'] = $vehicleid;





  		$this->load->view('pages/templates/header');
        $this->load->view('pages/makeAnOfferView',$data);
        $this->load->view('pages/templates/footer');




  	}

public function sendSellerEmailToReview($email,$vehicleid)
    {

      $data['details'] = array();
   $data['details']['email'] = $email;
   $data['details']['id'] = $vehicleid;

      

      $this->load->view('pages/templates/header');
        $this->load->view('pages/reviewOfferView',$data);
        $this->load->view('pages/templates/footer');




    }




}
  ?>