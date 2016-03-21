<?php
    if(!(isset($this->session->userdata['logged_in']))) 
    {
        redirect("http://localhost/ci/Login");
    }
?>
<div class="main" role="main">
	<div style="background-image:url(http://localhost/ci/images/gallerybg.jpg);background-repeat:no-repeat;
                background-size:100% 100%;
                background-attachment:fixed">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-6">
						<section class="signup-form sm-margint">
							<form method="post" action="http://localhost/ci/postad">
								<div class="regular-signup">
                        			<h3>Select district and location</h3>
										<select id="dis" name="dis" class="form-control" onchange="populate(this.id,'loc')">
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
										<select id="loc" name="loc" class="form-control"><option>Select Location</option></select>
										<input type="submit" class="btn btn-primary btn-block" value="Continue">
								</div>
							</form>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
						</div>
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