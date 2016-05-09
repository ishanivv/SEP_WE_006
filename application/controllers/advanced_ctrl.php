<?php
 Class Advanced_ctrl Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('main_model');
        $this->load->library('pagination');
    }

    
    // validations of the advanced search form and send the results of the advanced search to the searchresult page
    public function index()
    {
        $make = $this->input->post('make');
        $model = $this->input->post('model');
        $condition = $this->input->post('condition');
        $bodytype=$this->input->post('BodyType');
        $pria = $this->input->post('pria');
        $prib = $this->input->post('prib');
        $transmission = $this->input->post('transmission');
        $year1 = $this->input->post('year1');
        $year2 = $this->input->post('year2');
        $fuel = $this->input->post('fuel');
        $dis1 = $this->input->post('dis1');
        $dis2 =  $this->input->post('dis2');
        $cap1 = $this->input->post('cap1');
        $cap2 = $this->input->post('cap2');
        $district=$this->input->post('district');
     
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

        $posts = $this->main_model->advanced_search($make,$model,$condition,$bodytype,$pria,$prib,$transmission,$year1,$year2,$fuel,$dis1,$dis2,$cap1,$cap2,$district);
        $config['total_rows']=count($posts);
        $config['per_page']=5;
        $config['uri_segment']=3;
        $config['base_url']="http://www.autotraders.ga/advanced_ctrl/index";
        $this->pagination->initialize($config); 
        $page_links=$this->pagination->create_links();

        
        
            
        if(empty($posts))
        {
            $this->session->set_flashdata('no_result_msg', 'No search results found');
        }
         
        $this->load->view('pages/templates/header');
        $this->load->view('pages/searchresult',compact('posts','page_links','make','model','condition','bodytype','pria','prib','transmission','year1','year2','fuel','dis1','dis2','cap1','cap2','district'));
        $this->load->view('pages/templates/footer');        
    }

    public function savesearch()
    {
        $Brand=$this->input->post('make');
        $Model=$this->input->post('model');
        $Modelyearfrom=$this->input->post('year1');
        $Modelyearto=$this->input->post('year2');
        $VehicleCondition=$this->input->post('condition');
        $Mileagefrom=$this->input->post('dis1');
        $Mileageto=$this->input->post('dis2');
        $BodyType=$this->input->post('BodyType');
        $Transmission=$this->input->post('transmission');
        $Fueltype=$this->input->post('fuel');
        $EngineCapacityfrom=$this->input->post('cap1');
        $EngineCapacityto=$this->input->post('cap2');
        $PriceMin=$this->input->post('pria');
        $PriceMax=$this->input->post('prib');
        $District=$this->input->post('district');

        if($Brand=="Any" && empty($Model) && $VehicleCondition=="Any" && $BodyType="Any" && empty($Mileageto) && empty($Mileagefrom) && $Transmission="Any" && empty($Modelyearto) && empty($Modelyearfrom) && $Fueltype=="Any" && empty($EngineCapacityto) && empty($EngineCapacityfrom) && empty($PriceMin) && empty($PriceMax) && $District="Any")
        {
            $this->session->set_flashdata('error_msg', 'You cannot saved a search without no criteria selected. Please select criterias and try again');
            redirect("http://www.autotraders.ga/all_ads_ctrl");
        }
        else{
            $email=$this->session->userdata['logged_in']['email'];

            $this->main_model->savesearch($email);
            $count=$this->main_model->count_savedsearch($email);
            $this->session->set_userdata('savedsearch',$count);

            $this->session->set_flashdata('success_msg', 'Search has been saved successfully!');
            redirect("http://www.autotraders.ga/saved_search_ctrl");
        }
    }


}
?>


