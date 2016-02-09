<?php
 Class Search Extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('main_model');
    }

    /**function search_keyword1()
    {
        $keyword    =   $this->input->post('keyword');
        $data['query']    =   $this->main_model->search($keyword);
        $this->load->view('pages/result_view',$data);
    }**/
 
    function search_keyword ()
    {
        $category = $this->input->post('category');
        $make = $this->input->post('make');
        $model = $this->input->post('ttype');

        $this->data ['posts'] = $this->main_model->search($category,$make,$model);
        $this->load->view('pages/templates/header');
        $this->load->view('pages/allads_view',$this->data);
        $this->load->view('pages/templates/footer');


    }


}
?>


