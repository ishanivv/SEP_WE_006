<?php
class Database extends CI_Model 
{
	public $password;

	public function __construct()
	{
		parent::__construct();
	}

	public function name_exists($value)
	{
		$this->db->where('name',$value);
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function email_exists($value)
	{
		$this->db->where('email',$value);
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function register()
	{
		$data=array('Email'=>$this->input->post('email'),'Name'=>$this->input->post('Name'),'Password'=>md5($this->input->post('password')),'Type' =>$this->input->post('userType'));
		$this->db->insert('user',$data);
	}

	public function login($em,$pw)
	{
		$this -> db -> select('*');
		$this -> db -> from('user');
		$this -> db -> where('Email',$em);
		$this -> db -> where('Password',$pw);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function isadmin($em)
	{
		$this->db->select('Email','Type');
		$this->db->from('user');
		$this->db->where('Email',$em);
		$this->db->where('Type','admin');
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows()==1){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function resetPassword($email)
	{
		///////////////////////////random password generator/////////////////////////////
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ( $i = 0 ; $i < 12 ; $i++ )
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		

		$this->password = $randomString;

		
		$msg = 'Your new password is : '.$randomString.'';
		
		$data=array('Password' => md5($this->password));
		$this->db->where('Email',$email);
		$this->db->update('user',$data);

		return $randomString;
		
	}

	public function sendPasswordResetMail($email,$password)
	{
		$config = Array
		(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'autotraderslk@gmail.com',
			'smtp_pass' => 'autotraderslk1',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('autotraderslk@gmail.com');
		$this->email->to($email);
		$this->email->subject('New Password');
		$message = 'Your password has been reset. Your new password is "'.$password.'"(without quotes). Use this password to login. We recommend you to change the password after logged in.';
		$this->email->message($message);	
		
		if($this->email->send())
    	{
      		return true;
     	}
     	else
    	{
     		//show_error($this->email->print_debugger());
     		return false;
    	}
	}

	public function get_name($email)
	{
		$query = $this->db->query("SELECT * FROM user WHERE 'Email' = '".$email."'");
		foreach ($query->result_array() as $row)
		{
			return 'ABC';//$row['Name'];
		}
	}

	public function set_new_password($password,$email)
	{
		$this->db->query("UPDATE user SET Password = '".$password."' WHERE Email = '".$email."'");
		return;
	}
}
?>