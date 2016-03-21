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
    function search_keyword ()
    {
        
        $make = $this->input->post('Make');
        $model = $this->input->post('Model');
        $pricemin = $this->input->post('PriceMin');
        $pricemax = $this->input->post('PriceMax');

        $this->load->library('form_validation');
        $this->load->model('main_model');
        $this->form_validation->set_rules(
            'PriceMin',
            'Price',
            'numeric',
            array
            (
                
                'numeric' => 'You cannot have anything other than numbers for the Minimum Price'
            )
        );
        $this->form_validation->set_rules(
            'PriceMax',
            'Price',
            'numeric',
            array
            (
                
                'numeric' => 'You cannot have anything other than numbers for the Maximum Price'
            )
        );

        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('pages/templates/header');
            $this->load->view('pages/home');
            $this->load->view('pages/templates/footer');   
        }
        else{


        $this->data ['posts'] = $this->main_model->search($make,$model,$pricemin,$pricemax);
        if(empty($this->data['posts']))
        {
            $this->session->set_flashdata('no_result_msg', 'No search results found');
        }
        $this->load->view('pages/templates/header');
        $this->load->view('pages/searchresult',$this->data);
        $this->load->view('pages/templates/footer');
        }


    }

}
?>


