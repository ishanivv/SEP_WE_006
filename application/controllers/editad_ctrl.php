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

    //show details of selected ad.Input parametr is vehicle id.
	public function show_myad($vehicleid)
	{
		$data=array();	
		$data['posts']=$this->editad_model->getselectedad($vehicleid);
        $this->load->view('pages/templates/header');
        $this->load->view('pages/editad_view',$data);
        $this->load->view('pages/templates/footer');		
    }

    //update the details of ad belongs to given vehicle id.input parameter is vehicle id.
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
                    
            )
        );


        if ($this->form_validation->run() == FALSE)
        {
                $Vehicleid=$vehicleid;
                $Brand=$this->input->post('Brand');
                $Image1=$this->input->post('imgPath1');
                $Image2=$this->input->post('imgPath2');
                $Image3 = $this->input->post('imgPath3');
                $Model = $this->input->post('Model');
                $Modelyear = $this->input->post('ModelYear');
                $VehicleCondition=$this->input->post('VehicleCondition');
                $Mileage=$this->input->post('Mileage');
                $BodyType = $this->input->post('BodyType');
                $Transmission = $this->input->post('Transmission');
                $Fueltype = $this->input->post('groupFuel');
                $EngineCapacity =$this->input->post('EngineCapacity');
                $Price = $this->input->post('Price');
                $Negotiable = $this->input->post('checkbox5');
                $Description = $this->input->post('Description');
                $Phone = $this->input->post('Phone');
                $Email = $this->input->post('Email');
                $Location=$this->input->post('location');
                $District=$this->input->post('district');

            //$data['posts']=$this->editad_model->getselectedad($vehicleid);
        	$this->load->view('pages/templates/header');
            $this->load->view('pages/editad_validate_view',compact('Vehicleid','Brand','Image1','Image2','Image3','Model','Modelyear','VehicleCondition','Mileage','BodyType','Transmission','Fueltype','EngineCapacity','Price','Negotiable','Description','Phone','Email','Location','District'));
            //$this->load->view('pages/editad_view',compact('posts'));
            $this->load->view('pages/templates/footer');

        }
        else
        {	                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  				                                                                  
            $status="Pending" ;  
            $p1=$this->input->post('imgPath1');  
             $p2=$this->input->post('imgPath2');
             $p3=$this->input->post('imgPath3');


             $path1=substr($p1,12);
             $path2=substr($p2,12);
             $path3=substr($p3,12);

             $a=strtok($path1, "/");
             $b=strtok($path2,"/");
             $c=strtok($path3,"/");
            
            $data = array(
		        'Brand' => $this->input->post('Brand'),
                'Image1' => $a,
                'Image2' => $b,
                'Image3' => $c,
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
                'Location'=>$this->input->post('location'),
                'District'=>$this->input->post('district'),
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