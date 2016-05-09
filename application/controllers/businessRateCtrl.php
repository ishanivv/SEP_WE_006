<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
/**
*  
*/
class BusinessRateCtrl extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('main_model');
    $this->load->helper(array('form', 'url'));
    
    

  

  }
  
  public function loadReviewPage($vehicleid){


  	$data=array();
  	$data['details']['id']=$vehicleid;

  	$this->load->view('pages/templates/header');
		$this->load->view('pages/businessRateView',$data);
		$this->load->view('pages/templates/footer');



}

public function insertIntoBusinessReview($Vehicleid){
 $this->load->database();
    $this->load->model('main_model');

    



 $rate=$_POST['RatingTxt'];
 if($rate=="Excellent"){
  $rate=5;
  $this->main_model->insertIntoBusinessReview($Vehicleid,$rate);
  }
  elseif($rate=="Good"){
  $rate=4;
  $this->main_model->insertIntoBusinessReview($Vehicleid,$rate);
  }  
   elseif($rate=="Okay"){
  $rate=3;
  $this->main_model->insertIntoBusinessReview($Vehicleid,$rate);
  }  
   elseif($rate=="Unsatisfied"){
  $rate=2;
  $this->main_model->insertIntoBusinessReview($Vehicleid,$rate);
  }  
   elseif($rate=="Terrible"){
  $rate=1;
  $this->main_model->insertIntoBusinessReview($Vehicleid,$rate);
  }  
  



     $this->session->set_flashdata('success_msg', 'Thank you! We will post your review soon');
     redirect('http://www.autotraders.ga/adpreview_ctrl/getad_preview/'.$Vehicleid);





}
}


     
    

?>




                                                                                                                                                                                                                                                                                           



         
        
         

        


     



  