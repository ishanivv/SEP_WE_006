<?php

class MyProf extends CI_Controller 
{
	public $Phone;
    public $email;
    public $type;

    public function index()
    {
        $this->load->view('pages/templates/header');
        $this->load->view('pages/myprofile');
        $this->load->view('pages/templates/footer');
    }

    public function get_logo(){

        $email = ($this->session->userdata['logged_in']['email']);
        
        $query = $this->db->query("SELECT Photo FROM user WHERE Email = '".$email."';");
        $row = $query->row_array(0);
        $logo = $row['Photo'];

        return $logo;

    }

    public function get_phone()
    {
        $email = ($this->session->userdata['logged_in']['email']);
        $this->db->select("Phone");
        $this->db->where('Email',$email);
        $query = $this->db->get('user');
        $row=$query->row_array(0);
        $phone=$row['Phone'];
        return $phone;
    }
    public function get_name()
    {
        $email = ($this->session->userdata['logged_in']['email']);
        $this->db->select("Name");
        $this->db->where('Email',$email);
        $query = $this->db->get('user');
        $row=$query->row_array(0);
        $name=$row['Name'];
        return $name;
    }

    public function start()
    {
        $logo = $this->get_logo();
        $phone=$this->get_phone();
        $name=$this->get_name();

        $data['logo'] = $logo;
        $data['phone']=$phone;
        $data['name']=$name;
        $this->load->view('pages/templates/header');
        $this->load->view('pages/myprofile',$data);
        $this->load->view('pages/templates/footer');
    }

    public function mp()
    {
    	$this->load->model('database','',TRUE);
    	$this->load->helper(array('form', 'url','security'));
    	$this->load->library('form_validation');
        $this->load->library('session');

    	$this->form_validation->set_rules
        (
            'phone', 
            'Telephone number', 
            'required|regex_match[/^[0-9]{10}$/]',
            array
            (
                'required'      => 'Enter a %s to update.',
            )
        );

        if ($this->form_validation->run() == FALSE)
        {
            $logo = $this->get_logo();
            $phone=$this->get_phone();
            $name=$this->get_name();

            $data['logo'] = $logo;
            $data['phone']=$phone;
            $data['name']=$name;

        	$this->load->view('pages/templates/header');
        	$this->load->view('pages/myProfile',$data);
        	$this->load->view('pages/templates/footer');
        }
        else
        {
        	$this->Phone = $_POST['phone'];
            $this->type=$_POST['type'];

        	$this->database->updateDetails($_POST['phone'],$_POST['type'],($this->session->userdata['logged_in']['email']));
            $this->session->set_userdata('type',$this->type);
        	$data['message'] = 'Telephone number saved to database';

        	$this->load->view('pages/templates/header');
        	$this->load->view('pages/updateSuccessful');
        	$this->load->view('pages/templates/footer');
        }
    }

    

    /**public function numeric_check($value)
	{
        //$this->load->model('database','',TRUE);
		return preg_match('/^[0-9,]+$/',$value);
	}**/
}