<?php
 Class Advanced_ctrl Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('main_model');
    }

    
 
    function search_advanced ()
    {
        $category = $this->input->post('category');
        $make = $this->input->post('make');
        $model = $this->input->post('ttype');
        $condition = $this->input->post('condition');
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
     
        //$year1 = $this->input->post->('year1');
        ////$year2 = $this->input->post->('year2');
        //$fuel = $this->input->post->('fuel');
        //$dis1 = $this->input->post->('dis1');
        //$dis2 = $this->input->post->('dis2');
        //$cap1 = $this->input->post->('cap1');
        //$cap2 = $this->input->post->('cap2');
    


        $this->data ['posts'] = $this->main_model->advanced_ctrl($category,$make,$model,$condition,$pria,$prib,$transmission,$year1,$year2,$fuel,$dis1,$dis2,$cap1,$cap2);

        $this->load->view('pages/templates/header');
        $this->load->view('pages/allads_view',$this->data);
        $this->load->view('pages/templates/footer');

        //$this->load->view('pages/result_view',$this->data);


    }


}
?>


