<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Pages extends CI_Controller
{
	//load pages
	function view($page='home')
	{

		if ( ! file_exists('application/views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
       }
		//$this->load->model('Main_model');
		//$this->Main_model->insert_into_user();
		$this->load->view('pages/templates/header');
		$this->load->view('pages/'.$page);
		$this->load->view('pages/templates/footer');


	}

	
}
?>