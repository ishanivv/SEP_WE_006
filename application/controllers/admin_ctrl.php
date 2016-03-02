<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
/**
*  
*/
class Admin_ctrl extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

	}

	public function insert_into_admin()
	{
		$this->load->library('form_validation');
		$this->load->model('admin_model');
		$this->form_validation->set_rules(
			'name',
			'Name',
			'required|alpha',
			array
            (
                'required'      => 'You have not provided %s.',
                'alpha'     => 'You cannot have numbers in your %s.'
            )
		);
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|callback_email_exists|valid_email',
			array
			(
				'required' =>'You have not provided %s.',
				'email_exists'     => 'There is an account already registered with this %s.',
				'valid_email'=>'Enter a valid %s.'
			)
		);
		$this->form_validation->set_rules(
			'pwd',
			'Password',
			'required|min_length[6]',
			array
			( 
				'required' =>'You have not provided %s.',
				'min_length'      => 'Password must be atleast 6 characters long.'

			)
		);
		$this->form_validation->set_rules('cpwd','Confrim Password','required|matches[pwd]');

		if($this->form_validation->run()==FALSE)
		{
			$this->data['admins']=$this->admin_model->get_all_admins();
			$this->load->view('pages/templates/header');
			$this->load->view('pages/addadmin',$this->data);
			$this->load->view('pages/templates/footer');
		}
		else{
			$this->admin_model->insert_into_admin();
			$this->session->set_flashdata('success_msg', 'A new admin has been added successfully');
      		redirect("http://localhost/ci/admin_table_ctrl");
		}
		
	}

	public function delete_admin($email)
	{
		$this->load->model('admin_model');
		$this->admin_model->delete_admin($email);
		$this->session->set_flashdata('success_msg', 'Admin has been deleted successfully');
		redirect('http://localhost/ci/admin_table_ctrl');
	}


	public function email_exists($value)
    {
        $this->load->model('admin_model');
        return $this->admin_model->email_exists($value);
    }

    public function get_admin($email)
    {
    	$this->load->model('admin_model');
    	$this->data['admin']=$this->admin_model->get_admin($email);
    	$this->load->view('pages/templates/header');
		$this->load->view('pages/editadmin',$this->data);
		$this->load->view('pages/templates/footer');	
    }

    public function edit_admin($email)
    {
    	$this->load->library('form_validation');
		$this->load->model('admin_model');
		$this->form_validation->set_rules(
			'name',
			'Name',
			'required|alpha',
			array
            (
                'required'      => 'You have not provided %s.',
                'alpha'     => 'You cannot have numbers in your %s.'
            )
		);
		
		$this->form_validation->set_rules(
			'pwd',
			'Password',
			'required|min_length[6]',
			array
			( 
				'required' =>'You have not provided %s.',
				'min_length'      => 'Password must be atleast 6 characters long.'

			)
		);
		$this->form_validation->set_rules('cpwd','Confrim Password','required|matches[pwd]');

		if($this->form_validation->run()==FALSE)
		{
			$this->data['admin']=$this->admin_model->get_admin($email);
    		$this->load->view('pages/templates/header');
			$this->load->view('pages/editadmin',$this->data);
			$this->load->view('pages/templates/footer');
		}
		else{
			$this->admin_model->edit_admin();
			$this->session->set_flashdata('success_msg', 'Successfully updated the information');
			redirect('http://localhost/ci/admin_table_ctrl');	
		}

    }
}

?>