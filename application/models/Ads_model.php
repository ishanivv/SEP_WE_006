<?php
	/**
	* 
	*/
	class Ads_model extends CI_Model
	{
		public function getVehicleAjax($vehicleID)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			$query=$this->db->get_where('vehicle', array('Vehicleid' => $vehicleID));
			return $query->result();
		}

		public function get_compare_details($querywhere)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,District,Location");
			$this->db->where($querywhere); 
			$query = $this->db->get('vehicle');
			return $query->result();
		}
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
			$data=array('Status' => 'Approved','Timestamp'=>date("Y-m-d H:i:s"));
			$this->db->where('Vehicleid',$vehicleid);
			$this->db->update('vehicle',$data);
		}

		//check the posted vehicle with the saved search table ang get the emails to send
		public function check_saved_search($vehicleid)
		{

			$emailarr=array();
			//array_push($emailarr, 'ishanivv@gmail.com');

			$this->db->select("Searchid,Brand,Model,Modelyearfrom,Modelyearto,VehicleCondition,Mileagefrom,Mileageto,BodyType,Transmission,FuelType,EngineCapacityfrom,EngineCapacityto,PriceMin,PriceMax,District,Email");
			$this->db->where('Status','Enable');
			$query=$this->db->get('savedsearch');
			foreach ($query->result() as $row) {
				$make=$row->Brand;
				$model=$row->Model;
				$modelyearfrom=$row->Modelyearfrom;
				$modelyearto=$row->Modelyearto;
				$condition=$row->VehicleCondition;
				$mileagefrom=$row->Mileagefrom;
				$mileageto=$row->Mileageto;
				$bodytype=$row->BodyType;
				$transmission=$row->Transmission;
				$fuel=$row->FuelType;
				$enginecapacityfrom=$row->EngineCapacityfrom;
				$enginecapacityto=$row->EngineCapacityto;
				$pricemin=$row->PriceMin;
				$pricemax=$row->PriceMax;
				$district=$row->District;
				$email=$row->Email;

				$querywhere="";

				if ($make!="Any"){
					if (empty($querywhere)){
						$querywhere=$querywhere." Brand = '$make'";
					}
					else {
						$querywhere=$querywhere." and Brand = '$make'";
					}
				}

				if (!empty($model)){
					if (empty($querywhere)){
						$querywhere=$querywhere." Model = '$model'";
					}
					else {
						$querywhere=$querywhere." and Model ='$model'";
					}

				}

				if ($condition!="Any"){
					if(empty($querywhere)){
						$querywhere=$querywhere."VehicleCondition = '$condition'";
					}
					else{

						$querywhere=$querywhere." and VehicleCondition ='$condition'";
					}

				}	

				if ($bodytype!="Any"){
					if(empty($querywhere)){
						$querywhere=$querywhere."BodyType = '$bodytype'";
					}
					else{

						$querywhere=$querywhere." and BodyType ='$bodytype'";
					}

				}	

				if (!empty($pricemin) && !empty($pricemax)){
					if(empty($querywhere)){
						$querywhere=$querywhere.'Price BETWEEN "'.$pricemin.'" and "'.$pricemax.'"';
					}
					else{

						$querywhere=$querywhere.'and Price BETWEEN "'.$pricemin.'" and "'.$pricemax.'"';
					}

				}
				else if(!empty($pricemin) && empty($pricemax))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Price > "'.$pricemin.'"';
					}
					else{
						$querywhere=$querywhere.'and Price > "'.$pricemin.'"';	
					}
				}

				else if(empty($pricemin) && !empty($pricemax))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Price < "'.$pricemax.'"';
					}
					else{
						$querywhere=$querywhere.'and Price < "'.$pricemax.'"';	
					}
				}

				if ($transmission!="Any"){
					if(empty($querywhere)){
						$querywhere=$querywhere."Transmission = '$transmission'";
					}
					else{

						$querywhere=$querywhere."and Transmission ='$transmission'";
					}

				}

				if (!empty($modelyearfrom) && !empty($modelyearto)){
					if(empty($querywhere)){
						$querywhere=$querywhere.'Modelyear BETWEEN "'.$modelyearfrom.'" and "'.$modelyearto.'"';
					}
					else{

						$querywhere=$querywhere. 'and Modelyear BETWEEN "'.$modelyearfrom.'" and "'.$modelyearto.'"';
					}

				}

				else if(!empty($modelyearfrom) && empty($modelyearto))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Modelyear > "'.$modelyearfrom.'"';
					}
					else{
						$querywhere=$querywhere.'and Modelyear > "'.$modelyearfrom.'"';	
					}
				}

				else if(empty($modelyearfrom) && !empty($modelyearto))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Modelyear < "'.$modelyearto.'"';
					}
					else{
						$querywhere=$querywhere.'and Modelyear < "'.$modelyearto.'"';	
					}
				}

				if ($fuel!="Any"){
					if(empty($querywhere)){
						$querywhere=$querywhere."Fueltype= '$fuel'";
					}
					else{

						$querywhere=$querywhere."and Fueltype ='$fuel'";
					}

				}

				if (!empty($mileagefrom) && !empty($mileageto)){
					if(empty($querywhere)){
						$querywhere=$querywhere.'Mileage BETWEEN "'.$mileagefrom.'" and "'.$mileageto.'"';
					}
					else{

						$querywhere=$querywhere.' and Mileage BETWEEN "'.$mileagefrom.'" and "'.$mileageto.'"';

					}
				}

				else if(!empty($mileagefrom) && empty($mileageto))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Mileage > "'.$mileagefrom.'"';
					}
					else{
						$querywhere=$querywhere.'and Mileage > "'.$mileagefrom.'"';	
					}
				}

				else if(empty($mileagefrom) && !empty($mileageto))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Mileage < "'.$mileageto.'"';
					}
					else{
						$querywhere=$querywhere.'and Mileage < "'.$mileageto.'"';	
					}
				}

				if (!empty($enginecapacityfrom) && !empty($enginecapacityto)){
					if(empty($querywhere)){
						$querywhere=$querywhere.'EngineCapacity BETWEEN "'.$enginecapacityfrom.'" and "'.$enginecapacityto.'"';
					}
					else{

						$querywhere=$querywhere.'and EngineCapacity BETWEEN "'.$enginecapacityfrom.'" and "'.$enginecapacityto.'"';
					}

				}

				else if(!empty($enginecapacityfrom) && empty($enginecapacityto))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'EngineCapacity > "'.$enginecapacityfrom.'"';
					}
					else{
						$querywhere=$querywhere.'and EngineCapacity > "'.$enginecapacityfrom.'"';	
					}
				}

				else if(empty($enginecapacityfrom) && !empty($enginecapacityto))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'EngineCapacity < "'.$enginecapacityto.'"';
					}
					else{
						$querywhere=$querywhere.'and EngineCapacity < "'.$enginecapacityto.'"';	
					}
				}

				if ($district!="Any"){
					if(empty($querywhere)){
						$querywhere=$querywhere."District = '$district'";
					}
					else{

						$querywhere=$querywhere."and District ='$district'";
					}

				}

				/*if (empty($querywhere)){
					$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
					//$this->db->from('vehicle');
					$this->db->where('Status','Approved');
					$query=$this->db->get('vehicle');
					return $query->result();
				}*/
				
				//else{
					$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
					$querywhere=$querywhere." and Vehicleid = ".$vehicleid;
					$this->db->where($querywhere); 
					$query = $this->db->get('vehicle');
					//return $query->result();
					if($query -> num_rows() ==1)
					{
						array_push($emailarr, $email);
					}
				//}

			}
			return $emailarr;

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

		public function getadlist($data)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,Status,Timestamp");
			//$this->db->from('vehicle');
			$this->db->where('Vehicleid',$data);
			$query=$this->db->get('vehicle');
			return $query->result();
		}

		public function getBusinessReviews($Vehicleid){

			$this->db->select("*");
			$query=$this->db->where('Vehicleid',$Vehicleid);
			
			$query=$this->db->get('businessreviews');
			return $query->result();		
		}
	

		public function countRatings($Vehicleid){
			//$status="Approved";
			$this->db->select("*");
			$query=$this->db->where('Vehicleid',$Vehicleid);
				//$query=$this->db->where('Status',$status);	
				  // it will return with only the number of data
	    	return $query->count_all_results('businessreviews');
		}

		public function countReviews($Vehicleid){
				//$status="Approved";
				$title="";
				$review="";
				$this->db->select("*");

					$query=$this->db->where('Vehicleid',$Vehicleid);
					//$query=$this->db->where('Status',$status);
					$query=$this->db->where('title',$title);	
					$query=$this->db->where('review',$review);	
					  // it will return with only the number of data
		    return $query->count_all_results('businessreviews');
		}

			public function count_5star_ratings($Vehicleid){
				//$status="Approved";
				$rating=5;
				$this->db->select("rating");
					$query=$this->db->where('Vehicleid',$Vehicleid);
					//$query=$this->db->where('Status',$status);
					$query=$this->db->where('rating',$rating);
						
					
				return $query->count_all_results('businessreviews'); 
			}

		public function count_4star_ratings($Vehicleid){
				//$status="Approved";
				$rating=4;
				$this->db->select("rating");
					$query=$this->db->where('Vehicleid',$Vehicleid);
					//$query=$this->db->where('Status',$status);
					$query=$this->db->where('rating',$rating);
						
					
				return $query->count_all_results('businessreviews'); 
			}

		public function count_3star_ratings($Vehicleid){
				//$status="Approved";
				$rating=3;
				$this->db->select("rating");
					$query=$this->db->where('Vehicleid',$Vehicleid);
					//$query=$this->db->where('Status',$status);
					$query=$this->db->where('rating',$rating);
						
					
				return $query->count_all_results('businessreviews'); 
			}

		public function count_2star_ratings($Vehicleid){
				//$status="Approved";
				$rating=2;
				$this->db->select("rating");
					$query=$this->db->where('Vehicleid',$Vehicleid);
					//$query=$this->db->where('Status',$status);
					$query=$this->db->where('rating',$rating);
						
					
				return $query->count_all_results('businessreviews'); 
			}

		public function count_1star_ratings($Vehicleid){
				//$status="Approved";
				$rating=1;
				$this->db->select("rating");
					$query=$this->db->where('Vehicleid',$Vehicleid);
					//$query=$this->db->where('Status',$status);
					$query=$this->db->where('rating',$rating);
						
					
				return $query->count_all_results('businessreviews'); 
		}
		public function get_ad_to_favour($vehicleid)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			$this->db->where('Vehicleid',$vehicleid);
			$query=$this->db->get('vehicle');
			return $query->result();


		}
		public function get_saved_cars($querywhere)
		{
			//$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,Status,Timestamp,Addedtime");
			/*$this->db->select('Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Status,Addedtime');
			$this->db->from('favourite as f');
			
			//$this->db->join('favourite','Vehicleid = Vehicleid');
			$this->db->join('vehicle as v','v.Vehicleid = f.vehicleid');
			$this->db->where('f.Email',$email);
			$query=$this->db->get(); 

			return $query->result();*/
			//$this->db->get();

			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,Timestamp,District,Location");
			$this->db->where($querywhere); 
			$query = $this->db->get('vehicle');
			return $query->result();

		}
	}
?>