<?php
	/**
	* 
	*/
	class Main_Model extends CI_Model
	{
		

		public function insert_into_vehicle()
		{
			//$handle = fopen($_FILES["image1"]["tmp_name"], 'r');

			$data=array('Category'=>'Car','Image1'=>$this->input->post('image1'),'Image2'=>$this->input->post('image2'),'Image3'=>$this->input->post('image3'),'Brand' =>$this->input->post('Brand') ,'Model'=>$this->input->post('Model'),'Modelyear'=>$this->input->post('ModelYear'),'VehicleCondition'=>$this->input->post('VehicleCondition'),'Mileage'=>$this->input->post('Mileage'),'BodyType'=>$this->input->post('BodyType'),'Transmission'=>$this->input->post('Transmission'),'Fueltype'=>$this->input->post('groupFuel'),'EngineCapacity'=>$this->input->post('EngineCapacity'),'Price'=>$this->input->post('Price'),'Negotiable'=>$this->input->post('checkbox5'),'Description'=>$this->input->post('Description'),'Phone'=>$this->input->post('Phone'),'Email'=>$this->input->post('Email'),'Status'=>'Pending' );
			$this->db->insert('vehicle',$data);
		}
		public function insert_into_feedback()
		{
			$data=array('Email' => $this->input->post('email'),'Name'=>$this->input->post('name'),'Message'=>$this->input->post('message'));
			$this->db->insert('feedback',$data);
				
		}
		public function getad_preview($vehicleid){
			$this->db->select("Vehicleid,Image1,Image2,Image3,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
			$query=$this->db->get_where('vehicle',array('Vehicleid' => $vehicleid));
			//$this->db->from('user');
			//$query=$this->db->get('user');
			return $query->result();
		}
		/*function search($category,$make,$model)
		{
			$this->db->where('Category', $category);
			$this->db->where('Brand', $make);
			$this->db->where('Model', $model); 
		

			$query = $this->db->get('vehicle');
			return $query->result();
			
		}*/

		function search($category,$make,$model)
		{
			

			//$this->db->where('Category', $category);
			//$this->db->where('Brand', $make);
			//$this->db->where('Model', $model); 

			$querywhere="";
			if($category!="Any"){
				if (empty($querywhere)){
					$querywhere=$querywhere." Category = '$category'";
					}
				else {
					$querywhere=$querywhere." and Category = '$category'";
					}
				}

			if ($make!="Any"){
				if (empty($querywhere)){
					$querywhere=$querywhere." Brand = '$make'";
				}
				else {
					$querywhere=$querywhere." and Brand = '$make'";
				}
			}

			if ($model!="Any"){
				if (empty($querywhere)){
					$querywhere=$querywhere." Model = '$model'";
				}
				else {
					$querywhere=$querywhere." and Model ='$model'";
				}

			}	
			$querywhere=$querywhere." and Status='Approved'";
			$this->db->where($querywhere); 
			$query = $this->db->get('vehicle');
			return $query->result();
			
		}

		function advanced_ctrl ($category,$make,$model,$condition,$pria,$prib,$transmission,$year1,$year2,$fuel,$dis1,$dis2,$cap1,$cap2)
		{

		//$this->db->where('Price >=',$pria);
        //$this->db->where('Price <=',$prib);
        //$price = $this->db->get('vehicle');

        //$this->db->where('Modelyear >=',$year1);
        //$this->db->where('Modelyear <=',$year2);
        //$year = $this->db->get('vehicle');

        //$this->db->where('Mileage >=',$dis1);
        //$this->db->where('Mileage  <=',$dis2);
        //$distance = $this->db->get('vehicle');

        //$this->db->where('EngineCapacity >=',$cap1);
        //$this->db->where('EngineCapacity <=',$cap2);
        //$capacity = $this->db->get('vehicle');



			$querywhere="";
			if($category!="Any"){
				if (empty($querywhere)){
					$querywhere=$querywhere." Category = '$category'";
					}
				else {
					$querywhere=$querywhere." and Category = '$category'";
					}
				}

			if ($make!="Any"){
				if (empty($querywhere)){
					$querywhere=$querywhere." Brand = '$make'";
				}
				else {
					$querywhere=$querywhere." and Brand = '$make'";
				}
			}

			if ($model!="Any"){
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
			if (!empty($pria) && !empty($prib)){
				if(empty($querywhere)){
					$querywhere=$querywhere.'Price BETWEEN "'.$pria.'" and "'.$prib.'"';
				}
				else{

					$querywhere=$querywhere.'and Price BETWEEN "'.$pria.'" and "'.$prib.'"';
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
			if (!empty($year1) && !empty($year2)){
				if(empty($querywhere)){
					$querywhere=$querywhere.'Modelyear BETWEEN "'.$year1.'" and "'.$year2.'"';
				}
				else{

					$querywhere=$querywhere. 'and Modelyear BETWEEN "'.$year1.'" and "'.$year2.'"';
				}

			}	
			if ($fuel!="Any"){
				if(empty($querywhere)){
					$querywhere=$querywhere."Fueltype= '$fuel'";
				}
				else{

					$querywhere=$querywhere."and Fueltype ='fuel'";
				}

			}
			if (!empty($dis1) && !empty($dis2)){
				if(empty($querywhere)){
					$querywhere=$querywhere.'Mileage BETWEEN "'.$dis1.'" and "'.$dis2.'"';
				}
				else{

					$querywhere=$querywhere.' and Mileage BETWEEN "'.$dis1.'" and "'.$dis2.'"';

			}
		}
			if (!empty($cap1) && !empty($cap2)){
				if(empty($querywhere)){
					$querywhere=$querywhere.'EngineCapacity BETWEEN "'.$cap1.'" and "'.$cap2.'"';
				}
				else{

					$querywhere=$querywhere.'and EngineCapacity BETWEEN "'.$cap1.'" and "'.$cap2.'"';
				}

			}		


			$querywhere=$querywhere." and Status='Approved'";
			$this->db->where($querywhere); 
			$query = $this->db->get('vehicle');
			return $query->result();


		}
	}
?>