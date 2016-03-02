<?php
	/**
	* 
	*/
	class Admin_model extends CI_Model
	{
		
		public function get_all_admins()
		{
			$this->db->select("Email,Name,Password");
			$query=$this->db->get_where('user',array('Type' => "admin"));
			//$this->db->from('user');
			//$query=$this->db->get('user');
			return $query->result();
		}

		public function get_admin($email)
		{
			$this->db->select("Email,Name,Password");
			$query=$this->db->get_where('user',array('Email'=>$email,'Type' => "admin"));	
			return $query->result();
		}

		public function insert_into_admin()
		{
			
			$data=array('Email' => $this->input->post('email'),'Name'=>$this->input->post('name'),'Password'=>md5($this->input->post('pwd')),'Type'=>'admin' );
			$this->db->insert('user',$data);
			//$this->db->query("insert into user values('$email','$name','$pwd','admin')");
		}

		public function delete_admin($email)
		{
			$this->db->where('Email',$email);
			$this->db->delete('user');
		}

		public function edit_admin()
		{
			$data=array('Name'=>$this->input->post('name'),'Password'=>md5($this->input->post('pwd')));
			$this->db->where('Email',$this->input->post('email'));
			$this->db->update('user',$data);
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
	}
?>