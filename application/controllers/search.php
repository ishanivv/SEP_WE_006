<?php
 Class Search Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('main_model');
        $this->load->library('pagination');
    }
 
    // validations of the search form and send the results of the search to the searchresult page
    public function index()
    {
        
        $make = $this->input->post('Make');
        $model = $this->input->post('Model');
        $pricemin = $this->input->post('PriceMin');
        $pricemax = $this->input->post('PriceMax');

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


        
        $config['total_rows']=$this->main_model->search_count($make,$model,$pricemin,$pricemax);
        $config['per_page']=5;
        $config['uri_segment']=3;
        $config['base_url']="http://www.autotraders.ga/search/index";
        $this->pagination->initialize($config); 
        $page_links=$this->pagination->create_links();

        $posts = $this->main_model->search($make,$model,$pricemin,$pricemax);

        if(empty($posts))
        {
            $this->session->set_flashdata('no_result_msg', 'No search results found');
        }
        
            $this->load->view('pages/templates/header');
            $this->load->view('pages/searchresult',compact('posts','page_links','make','model','pricemin','pricemax'));
            $this->load->view('pages/templates/footer'); 
        
        

    }

}
?>


