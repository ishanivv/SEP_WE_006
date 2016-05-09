<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class All_ads_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Ads_model');
		$this->load->library('pagination');
		$this->load->helper('cookie');

	}
	//load all the approved ads from the database and view with pages
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

		$config['total_rows']=$this->Ads_model->count_all_ads();
		$config['per_page']=5;
		$config['uri_segment']=3;
		$config['base_url']="http://www.autotraders.ga/all_ads_ctrl/index";
		$this->pagination->initialize($config); 
		$page_links=$this->pagination->create_links();

		$posts=$this->Ads_model->get_ads();
		$this->load->view('pages/templates/header');
		$this->load->view('pages/allads_view',compact('posts','page_links'));
		$this->load->view('pages/templates/footer');
	}


	
}

?>