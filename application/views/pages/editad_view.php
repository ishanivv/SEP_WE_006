 <?php
	if(!(isset($this->session->userdata['logged_in']))) 
	{
		redirect("http://localhost/ci/Login");
	}
?>
<div class="main" role="main">
<div style="background-image:url(http://localhost/ci/images/road.jpg);width:100%;background-repeat:no-repeat;
				background-size:100% 100%;
				background-attachment:fixed">
		<div id="content" class="content full">
			<div class="container">
				<div class="row">
					<div class="col-md-8">   
					<section class="signup-form sm-margint">
						
						

						<div class="regular-signup">
						<h2>Edit your Ad</h2>
						<div style="color:red">
						<?php
                                        $CI =& get_instance();
                                        $CI->load->library('form_validation');
                                        echo validation_errors();
                                    ?>
   						</div>
   						<?php foreach($posts as $post){?>
   						<form name="myForm3" method="post" action="<?php echo base_url().'editAd_ctrl/update_myad/'.$post->Vehicleid;?>">
   						
   						<div>
						<select id="dis" name="district" class="form-control" onchange="populate(this.id,'loc')">
											<option value="<?php echo $post->District;?>"><?php echo $post->District;?></option>
											<option>Select District</option>
											<option value="Colombo">Colombo</option>
											<option value="Kandy">Kandy</option>
											<option value="Galle">Galle</option>
											<option value="Ampara">Ampara</option>
											<option value="Anuradhapura">Anuradhapura</option>
											<option value="Badulla">Badulla</option>
											<option value="Batticaloa">Batticaloa</option>
											<option value="Gampaha">Gampaha</option>
											<option value="Hambantota">Hambantota</option>
											<option value="Jaffna">Jaffna</option>
											<option value="Kalutara">Kautara</option>
											<option value="Kegalle">Kegalle</option>
											<option value="Kilinochchi">Kilinochchi</option>
											<option value="Kurunegala">Kurunegala</option>
											<option value="Mannar">Mannar</option>
											<option value="Matale">Matale</option>
											<option value="Matara">Matara</option>
											<option value="Moneragala">Moneragala</option>
											<option value="Mullativu">Mullativu</option>
											<option value="Nuwara Eliya">Nuwara Eliya</option>
											<option value="Polonnaruwa">Polonnaruwa</option>
											<option value="Puttalam">Puttalam</option>
											<option value="Ratnapura">Ratnapura</option>
											<option value="Trincomalee">Trincomalee</option>
											<option value="Vavuniya">Vavuniya</option>
										</select>
										<select id="loc" name="location" class="form-control">
										<option value="<?php echo $post->Location;?>"><?php echo $post->Location;?></option>
										<option>Select Location</option>
										</select>
						</div>

						
						
					<label><h4>Edit Photos</h4></label>  
					 <div>  		
					<!-- <?php //echo form_open_multipart('post_ctrl/upload') ?>  --> 
					<!-- <form action="" method="post" enctype="multipart/form-data"> -->
													
					<!--<ul><input type="file" name="image1" accept="image/*" class="col-md-4" value="<?php //echo $post->Image1 ?>"></ul>
					<ul><input type="file" name="image2" accept="image/*"class="col-md-4" value="<?php //echo $post->Image2 ?>"></ul> 
			   		<ul><input type="file" name="image3" accept="image/*" class="col-md-4" value="<?php //echo $post->Image3 ?>"></ul>-->
					<!-- <input type="submit" name="addphoto" class="btn btn-primary btn-lg" value="Add a photo">  -->
						

						<?php $path="C:/fakepath/";?>
													
																
					<ul><input type="file" id="browseOne" name="fileuploadOne" style="display: none" onChange="Handlechange();"/>

					<input type="text" id="filenameOne" name="imgPath1" value=<?php echo $path.$post->Image1?> />

					<input type="button" value="Choose file" id="fakeBrowseOne" onclick="HandleBrowseClick();" /></ul>

					

					<ul><input type="file" id="browseTwo" name="fileuploadTwo" style="display: none" onChange="Handlechange();"/>

					<input type="text" id="filenameTwo" name="imgPath2" value=<?php echo $path.$post->Image2?> />

					<input type="button" value="Choose file" id="fakeBrowseTwo" onclick="HandleBrowseClick();" /></ul>

						


					<ul><input type="file" id="browseThree" name="fileupload" style="display: none" onChange="Handlechange();"/>

					<input type="text" id="filenameThree" name="imgPath3" value=<?php echo $path.$post->Image3?> />

					<input type="button" value="Choose file" id="fakeBrowseThree" onclick="HandleBrowseClick();" /></ul>
					
					</div>   
						<div class="spacer-20"></div>
						<h4>Fill the details</h4>
						<p>All field marked with * are required</p>
						<select name="Brand" class="form-control selectpicker">
							<option value="<?php echo $post->Brand;?>"><?php echo $post->Brand;?></option>
							<option value="brand">Brand*</option>
							<option value="Alfa Romeo">Alfa Romeo</option>
							<option value="Aston Martin">Aston Martin</option>
							<option value="Audi">Audi</option>
							<option value="Austin">Austin</option>
							<option value="BMW">BMW</option>
							<option value="Buick">Buick</option>
							<option value="Cadillac">Cadillac</option>
							<option value="Changan">Changan</option>
							<option value="Chery">Chery</option>
							<option value="Chevrolet">Chevrolet</option>
							<option value="Chrysler">Chrysler</option>
							<option value="Citroen">Citroen</option>
							<option value="Daewoo">Daewoo</option>
							<option value="Daihatsu">Daihatsu</option>
							<option value="Datsun">Datsun</option>
							<option value="Dodge">Dodge</option>
							<option value="Ferrari">Ferrari</option>
							<option value="Fiat">Fiat</option>
							<option value="Ford">Ford</option>
							<option value="Geely">Geely</option>
							<option value="GMC">GMC</option>
							<option value="Hino">Hino</option>
							<option value="Honda">Honda</option>
							<option value="Hummer">Hummer</option>
							<option value="Hyundai">Hyundai</option>
							<option value="Isuzu">Isuzu</option>
							<option value="Jaguar">Jaguar</option>
							<option value="Jeep">Jeep</option>
							<option value="Kia">Kia</option>
							<option value="Lamborgini">Lamborgini</option>
							<option value="Land Rover">Land Rover</option>
							<option value="Lexus">Lexus</option>
							<option value="Lincoln">Lincoln</option>
							<option value="Mahidra">Mahidra</option>
							<option value="Maruti">Maruti</option>
							<option value="Mazda">Mazda</option>
							<option value="Mercedes-Benz">Mercedes-Benz</option>
							<option value="MG">MG</option>
							<option value="Micro">Micro</option>
							<option value="Mitsubishi">Mitsubishi</option>
							<option value="Geely">Geely</option>
							<option value="Toyota">Toyota</option>

					</select>
					<input type="text" name="Model" Placeholder="Model*" class="form-control" value="<?php echo $post->Model;?>">
					<input type="text" name="ModelYear" Placeholder="Model Year*" class="form-control" value="<?php echo $post->Modelyear;?>">
					
					<select name="VehicleCondition" class="form-control selectpicker">
						<option value="<?php echo $post->VehicleCondition;?>"><?php echo $post->VehicleCondition;?></option>
						<option value="condition">Condition*</option>
						<option value="New">New</option>
						<option value="Used">Used</option>
						<option value="Reconditioned">Reconditioned</option>
					</select>
					<input type="text" name="Mileage" placeholder="Mileage*" class="form-control" value="<?php echo $post->Mileage;?>">
					<select name="BodyType" class="form-control selectpicker">
						<option value="<?php echo $post->BodyType;?>"><?php echo $post->BodyType;?></option>
						<option value="bodytype">Body Type*</option>
						<option value="Saloon">Saloon</option>
						<option value="Hatchbatch">Hatchback</option>
						<option value="Station wagen">Station wagon</option>
						<option value="Convertible">Convertible</option>
						<option value="Coupe/Sports">Coupe/Sports</option>
						<option value="SUV / 4x4">SUV / 4x4</option>
						<option value="MPV">MPV</option>
					</select>
					<select name="Transmission" class="form-control selectpicker">
						<option value="<?php echo $post->Transmission;?>"><?php echo $post->Transmission;?></option>
						<option value="transmission">Transmission*</option>
						<option value="Manual">Manual</option>
						<option value="Automatic">Automatic</option>
						<option value="Other">Other Transmission</option>
					</select>

					<label class="col-md-4">Fuel Type* </label>

				<?php if(  $post->Fueltype == "Petrol") {?>

					<input type="radio" name="groupFuel" value="Petrol" checked='checked'/> Petrol
					<input type="radio" name="groupFuel" value="Diesel"/>Diesel
					<input type="radio" name="groupFuel" value="CNG" /> CNG
					<input type="radio" name="groupFuel" value="Other"/>Other

				<?php } elseif ( $post->Fueltype == "Diesel") {?>

					<input type="radio" name="groupFuel" value="Petrol"/> Petrol
					<input type="radio" name="groupFuel" value="Diesel" checked='checked'/>Diesel
					<input type="radio" name="groupFuel" value="CNG" /> CNG
					<input type="radio" name="groupFuel" value="Other"/>Other


				<?php } elseif ($post->Fueltype  == "CNG") {?>

					<input type="radio" name="groupFuel" value="Petrol"/> Petrol
					<input type="radio" name="groupFuel" value="Diesel"/>Diesel
					<input type="radio" name="groupFuel" value="CNG" checked='checked'/> CNG
					<input type="radio" name="groupFuel" value="Other"/>Other

				<?php } elseif ( $post->Fueltype  == "other") {?>

					<input type="radio" name="groupFuel" value="Petrol"/> Petrol
					<input type="radio" name="groupFuel" value="Diesel"/>Diesel
					<input type="radio" name="groupFuel" value="CNG" /> CNG
					<input type="radio" name="groupFuel" value="Other" checked='checked'/>Other

				<?php } ?>

					<div class="spacer-20"></div>

					<input type="text" name="EngineCapacity" placeholder="Engine capacity (cc)*" class="form-control"
					 value="<?php echo $post->EngineCapacity;?>">

					<div class="spacer-20"></div>
					<input type="text" name="Price" placeholder="Price(Rs.)*" class="col-md-4" value="<?php echo $post->Price;?>"/>

					<?php if(  $post->Negotiable == "1") {?>
					<input type="checkbox" name="checkbox5" value="1" class="col-md-1" checked='checked'>Negotiable

					<?php } elseif(  $post->Negotiable == "0") {?>
					<input type="checkbox" name="checkbox5" value="0" class="col-md-1" >Negotiable

					<?php } ?>

					<div class="spacer-20"></div>	

					<textarea rows="10" cols="103" name="Description" placeholder="Description*"  
					 class="form-control"><?php echo $post->Description ?></textarea>
					<input type="text" name="Phone" placeholder="Phone*" value="<?php echo $post->Phone ?>" class="form-control">
					<input type="text" name="Email" placeholder="Email*" class="form-control" 
					value=<?php echo $this->session->userdata['logged_in']['email'] ?>>
					<input type="submit" name="editad" class="btn btn-primary btn-lg" value="EDIT AD">

					<?php } ?>
				</div>
			</form>
		</section>
		</div>
		</div>
		</div>
	</div>
