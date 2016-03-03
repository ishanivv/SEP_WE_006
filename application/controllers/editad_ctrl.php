<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Editad_ctrl extends CI_Controller
{
    

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('database','',TRUE);
		$this->load->model('editad_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}

	public function show_myad($vehicleid)
	{
		$data=array();	
		$data['posts']=$this->editad_model->getselectedad($vehicleid);
        $this->load->view('pages/templates/header');
        $this->load->view('pages/editad_view',$data);
        $this->load->view('pages/templates/footer');		
    }

    public function update_myad($vehicleid)
    {
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
            'required|numeric|greater_than[0.99]',
            array
            (
                'required'      => 'You have not provided %s.',         
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
                    
            )
        );

          
        if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('pages/templates/header');
            $this->load->view('pages/EditAd_view',$data);
            $this->load->view('pages/templates/footer');
        }
        else
        {	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  				                                                                  
            $status="Pending" ;  
            
            $data = array(
		        'Brand' => $this->input->post('Brand'),
                'Image1' => $this->input->post('image1'),
                'Image2' => $this->input->post('image2'),
                'Image3' => $this->input->post('image3'),
                'Model' => $this->input->post('Model'),
                'Modelyear' => $this->input->post('ModelYear'),
                'VehicleCondition' =>$this->input->post('VehicleCondition'),
                'Mileage' => $this->input->post('Mileage'),
                'BodyType' => $this->input->post('BodyType'),
                'Transmission' => $this->input->post('Transmission'),
                'Fueltype' => $this->input->post('groupFuel'),
                'EngineCapacity' => $this->input->post('EngineCapacity'),
                'Price' => $this->input->post('Price'),
                'Negotiable' => $this->input->post('checkbox5'),
                'Description' => $this->input->post('Description'),
                'Phone' => $this->input->post('Phone'),
                'Email' => $this->input->post('Email'),
                'Status' => $status,
            );
			
            $this->editad_model->update_adModel($vehicleid,$data);
			//$_SESSION['ads']=$_SESSION['ads']+1;
            $this->load->view('pages/templates/header');
            $this->load->view('pages/editad_success');
            $this->load->view('pages/templates/footer');
        }
    } 
}         
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
?>

		



		







		


		



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        