<?php

	class Editad_model extends CI_Model
	{
		// Function To Fetch Selected vehicle Record
		public function getselectedad($vehicleid){
			$this->db->select("Vehicleid,Image1,Image2,Image3,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Location,District");
			$this->db->from('vehicle');
			$this->db->where('Vehicleid',$vehicleid);
			$query = $this->db->get();
			$result = $query->result();
			return $result;
		}

		// update the vehicle details of a selected ad.
		public function update_adModel($vehicleid,$data){
			$this->db->where('Vehicleid', $vehicleid);
			$this->db->update('vehicle', $data);
		}

		// Delete the vehicle details of a selected ad.
		public function delete_adModel($vehicleid){
			$this->db->where('Vehicleid', $vehicleid);
			$this->db->delete('vehicle');
		}

	}

?>