</div>
</div>		

<script  type="text/javascript">
							


						function HandleBrowseClick()
						{

							if(document.getElementById("fakeBrowseOne").id =="fakeBrowseOne" ) 
								{
							
   							 var fileinputOne = document.getElementById("browseOne");
    						fileinputOne.click();
    					}

    					else if(document.getElementById("fakeBrowseTwo").id =="fakeBrowseTwo")
    					{	
    						 var fileinputTwo = document.getElementById("browseTwo");
    						fileinputTwo.click();
 

    					}
    					else if (document.getElementById("fakeBrowseThree").id =="fakeBrowseThree")
    					{
    						 var fileinputThree = document.getElementById("browseThree");
    						fileinputThree.click();
 
    					}
					

						}

						function Handlechange()
						{
							if(document.getElementById("fakeBrowseOne").id=="fakeBrowseOne") 
								{
    						var fileinputOne = document.getElementById("browseOne");
    						var textinputOne = document.getElementById("filenameOne");
    						textinputOne.value = fileinputOne.value;
    					}
    						else if(document.getElementById("fakeBrowseTwo").id=="fakeBrowseTwo") 
								{
    						var fileinputTwo = document.getElementById("browseTwo");
    						var textinputTwo= document.getElementById("filenameTwo");
    						textinputTwo.value = fileinputTwo.value;
    					}

    						else if(document.getElementById("fakeBrowseThree").id=="fakeBrowseThree") 
								{
    						var fileinputThree= document.getElementById("browseThree");
    						var textinputThree = document.getElementById("filenameThree");
    						textinputThree.value = fileinputThree.value;
    					}

						}

						</script>	

