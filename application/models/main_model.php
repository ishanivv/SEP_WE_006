<?php
	/**
	* 
	*/
	class Main_Model extends CI_Model
	{
		//insert vehicle details into database
		public function insert_into_vehicle()
		{
			//$handle = fopen($_FILES["image1"]["tmp_name"], 'r');

			$data=array('Category'=>'Car','Image1'=>$this->input->post('image1'),'Image2'=>$this->input->post('image2'),'Image3'=>$this->input->post('image3'),'Brand' =>$this->input->post('Brand') ,'Model'=>$this->input->post('Model'),'Modelyear'=>$this->input->post('ModelYear'),'VehicleCondition'=>$this->input->post('VehicleCondition'),'Mileage'=>$this->input->post('Mileage'),'BodyType'=>$this->input->post('BodyType'),'Transmission'=>$this->input->post('Transmission'),'Fueltype'=>$this->input->post('groupFuel'),'EngineCapacity'=>$this->input->post('EngineCapacity'),'Price'=>$this->input->post('Price'),'Negotiable'=>$this->input->post('checkbox5'),'Description'=>$this->input->post('Description'),'Phone'=>$this->input->post('Phone'),'Email'=>$this->input->post('Email'),'Status'=>'Pending','District'=>$this->input->post('district'),'Location'=>$this->input->post('location'));
			$this->db->insert('vehicle',$data);
		}

		//Insert Feedbacks into the database
		public function insert_into_feedback()
		{
			$data=array('Email' => $this->input->post('email'),'Name'=>$this->input->post('name'),'Message'=>$this->input->post('message'),'Status'=>'Not Checked');
			$this->db->insert('feedback',$data);
				
		}

		//retrieve the feedbacks from the database to show admins
		public function get_feedback(){
			$this->db->select("Feedbackid,Email,Name,Message,Status,Timestamp");
			$query=$this->db->get_where('feedback');
			//$this->db->from('user');
			//$query=$this->db->get('user');
			return $query->result();
		}

		//select the Feedback id,Name,Email, Message from feedback table according to the feedbackid
		public function get_feedback_view($feedbackid){

			$this->db->select("Feedbackid,Name,Email,Message");
			$query=$this->db->get_where('feedback',array('Feedbackid' => $feedbackid));
			return $query->result();


		}

		//Change the status of the feedback according to the feedbackid 
		public function change_feedback_status($feedbackid)
		{
			$data=array('Status' => 'Checked');
			$this->db->where('Feedbackid',$feedbackid);
			$this->db->update('feedback',$data);
		}

		// select the Email, Message from feedback table according to the feedbackid
		public function get_feedback_email($feedbackid){

			$this->db->select("Feedbackid,Email,Message");
			$query=$this->db->get_where('feedback',array('Feedbackid' => $feedbackid));
			return $query->result();
		}

		// take no of feedbacks which the status is equal to 'Not checked'
		public function count_feedbacks()
		{
			$this->db->select("Feedbackid,Email,Name,Message,Status,Timestamp");
			$query=$this->db->get_where('feedback',array('Status'=>'Not Checked'));
			return $query->num_rows();
		}

		// select the vehicles from the vehicle table according to the make, model & price
		public function search($make,$model,$pricemin,$pricemax)
		{
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

			if (empty($querywhere)){
				$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
				//$this->db->from('vehicle');
				$this->db->where('Status','Approved');
				$query=$this->db->get('vehicle');
				return $query->result();
			}
			
			else{	
				$querywhere=$querywhere." and Status='Approved'";
				$this->db->where($querywhere); 
				$query = $this->db->get('vehicle');
				return $query->result();
			}
			
		}

		// select the vehicles from the vehicle table according to the field that selected in advanced search
		public function advanced_search($make,$model,$condition,$pria,$prib,$transmission,$year1,$year2,$fuel,$dis1,$dis2,$cap1,$cap2)
		{
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

			if (!empty($pria) && !empty($prib)){
				if(empty($querywhere)){
					$querywhere=$querywhere.'Price BETWEEN "'.$pria.'" and "'.$prib.'"';
				}
				else{

					$querywhere=$querywhere.'and Price BETWEEN "'.$pria.'" and "'.$prib.'"';
				}

			}
			else if(!empty($pria) && empty($prib))
			{
				if(empty($querywhere)){
					$querywhere=$querywhere.'Price > "'.$pria.'"';
				}
				else{
					$querywhere=$querywhere.'and Price > "'.$pria.'"';	
				}
			}

			else if(empty($pria) && !empty($prib))
			{
				if(empty($querywhere)){
					$querywhere=$querywhere.'Price < "'.$prib.'"';
				}
				else{
					$querywhere=$querywhere.'and Price < "'.$prib.'"';	
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


			if (empty($querywhere)){
				$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
				//$this->db->from('vehicle');
				$this->db->where('Status','Approved');
				$query=$this->db->get('vehicle');
				return $query->result();
			}
			
			else{
				$this->db->where($querywhere); 
				$querywhere=$querywhere." and Status = 'Approved'";
				$query = $this->db->get('vehicle');
				return $query->result();
			}		


		}

		//delete a feedback according to the feedback id
		public function delete_feedback($feedbackid)
		{

			$this->db->where('Feedbackid',$feedbackid);
			$this->db->delete('feedback');

		}
	}
?>