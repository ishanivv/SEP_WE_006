<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Notify_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');
		$this->load->library('pagination');

	}

	//get all the pending ads and load into the view
	public function index()
	{
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';	
		$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['total_rows']=$this->Ads_model->count_pending_ads();
		$config['per_page']=5;
		$config['uri_segment']=3;
		$config['base_url']="http://www.autotraders.ga/notify_ctrl/index";
		$this->pagination->initialize($config); 
		$page_links=$this->pagination->create_links();

		$posts=$this->Ads_model->get_pending_ads();
		$this->load->view('pages/templates/header');
		$this->load->view('pages/notifications',compact('posts','page_links'));
		$this->load->view('pages/templates/footer');
	}

}

?>