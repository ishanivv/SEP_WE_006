<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Post_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

	}

    //insert Ad details into vehicle table
	public function insert_into_vehicle()
	{
		$this->load->model('main_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		

		$this->form_validation->set_rules
		(
		 	'Brand',
		 	'brand',
		 	'required',
		 	array
		 	(
		 		'required' => 'You have not provided %s.',
		 	)
	 	);

		$this->form_validation->set_rules
        (
            'Model', 
            'Model', 
            'required',
            array
            (
                'required' => 'You have not provided %s.',
                    
            )
        );

        $this->form_validation->set_rules
        (
            'ModelYear', 
            'Model Year', 
            'required|regex_match[/^[0-9]{4}$/]',
            array
            (
               'required'      => 'You have not provided %s.',    
               'numeric'      =>'%s field sould not contain alphabetical characters'    
            )
        );

		$this->form_validation->set_rules
        (
            'VehicleCondition', 
            'Vehicle Condition', 
            'required',
            array
            (
                'required'      => 'You have not provided %s.',         
            )
        );


        $this->form_validation->set_rules
        (
            'Mileage', 
            'Mileage', 
            'required|numeric',
            array
            (
                'required'      => 'You have not provided %s.',  
                'numeric'      =>'%s field sould not contain alphabetical characters'       
            )
        );

        $this->form_validation->set_rules
        (
            'BodyType', 
            'Body Type', 
            'required',
            array
            (
                'required'      => 'You have not provided %s.',
            )
        );

        $this->form_validation->set_rules
            (
            'Transmission', 
            'Transmission', 
            'required',
            array
            (
                'required'      => 'You have not provided %s.',        
            )
        );

        $this->form_validation->set_rules
        (
         	'EngineCapacity', 
     		'Engine Capacity', 
     		'required|numeric',
       		array
            (
                'required'      => 'You have not provided %s.',
                'numeric'      =>'%s field sould not contain alphabetical characters'
          	)
        );

        $this->form_validation->set_rules
        (
            'Price', 
            'Price', 
            'required|numeric|greater_than[0.99]',
            array
            (
                'required'      => 'You have not provided %s.',
                'numeric'      =>'%s field sould not contain alphabetical characters'
                    
            )
        );

		$this->form_validation->set_rules
        (
            'Description', 
            'Description', 
            'required',
            array
            (
                'required'      => 'You have not provided %s.',
                    
            )
        );
         
        $this->form_validation->set_rules
        (
            'Phone',
            'Phone', 
            'required|regex_match[/^[0-9]{10}$/]',
            array
            (
                'required'      => 'You have not provided %s.',
                'numeric'      =>'%s field sould not contain alphabetical characters'
            )
        );

        if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('pages/templates/header');
            $this->load->view('pages/postad');
            $this->load->view('pages/templates/footer');

        }

        else{
        	$this->main_model->insert_into_vehicle();
			//$_SESSION['ads']=$_SESSION['ads']+1;
			$this->session->set_flashdata('success_msg', 'Your vehicle details has been saved successfully, your ad will be posted shortly. Check emails');
			$this->load->view('pages/templates/header');
			$this->load->view('pages/postad');
			$this->load->view('pages/templates/footer');
		}
	}
}

?>