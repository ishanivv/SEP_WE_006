<?php
	/**
	* 
	*/
	class Ads_model extends CI_Model
	{
		
		//get all the ads which have been approved and return the result
		public function get_ads()
		{
			$limit=5;
			$offset=$this->uri->segment(3);
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			$this->db->where('Status','Approved');
			$this->db->limit($limit,$offset);
			$query=$this->db->get('vehicle');
			return $query->result();
		}

		//count all the advertisements and return the count
		public function count_all_ads()
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			$this->db->where('Status','Approved');
			$query=$this->db->get('vehicle');
			return $query->num_rows();			
		}

		//get details about a particular vehicle by vehicleid
		public function getad_preview($vehicleid){
			$this->db->select("Vehicleid,Image1,Image2,Image3,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,Location,District");
			$query=$this->db->get_where('vehicle',array('Vehicleid' => $vehicleid));
			return $query->result();
		}

		//get all the pending ads and return the result
		public function get_pending_ads()
		{
			$limit=5;
			$offset=$this->uri->segment(3);
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			$this->db->where('Status','Pending');
			$this->db->limit($limit,$offset);
			$query=$this->db->get('vehicle');
			return $query->result();	
		}

		//count all pending ads and return the result
		public function count_pending_ads()
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			$this->db->where('Status','Pending');
			$query=$this->db->get('vehicle');
			return $query->num_rows();
		}

		//approve an ad, input parameter is vehicle id
		public function approve($vehicleid){
			$data=array('Status' => 'Approved');
			$this->db->where('Vehicleid',$vehicleid);
			$this->db->update('vehicle',$data);
		}

		//get the details of a vehicle in order to send the approval email
		public function get_ad_to_send($vehicleid)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			$this->db->where('Vehicleid',$vehicleid);
			$query=$this->db->get('vehicle');
			return $query->result();
		}

		//update the status of a particular ad to Rejected. Vehicleid is a input parameter.
		public function reject($vehicleid){
			$data=array('Status' => 'Rejected');
			$this->db->where('Vehicleid',$vehicleid);
			$this->db->update('vehicle',$data);
		}

		//select all the ads of logged in user and return the result
		public function get_my_ads($email)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,Status,Timestamp");
			//$this->db->from('vehicle');
			$this->db->where('Email',$email);
			$query=$this->db->get('vehicle');
			return $query->result();
		}

		//count all the ads of a logged in user. and return the count. Input parameter is email
		public function count_my_ads($email)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,Status,Timestamp");
			//$this->db->from('vehicle');
			$this->db->where('Email',$email);
			$query=$this->db->get('vehicle');
			return $query -> num_rows();
		}
	}
?>