<script type="text/javascript">
	function populate(s1,s2)
	{
		var s1=document.getElementById(s1);
		var s2=document.getElementById(s2);

		s2.innerHTML="";

		if(s1.value=="Colombo")
		{
			var optionArray=["Angoda|Angoda","Athurugiriya|Athurugiriya","Avissawella|Avissawella","Battaramulla|Battaramulla","Boralesgamuwa|Boralesgamuwa","Colombo 1|Colombo 1","Colombo 2|Colombo 2","Colombo 3|Colombo 3","Colombo 4|Colombo 4","Colombo 5|Colombo 5","Colombo 6|Colombo 6","Colombo 7|Colombo 7","Colombo 8|Colombo 8","Colombo 9|Colombo 9","Colombo 10|Colombo 10","Colombo 11|Colombo 11","Colombo 12|Colombo 12","Colombo 13|Colombo 13","Colombo 14|Colombo 14","Colombo 15|Colombo 15","Dehiwala|Dehiwala","Hanwella|Hanwella","Homagama|Homagama","Kaduwela|Kaduwela","Kesbewa|Kesbewa","Kohuwala|Kohuwala","Kolonnawa|Kolonnawa","Kottawa|Kottawa","Kotte|Kotte","Malabe|Malabe","Maharagama|Maharagama","Moratuwa|Moratuwa","Mount Lavinia|Mount Lavinia","Nawala|Nawala","Nugegoda|Nugegoda","Padukka|Padukka","Pannipitiya|Pannipitiya","Piliyandala|Piliyandala","Rajagiriya|Rajagiriya","Ratmalana|Ratmalana","Talawatugoda|Talawatugoda","Wellampitiya|Wellampitiya"];
		}
		else if(s1.value=="Kandy")
		{
			var optionArray=["Akurana|Akurana","Ampitiya|Ampitiya","Digana|Digana","Galagedara|Galagedara","Gampola|Gampola","Gelioya|Gelioya","Kadugannawa|Kadugannawa","Kandy|Kandy","Katugastota|Katugastota","Kundasale|Kundasale","Madawala Bazaar|Madawala Bazaar","Nawalapitiya|Nawalapitiya","Peradeniya|Peradeniya","Pilimatalawa|Pilimatalawa","Wattegama|Wattegama"];
		}
		else if(s1.value=="Galle")
		{
			var optionArray=["Ahangama|Ahangama","Ambalangoda|Ambalangoda","Baddegama|Baddegama","Batapola|Batapola","Bentota|Bentota","Elpitiya|Elpitiya","Hikkaduwa|Hikkaduwa","Karapitiya|Karapitiya"];
		}
		else if(s1.value=="Ampara")
		{
			var optionArray=["Ampara|Ampara","Akkarepattu|Akkarepattu","Kalmunai|Kalmunai","Sainthamaruthu|Sainthamaruthu"];
		}
		else if(s1.value=="Anuradhapura")
		{
			var optionArray=["Anuradhapura|Anuradhapura","Eppawala|Eppawala","Galenbindunuwewa|Galenbindunuwewa","Galnewa|Galnewa","Habarana|Habarana","Kekirawa|Kekirawa","Madawachchiya|Madawachchiya","Mihintale|Mihintale","Nochchiyagama|Nochchiyagama","Talawa|Talawa","Tambuttegama|Tambuttegama"];
		}
		else if(s1.value=="Badulla")
		{
			var optionArray=["Badulla|Badulla","Bandarawela|Bandarawela","Diyatalawa|Diyatalawa","Ella|Ella","Hali Ella|Hali Ella","Haputale|Haputale","Mahiyanganaya|Mahiyanganaya","Passara|Passara","Welimada|Welimada"];
		}
		else if(s1.value=="Batticaloa")
		{
			var optionArray=["Batticaloa|Batticaloa"];
		}
		else if(s1.value=="Gampaha")
		{
			var optionArray=["Delgoda|Delgoda","Divulapitiya|Divulapitiya","Gampaha|Gampaha","Ganemulla|Ganemulla","Ja-Ela|Ja-Ela","Kadawatha|Kadawatha","Kandana|Kandana","Katunayake|Katunayake","Kelaniya|Kelaniya","Kiribathgoda|Kiribathgoda","Minuwangoda|Minuwangoda","Mirigama|Mirigama","Negombo|Negombo","Nittambuwa|Nittambuwa","Ragama|Ragama","Veyangoda|Veyangoda","Wattala|Wattala"];
		}
		else if(s1.value=="Hambantota")
		{
			var optionArray=["Ambalantota|Ambalantota","Beliatta|Beliatta","Hambantota|Hambantota","Tangalle|Tangalle","Tissamaharama|Tissamaharama"];
		}
		else if(s1.value=="Jaffna")
		{
			var optionArray=["Chavakachcheri|Chavakachcheri","Jaffna|Jaffna","Nallur|Nallur"];
		}
		else if(s1.value=="Kalutara")
		{
			var optionArray=["Alutgama|Alutgama","Bandaragama|Bandaragama","Beruwala|Beruwala","Horana|Horana","Ingiriya|Ingiriya","Kalutara|Kalutara","Matugama|Matugama","Panadura|Panadura","Wadduwa|Wadduwa"];
		}
		else if(s1.value=="Kegalle")
		{
			var optionArray=["Dehiowita|Dehiowita","Deraniyagala|Deraniyagala","Galigamuwa|Galigamuwa","Kegalle|Kegalle","Kitulgala|Kitulgala","Mawanella|Mawanella","Warakapola|Warakapola","Rambukkana|Rambukkana","Ruwanwella|Ruwanwella","Yatiyantota|Yatiyantota"];
		}
		else if(s1.value=="Kilinochchi")
		{
			var optionArray=["Kilinochchi|Kilinochchi"];
		}
		else if(e1.value=="Kurunegala")
		{
			var optionArray=["Alawwa|Alawwa","Bingiriya|Bingiriya","Galgamuwa|Galgamuwa","Giriulla|Giriulla","Hettipola|Hettipola","Ibbagamuwa|Ibbagamuwa","Kuliyapitiya|Kuliyapitiya","Kurunegala|Kurunegala","Mawathagama|Mawathagama","Narammala|Narammala","Nikaweratiya|Nikaweratiya","Pannala|Pannala","Polgahawela|Polgahawela","Wariyapola|Wariyapola"];
		}
		else if(e1.value=="Mannar")
		{
			var optionArray=["Mannar|Mannar"];
		}
		else if(e1.value=="Matale")
		{
			var optionArray=["Dambulla|Dambulla","Galewela|Galewela","Matale|Matale","Palapathwela|Palapathwela","Rattola|Rattola","Sigiriya|Sigiriya","Ukuwela|Ukuwela","Yatawatta|Yatawatta"];
		}
		else if(e1.value=="Matara")
		{
			var optionArray=["Akuressa|Akuressa","Deniyaya|Deniyaya","Dikwella|Dikwella","Hakmana|Hakmana","Kamburugamuwa|Kamburugamuwa","Kamburupitiya|Kamburupitiya","Kekanadurra|Kekanadurra","Matara|Matara"];
		}
		else if(e1.value=="Moneragala")
		{
			var optionArray=["Bibile|Bibile","Buttala|Buttala","Kataragama","Moneragala|Moneragala","Wellawaya|Wellawaya"];
		}
		else if(e1.value=="Mullativu")
		{
			var optionArray=["Mullativu|Mullativu"];
		}
		else if(e1.value=="Nuwara Eliya")
		{
			var optionArray=["Ginigathena|Ginigathena","Hatton|Hatton","Madulla|Madulla","Nuwara Eliya|Nuwara Eliya"];
		}
		else if(e1.value=="Polonnaruwa")
		{
			var optionArray=["Hingurakgoda|Hingurakgoda","Kaduruwela|Kaduruwela","Medirigiriya|Medirigiriya","Polonnaruwa|Polonnaruwa"]
		}
		else if(e1.value=="Puttalam")
		{
			var optionArray=["Chillaw|Chillaw","Dankotuwa|Dankotuwa","Marawila|Marawila","Nattandiya|Nattandiya","Puttalam|Puttalam","Wennappuwa|Wennappuwa"];
		}
		else if(e1.value=="Ratnapura")
		{
			var optionArray=["Balangoda|Balangoda","Eheliyagoda|Eheliyagoda","Embilipitiya|Embilipitiya","Kuruwita|Kuruwita","Pelmadulla|Pelmadulla","Ratnapura|Ratnapura"];
		}
		else if(e1.value=="Trincomalee")
		{
			var optionArray=["Trincomalee|Trincomalee","Kinniya|Kinniya"];
		}
		else if(e1.value=="Vavuniya")
		{
			var optionArray=["Vavuniya|Vavuniya"];
		}


		for (var option in optionArray) {
			var pair=optionArray[option].split("|");
			var newoption=document.createElement("option");
			newoption.value=pair[0];
			newoption.innerHTML=pair[1];
			s2.options.add(newoption);
		};
	}
</script>																																				                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               