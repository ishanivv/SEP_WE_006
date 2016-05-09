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
		public function submitOffer($selleremail,$senderoffer,$sendermessage,$id)
		{
			

			$data=array('Vehicleid'=>$id,'senderOffer'=>$senderoffer,'senderMessage'=>$sendermessage,'senderEmail'=> $this->session->userdata['logged_in']['email'],'sellerEmail'=>$selleremail);
			$this->db->insert('offer',$data);
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

			$limit=5;
			$offset=$this->uri->segment(3);
			if (empty($querywhere)){
				$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
				//$this->db->from('vehicle');
				$this->db->where('Status','Approved');
				$this->db->limit($limit,$offset);
				$query=$this->db->get('vehicle');
				return $query->result();
			}
			
			else{	
				$querywhere=$querywhere." and Status='Approved'";
				$this->db->where($querywhere); 
				$this->db->limit($limit,$offset);
				$query = $this->db->get('vehicle');
				return $query->result();
			}
			
		}

		//get the count of search results
		public function search_count($make,$model,$pricemin,$pricemax)
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
				return $query->num_rows();	
			}
			
			else{	
				$querywhere=$querywhere." and Status='Approved'";
				$this->db->where($querywhere); 
				$query = $this->db->get('vehicle');
				return $query->num_rows();	
			}
		}

		// select the vehicles from the vehicle table according to the field that selected in advanced search
		public function advanced_search($make,$model,$condition,$bodytype,$pria,$prib,$transmission,$year1,$year2,$fuel,$dis1,$dis2,$cap1,$cap2,$district)
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

			if ($bodytype!="Any"){
				if(empty($querywhere)){
					$querywhere=$querywhere."BodyType = '$bodytype'";
				}
				else{

					$querywhere=$querywhere." and BodyType ='$bodytype'";
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

			else if(!empty($year1) && empty($year2))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Modelyear > "'.$year1.'"';
					}
					else{
						$querywhere=$querywhere.'and Modelyear > "'.$year1.'"';	
					}
				}

				else if(empty($year1) && !empty($year2))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Modelyear < "'.$year2.'"';
					}
					else{
						$querywhere=$querywhere.'and Modelyear < "'.$year2.'"';	
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

			if (!empty($dis1) && !empty($dis2)){
				if(empty($querywhere)){
					$querywhere=$querywhere.'Mileage BETWEEN "'.$dis1.'" and "'.$dis2.'"';
				}
				else{

					$querywhere=$querywhere.' and Mileage BETWEEN "'.$dis1.'" and "'.$dis2.'"';

				}
			}

			else if(!empty($dis1) && empty($dis2))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Mileage > "'.$dis1.'"';
					}
					else{
						$querywhere=$querywhere.'and Mileage > "'.$dis1.'"';	
					}
				}

				else if(empty($dis1) && !empty($dis2))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'Mileage < "'.$dis2.'"';
					}
					else{
						$querywhere=$querywhere.'and Mileage < "'.$dis2.'"';	
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

			else if(!empty($cap1) && empty($cap2))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'EngineCapacity > "'.$cap1.'"';
					}
					else{
						$querywhere=$querywhere.'and EngineCapacity > "'.$cap1.'"';	
					}
				}

				else if(empty($cap1) && !empty($cap2))
				{
					if(empty($querywhere)){
						$querywhere=$querywhere.'EngineCapacity < "'.$cap2.'"';
					}
					else{
						$querywhere=$querywhere.'and EngineCapacity < "'.$cap2.'"';	
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

			$limit=5;
			$offset=$this->uri->segment(3);
			if (empty($querywhere)){
				$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email");
				//$this->db->from('vehicle');
				$this->db->where('Status','Approved');
				$this->db->limit($limit,$offset);
				$query=$this->db->get('vehicle');
				return $query->result();
			}
			
			else{
				$querywhere=$querywhere." and Status = 'Approved'";
				$this->db->where($querywhere); 
				$this->db->limit($limit,$offset);
				$query = $this->db->get('vehicle');
				return $query->result();
			}		


		}

		public function savesearch($email)
		{
			$data=array('Brand' =>$this->input->post('make') ,'Model'=>$this->input->post('model'),'Modelyearfrom'=>$this->input->post('year1'),'Modelyearto'=>$this->input->post('year2'),'VehicleCondition'=>$this->input->post('condition'),'Mileagefrom'=>$this->input->post('dis1'),'Mileageto'=>$this->input->post('dis2'),'BodyType'=>$this->input->post('BodyType'),'Transmission'=>$this->input->post('transmission'),'Fueltype'=>$this->input->post('fuel'),'EngineCapacityfrom'=>$this->input->post('cap1'),'EngineCapacityto'=>$this->input->post('cap2'),'PriceMin'=>$this->input->post('pria'),'PriceMax'=>$this->input->post('prib'),'Status'=>'Enable','District'=>$this->input->post('district'),'Email'=>$email);
			$this->db->insert('savedsearch',$data);
		}

		public function get_saved_search($email)
		{
			$this->db->select("Searchid,Brand,Model,Modelyearfrom,Modelyearto,VehicleCondition,Mileagefrom,Mileageto,BodyType,Transmission,FuelType,EngineCapacityfrom,EngineCapacityto,PriceMin,PriceMax,Status,District,LastCheck");
			$query=$this->db->get_where('savedsearch',array('Email' => $email));
			return $query->result();
		}

		public function count_savedsearch($email)
		{
			$this->db->select("Searchid,Brand,Model,Modelyearfrom,Modelyearto,VehicleCondition,Mileagefrom,Mileageto,BodyType,Transmission,FuelType,EngineCapacityfrom,EngineCapacityto,PriceMin,PriceMax,Status,District,LastCheck");
			$query=$this->db->get_where('savedsearch',array('Email' => $email));
			return $query->num_rows();
		}

		//delete a feedback according to the feedback id
		public function delete_feedback($feedbackid)
		{

			$this->db->where('Feedbackid',$feedbackid);
			$this->db->delete('feedback');

		}
		public function insert_into_favourite($email,$vehicleid)
		{

			$data=array('Email'=>$email,'Vehicleid'=>$vehicleid);
			$this->db->insert('favourite',$data);
			if ($this->db->affected_rows() ==1)
			{
    			return true;
			}
			else
			{
				return false;
			}
		} 
		public function change_status($value,$searchid)
		{
			$data=array('Status' => $value);
			$this->db->where('Searchid',$searchid);
			$this->db->update('savedsearch',$data);

			if ($this->db->affected_rows() ==1)
			{
    			return true;
			}
			else
			{
				return false;
			}
		}

		public function delete_saved_search($searchid)
		{
			$this->db->where('Searchid',$searchid);
			$this->db->delete('savedsearch');
		}

		public function get_dealers()
		{
			$this->db->select("Email,Name,CompanyName,WebSite,Photo,Country,Phone,City,Address");
			$query=$this->db->get_where('user',array('Type' => 'Business'));
			return $query->result();
		}
		public function get_dealer($email)
		{
			$this->db->select("Email,Name,CompanyName,WebSite,Photo,Country,Phone,City,Address");
			$query=$this->db->get_where('user',array('Email' => $email));
			return $query->result();
		}


		public function insertIntoBusinessReview($Vehicleid,$rate){
			
			

			if(($_POST['reviewTitle'])!=null || ($_POST['review'])!=null)
			{
			$title=$_POST['reviewTitle'];
			$review=$_POST['review'];

			$data=array('Vehicleid'=>$Vehicleid,'rating'=>$rate,'title'=>$title,'review'=> $review,'reviewPoster'=>$this->session->userdata['logged_in']['email']);
			$this->db->insert('businessreviews',$data);
			}
			else{

				$title=" ";
			$review=" "; 
			$data=array('Vehicleid'=>$Vehicleid,'rating'=>$rate,'title'=>$title,'review'=> $review,'reviewPoster'=>$this->session->userdata['logged_in']['email']);
			$this->db->insert('businessreviews',$data);
		}

		}
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																									
		public function getOffer($selleremail,$id){

			$this->db->select("*");
			$query=$this->db->where('Vehicleid',$id,'senderEmail',$this->session->userdata['logged_in']['email'],'sellerEmail',$selleremail );
			$query=$this->db->get('offer');
			return $query->result();	
		

		}

		public function load_dealer_view($email)
		{
			$this->db->select("Vehicleid,Image1,Brand,Model,Modelyear,VehicleCondition,Mileage,BodyType,Transmission,Fueltype,EngineCapacity,Price,Negotiable,Description,Phone,Email,Status,Timestamp");
			//$this->db->from('vehicle');
			$this->db->where('Email',$email);
			$query=$this->db->get('vehicle');
			return $query->result();
		}

	}
?>