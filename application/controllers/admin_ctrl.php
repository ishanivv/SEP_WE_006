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

	//add an administrator to the website
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
			
			$config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'autotraderslk@gmail.com', // change it to yours
                    'smtp_pass' => 'autotraderslk1', // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );

                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('autotraderslk@gmail.com');
                $this->email->to($_POST['email']); 
                //$this->email->cc('another@another-example.com'); 
                //$this->email->bcc('them@their-example.com'); 

                $this->email->subject('Congratulations!');
                $this->email->message('Dear user, You have been appointed as a new adminimistrator in autotraderslk. You can now proceed with all the administrative tasks available to you.');  

                //$this->email->send();

                if($this->email->send())
                {
                	$this->admin_model->insert_into_admin();
                    $this->session->set_flashdata('success_msg', 'A new admin has been added successfully and sent the successful email');
      				redirect("http://localhost/ci/admin_table_ctrl");
                }
                else
                {
                    $this->session->set_flashdata('success_msg', 'Please try again');
      				redirect("http://localhost/ci/admin_table_ctrl");
                }
			
		}
		
	}

	//delete an admin when the email is given
	public function delete_admin($email)
	{
		$this->load->model('admin_model');
		$config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'autotraderslk@gmail.com', // change it to yours
                    'smtp_pass' => 'autotraderslk1', // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );

                $this->load->library('email',$config);
                $this->email->set_newline("\r\n");
                $this->email->from('autotraderslk@gmail.com');
                $this->email->to($_POST['email']); 
                //$this->email->cc('another@another-example.com'); 
                //$this->email->bcc('them@their-example.com'); 

                $this->email->subject('You account has deleted');
                $this->email->message('Dear user, Your administrator account has been deleted. Contact us through autotraderslk@gmail.com for further details');  

                //$this->email->send();

                if($this->email->send())
                {
                	$this->admin_model->delete_admin($email);
                    $this->session->set_flashdata('success_msg', 'Admin has been deleted successfully');
					redirect('http://localhost/ci/admin_table_ctrl');
                }
                else
                {
                    $this->session->set_flashdata('success_msg', 'Please try again');
      				redirect("http://localhost/ci/admin_table_ctrl");
                }
		
	}

	//check whether the email exists in the database
	public function email_exists($value)
    {
        $this->load->model('admin_model');
        return $this->admin_model->email_exists($value);
    }

    //get a particular administrator information using admin email
    public function get_admin($email)
    {
    	$this->load->model('admin_model');
    	$this->data['admin']=$this->admin_model->get_admin($email);
    	$this->load->view('pages/templates/header');
		$this->load->view('pages/editadmin',$this->data);
		$this->load->view('pages/templates/footer');	
    }

    //edit a particular admin using admin email
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