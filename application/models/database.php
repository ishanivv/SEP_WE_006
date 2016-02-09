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

	public function login($em,$pw)
	{
		$this -> db -> select('Email','Name','Password','Type');
		$this -> db -> from('user');
		$this -> db -> where('Email',$em);
		$this -> db -> where('Password',$pw);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
			return TRUE;
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
		/////////////////////////////////////////////////////////////////////////////////

		$this->password = $randomString;

		///////////////////////////code to send email////////////////////////////////////
		$msg = 'Your new password is : '.$randomString.'';
		//mail($email,"New password",$msg);
		/////////////////////////////////////////////////////////////////////////////////

		$this->db->update('user', $this);
		return;
	}

	public function get_name($email)
	{
		$query = $this->db->query("SELECT * FROM user WHERE 'Email' = '".$email."'");
		foreach ($query->result_array() as $row)
		{
			return 'ABC';//$row['Name'];
		}
	}
}
?>