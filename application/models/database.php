<?php
class Database extends CI_Model 
{
	public $password;

	public function __construct()
	{
		parent::__construct();
	}

	//Function for check whether name exist
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

	//Function for the check email exist
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

	//Function for insert data to the database
	public function register()
	{
		$data=array('Email'=>$this->input->post('email'),'Name'=>$this->input->post('Name'),'Password'=>md5($this->input->post('password')),'Type' =>$this->input->post('userType'));
		$this->db->insert('user',$data);
	}

	//Function for retreiving data from the database for login 
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

	/*check whether the user is admin or not. return true for admin. 
	otherwise false. input parameter is email*/
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

	//Function for generating random password
	public function randPass($em)
	{
		$this->db->select('Email','Name','ResetPassword');
		$this->db->from('user');
		$this->db->where('Email',$em);
		$this->db->where('ResetPassword','yes');
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows()==1){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//Function for send password to the mail for resetting
	public function unsetReset($em)
	{
		$this->db->query("UPDATE user SET ResetPassword = 'no' WHERE Email = '".$em."'");
		return;
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
		
		$data=array('Password' => md5($this->password),'ResetPassword' => 'yes');
		$this->db->where('Email',$email);
		$this->db->update('user',$data);

		return $randomString;
		
	}

	public function updateDetails($Phone,$Type,$email)
	{
		$data=array(
			'Phone'=>$Phone,
			'Type'=>$Type,
			);
		$this->db->where('Email',$email);
		$this->db->update('user',$data);
	}

	//send random password to email
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

	public function sendRegisterEmail($email)
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
		$this->email->subject('Registration');
		$message = 'You have successfully registered. You can now proceed with posting free advertisements.';
		$this->email->message($message);	
		
		if($this->email->send())
    	{
      		return true;
     	}
     	else
    	{
     		show_error($this->email->print_debugger());
     		return false;
    	}
	}


	public function check_old_password($password,$email)
	{
		$this->db->where('Email',$email);
		$this->db->where('Password',$password);
		$query = $this->db->get('user');
		if($query->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getActivities($email){

		$query = $this->db->query("SELECT * FROM activityLog WHERE Email = '".$email."';");

		$index = 0;

		if($query->num_rows()>100){
			$index = $query->num_rows() - 100;
		}

		$rowIndex = 0;

		$data = array();

		while($index<($query->num_rows())){
			$row = $query->row_array($rowIndex); 
			$data[$rowIndex][0] = $row['ID'];
			$data[$rowIndex][1] = $row['Email'];
			$data[$rowIndex][2] = $row['Activity'];
			$data[$rowIndex][3] = $row['URL'];
			$data[$rowIndex][4] = $row['dateTime'];
			$rowIndex++;
			$index++;
		}

		return $data;

	}
	//Function for get name
	public function get_name($email)
	{
		$query = $this->db->query("SELECT * FROM user WHERE 'Email' = '".$email."'");
		foreach ($query->result_array() as $row)
		{
			return 'ABC';//$row['Name'];
		}
	}

	//Function for set new password
	public function set_new_password($password,$email)
	{
		$data=array(
			'Password'=>$password,
			'ResetPassword'=>'no',
			);
		$this->db->where('Email',$email);
		$this->db->update('user',$data);
		//$this->db->query("UPDATE user SET Password = '".$password."' WHERE Email = '".$email."'");
		//$this->db->query("UPDATE user SET ResetPassword = 'no' WHERE Email = '".$email."'");
		
		return;
	}

	public function getImage($email)
    {
            $this->session->userdata('is_logged_in');

            $data = '';
            $query = $this->db->query("SELECT Photo FROM user WHERE Email = '$email'");


            if($query->num_rows())
            {
            	$data = $query->row_array();
                $data = $data['Photo'];
                $query->free_result();
                return true;  
            }
            else
            {
                echo "Picture Not Found!";
                return $data;
            }
    }

    public function log_activity($email,$activity,$url,$dateTime){
    	$this->db->query("INSERT INTO activityLog(Email,Activity,URL,dateTime) VALUES('".$email."','".$activity."','".$url."','".$dateTime."');");
    	return true;
    }
}
?>