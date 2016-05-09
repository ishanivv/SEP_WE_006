<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Saved_search_ctrl extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('main_model');
    }

	public function index()
	{
		$email=$this->session->userdata['logged_in']['email'];
		$this->data['posts']=$this->main_model->get_saved_search($email);
		
    	$this->load->view('pages/templates/header');
		$this->load->view('pages/saved-search',$this->data);
		$this->load->view('pages/templates/footer');
	}

	public function change_status()
	{
		$info = $this->main_model->change_status($_POST['value'],$_POST['searchid']);
	}
	public function delete_saved_search($searchid)
	{
		$this->main_model->delete_saved_search($searchid);

		$email=$this->session->userdata['logged_in']['email'];
		
		$count=$this->main_model->count_savedsearch($email);
	    $this->session->set_userdata('savedsearch',$count);

		$this->session->set_flashdata('success_msg', 'Saved Search has deleted successfully!');
      	redirect("http://www.autotraders.ga/saved_search_ctrl");
	}

}

?>