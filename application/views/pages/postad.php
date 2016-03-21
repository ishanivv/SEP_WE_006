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
        		<div style="color:green">
                        <h4 align="center" style="color:green;background-color:#ffffff"><?php echo $this->session->flashdata('success_msg');?></h4>
                </div>
            	<div class="row">
                    <div class="col-md-8">
                    <section class="signup-form sm-margint">
                        
						<form name="myForm2" method="post" action="<?php echo base_url();?>post_ctrl/insert_into_vehicle">
						<div class="regular-signup">
						<h2>Post your Ad</h2>
						<div style="color:red">
						<?php
                            $CI =& get_instance();
                            $CI->load->library('form_validation');
                            echo validation_errors();
                        ?>
						</div>
	
						<!--<label>District</label>
						<input type="text" name="district" class="form-control" value="<?php //echo $_POST['dis']?>">
						<label>Location</label>
						<input type="text" name="location" class="form-control" value="<?php //echo $_POST['loc']?>">
						<a href="http://localhost/ci/select_location">Change location</a>-->
						<div>
						<select id="dis" name="district" class="form-control" onchange="populate(this.id,'loc')">
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
										<select id="loc" name="location" class="form-control"><option>Select Location</option></select>
						</div>
                        <h4>Add Photos</h4>
                        <div>
						<!--<?php //echo form_open_multipart('post_ctrl/upload') ?>-->
						<input type="file" name="image1" accept="image/*" class="col-md-4">
						<input type="file" name="image2" accept="image/*" class="col-md-4">
						<input type="file" name="image3" accept="image/*" class="col-md-4">
						<!--<input type="submit" name="addphoto" class="btn btn-primary btn-lg" value="Add a photo">-->
						</div>
						<div class="spacer-20"></div>
						<h4>Fill the details</h4>
						<p>All field marked with * are required</p>
						<select name="Brand" class="form-control selectpicker">
							<option value="<?php echo set_value("Brand")?>">Brand*</option>
							<option value="af">Alfa Romeo</option>
							<option value="am">Aston Martin</option>
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
							<option value="Mini">Mini</option>
							<option value="Mitsubishi">Mitsubishi</option>
							<option value="Morris">Morris</option>
							<option value="Moto Guzzi">Moto Guzzi</option>
							<option value="Nissan">Nissan</option>
							<option value="Oldsmobile">Oldsmobile</option>
							<option value="Opel">Opel</option>
							<option value="Perodua">Perodua</option>
							<option value="Peugeot">Peugeot</option>
							<option value="Plymouth">Plymouth</option>
							<option value="Pontiac">Pontiac</option>
							<option value="Porsche">Porsche</option>
							<option value="Proton">Proton</option>
							<option value="Renault">Renault</option>
							<option value="Rover">Rover</option>
							<option value="Royal Enfield">Royal Enfield</option>
							<option value="SAAB">SAAB</option>
							<option value="Scion">Scion</option>
							<option value="SEAT">SEAT</option>
							<option value="Skoda">Skoda</option>
							<option value="Smart">Smart</option>
							<option value="Ssang Yong">Ssang Yong</option>
							<option value="Subaru">Subaru</option>
							<option value="Suzuki">Suzuki</option>
							<option value="Tata">Tata</option>
							<option value="Toyota">Toyota</option>
							<option value="Vauxhall">Vauxhall</option>
							<option value="Volkswagen">Volkswagen</option>
							<option value="Volvo">Volvo</option>
							<option value="Zotye">Zotye</option>
							<option value="Other Brand">Other Brand</option>

					</select>
					<input type="text" name="Model" value="<?php echo set_value("Model");?>" Placeholder="Model*" class="form-control">
					<input type="text" name="ModelYear" value="<?php echo set_value("ModelYear")?>" Placeholder="Model Year*" class="form-control">
					
					<select name="VehicleCondition" class="form-control selectpicker">
						<option value="<?php echo set_value("VehicleCondition")?>">Condition*</option>
						<option value="New">New</option>
						<option value="Used">Used</option>
						<option value="Reconditioned">Reconditioned</option>
					</select>
					<input type="text" name="Mileage" value="<?php echo set_value("Mileage")?>" placeholder="Mileage*" class="form-control">
					<select name="BodyType" class="form-control selectpicker">
						<option value="<?php echo set_value("BodyType")?>">Body Type*</option>
						<option value="Saloon">Saloon</option>
						<option value="Hatchbatch">Hatchback</option>
						<option value="Station wagen">Station wagon</option>
						<option value="Convertible">Convertible</option>
						<option value="Coupe/Sports">Coupe/Sports</option>
						<option value="SUV / 4x4">SUV / 4x4</option>
						<option value="MPV">MPV</option>
					</select>
					<select name="Transmission" class="form-control selectpicker">
						<option value="<?php echo set_value("Transmission")?>">Transmission*</option>
						<option value="Manual">Manual</option>
						<option value="Automatic">Automatic</option>
						<option value="Other">Other Transmission</option>
					</select>
					<label class="col-md-4">Fuel Type* </label>
					<input type="radio" name="groupFuel" value="Petrol" checked='checked' /> Petrol
					<input type="radio" name="groupFuel" value="Diesel" />Diesel
					<input type="radio" name="groupFuel" value="CNG" /> CNG
					<input type="radio" name="groupFuel" value="Other" />Other
					<div class="spacer-20"></div>
					<input type="text" name="EngineCapacity" value="<?php echo set_value("EngineCapacity")?>" placeholder="Engine capacity (cc)*" class="form-control">
					<div class="spacer-20"></div>
					<input type="text" name="Price" value="<?php echo set_value("Price")?>" placeholder="Price(Rs.)*" class="col-md-4" />
					<input id="nego" type="checkbox" name="checkbox5" value="1" class="col-md-1">Negotiable
					<input id="negohidden" type="hidden" name="checkbox5" value="0" class="col-md-1">
					<div class="spacer-20"></div>		
					<textarea rows="10" cols="103" name="Description" value="<?php echo set_value("Description")?>" placeholder="Description*" class="form-control"></textarea>
					<input type="text" name="Phone" value="<?php echo set_value("Phone")?>" placeholder="Phone*" class="form-control">
					<input type="text" name="Email" placeholder="Email*" class="form-control" value="<?php echo $this->session->userdata['logged_in']['email'] ?>">
					<input type="submit" name="postad" class="btn btn-primary btn-lg" value="POST AD">
				</div>
			</form>
		</section>
		</div>
		</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	if(document.getElementById("nego").checked) {
    document.getElementById('negohidden').disabled = true;
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