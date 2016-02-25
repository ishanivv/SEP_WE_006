<?php
	/**
	* 
	*/
	class Ads_model extends CI_Model
	{
		
		public function getads()
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			//$this->db->from('vehicle');
			$this->db->where('Status','Approved');
			$query=$this->db->get('vehicle');
			return $query->result();
		}


		public function getpendingads()
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			//$this->db->from('vehicle');
			$this->db->where('Status','Pending');
			$query=$this->db->get('vehicle');
			return $query->result();	
		}
		public function approve($vehicleid){
			$data=array('Status' => 'Approved');
			$this->db->where('Vehicleid',$vehicleid);
			$this->db->update('vehicle',$data);
		}


		public function reject($vehicleid){
			$this->db->where('Vehicleid',$vehicleid);
			$this->db->delete('vehicle');
		}

		public function getmyads($email)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,Status,Timestamp");
			//$this->db->from('vehicle');
			$this->db->where('Email',$email);
			$query=$this->db->get('vehicle');
			return $query->result();
		}
	}
?>