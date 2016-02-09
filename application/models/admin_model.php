<?php
	/**
	* 
	*/
	class Admin_model extends CI_Model
	{
		
		public function get_admin(){
			$this->db->select("Email,Name,Password");
			$query=$this->db->get_where('user',array('Type' => "admin"));
			//$this->db->from('user');
			//$query=$this->db->get('user');
			return $query->result();
		}

		public function insert_into_admin()
		{
			
			$data=array('Email' => $this->input->post('email'),'Name'=>$this->input->post('name'),'Password'=>$this->input->post('pwd'),'Type'=>'admin' );
			$this->db->insert('user',$data);
			//$this->db->query("insert into user values('$email','$name','$pwd','admin')");
		}

		public function delete_admin($email)
		{
			$this->db->where('Email',$email);
			$this->db->delete('user');
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