<!-- Start Body Content -->
  <div class="page-header parallax" style="background-image:url(http://www.autotraders.ga/images/black_infiniti.jpg); height:300px"></div>	
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
            	<div style="color:red">
                <h4 align="center" style="color:red;background-color:#ffffff"><?php echo $this->session->flashdata('error_msg');?></h4>
            	</div>
            	<div class="col-md-3 search-filters" id="Search-Filters">
                    	<div class="filters-sidebar">
                            <h3>Refine Search</h3>
                            <div style="background-color:#ffffff;padding:10px">
                            <form name="myForm" method="post" action="http://www.autotraders.ga/advanced_ctrl">
                            <div class="accordion" id="toggleArea">
                                <!-- Filter by Make -->
                                <div class="accordion-group">
                                    <label>Make</label>
                                            <select name="make" class="form-control selectpicker">
			        							<option>Any</option>
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
			        						</select>
              						</div>
                                <!-- Filter by Model -->
                                <div class="accordion-group">
                                    <label>Model</label>
                                    <input type="text" name="model" placeholder="Model" class="form-control" > 
                                </div>
                                <!-- Filter by Condition-->
                                <div class="accordion-group">
                                  	<label>Condition</label>
                                        <select name="condition" class="form-control selectpicker">
				                            <option value="Any">Any</option>
				                            <option value="New">New</option>
				                            <option value="Used">Used</option>
				                            <option value="Reconditioned">Reconditioned</option>
				                        </select>
                                </div>
                                <!-- Filter by Body Type -->
                                <div class="accordion-group">
                                    	<label>Body Type</label>
                                            <select name="BodyType" class="form-control selectpicker">
												<option value="Any">Any</option>
												<option value="Saloon">Saloon</option>
												<option value="Hatchbatch">Hatchback</option>
												<option value="Station wagen">Station wagon</option>
												<option value="Convertible">Convertible</option>
												<option value="Coupe/Sports">Coupe/Sports</option>
												<option value="SUV / 4x4">SUV / 4x4</option>
												<option value="MPV">MPV</option>
											</select> 
                                </div>
                                <!-- Filter by Mileage -->
                                <div class="accordion-group">
                                    	<label>Mileage</label>
  										<div class="form-group">
                                            <input type="number" name = "dis1" Placeholder="from" class="form-control" />
                                            <input type="number" name = "dis2" Placeholder="to" class="form-control"/>
                                        </div>
                                </div>
                                <!-- Filter by Transmission -->
                                <div class="accordion-group">
                                    <label>Transmission</label>
                                            <select name="transmission" class="form-control selectpicker">
												<option value="Any">Any</option>
												<option value="Manual">Manual</option>
												<option value="Automatic">Automatic</option>
												<option value="Other">Other Transmission</option>
											</select>    
                                </div>
                                <!-- Filter by model year-->
                                <div class="accordion-group">
                                    <label>Model Year</label>
  									<div class="form-group">
                                        <input type="number" name = "year1" Placeholder="from" class="form-control" />
                         			    <input type="number" name = "year2" Placeholder="to" class="form-control"/>
                                    </div>
                                </div>
                                <!-- Filter by Fuel Economy -->
                                <div class="accordion-group">
                                    	<label>Fuel Type</label>
                                            <select name="fuel" class="form-control selectpicker">
												<option value="Any">Any</option>
												<option value="Petrol">Petrol</option>
												<option value="Diesel">Diesel</option>
												<option value="CNG">CNG</option>
												<option value="Other">Other Transmission</option>
											</select>   
                                </div>
                                <!-- Filter by Engine Capacity -->
                                <div class="accordion-group">
                           						<label>Engine Capacity(cc)</label>
  												<div class="form-group">	
                                                    <input type="number" name = "cap1" Placeholder="from" class="form-control"/>
                             						<input type="number" name = "cap2" Placeholder="to" class="form-control"/>
                                                </div>    
                                </div>
                                <!-- Filter by Price -->
                                <div class="accordion-group">
                           						<label>Price</label>
  												<div class="form-group">	
                                                    <input type="number" name = "pria" class="form-control" placeholder="from" />
                                                    <input type="number" name = "prib" class="form-control" placeholder="to" />
                                                </div>    
                                </div>
                                <!-- Filter by Location -->
                                <div class="accordion-group">
                                    		<label>District</label>
                                            <select id="dis" name="district" class="form-control">
												<option value="Any">Any</option>
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
                                </div>
                                
                            </div>
                            	<button type="submit" name="search" class="btn-primary btn-sm btn"><i class="fa fa-search"></i> Search</button>
                            	<?php
								    if(!(isset($this->session->userdata['logged_in']))) 
								    {
								?>
                               	<button type="submit" name="save" class="btn-primary btn-sm btn" onclick="submitForm2();" disabled="true"><i class="fa fa-folder-o"></i> Save search</button>
                               	<?php
                               		}
                               		else
                               		{
                               	?>
                               		<button type="submit" name="save" class="btn-primary btn-sm btn" onclick="submitForm2();"><i class="fa fa-folder-o"></i> Save search</button>
                               	<?php
                               		}
                               	?>
                               	<!--<a href="http://www.autotraders.ga/advanced_ctrl/savesearch" class="btn-primary btn-sm btn" onclick="return savedsearchconfirm();"><i class="fa fa-folder-o"></i> Save search</a>-->
                               	<!--<a href="http://www.autotraders.ga/advanced_ctrl" class="btn-default btn-sm btn"><i class="fa fa-search"></i> Search</a>-->
                               	<a href="http://www.autotraders.ga/all_ads_ctrl" class="btn-default btn-sm btn"><i class="fa fa-refresh"></i> Reset</a>
                            	
                            </form>
                            <!-- End Toggle -->
                            </div>
                        </div>
                        </div>
                    
            	<div class="col-md-9 results-container">
            	<div id="results-holder" class="results-list-view" style="padding-left:10px;padding-top:40px">
				<div>
				<?php
					$offset=$this->uri->segment(3,0)+1;
					foreach($posts as $post){?>
						<div style="width: 750px;height: 200px;float: right;background-color:#fff;opacity:0.9;border-color:#cc3e19;border-style:solid;margin-bottom:30px">
						<div style="width: 200px;height: 150px;float: left;padding: 20px">
							<?php $image=$post->Image1; 
								  $vehicleid=$post->Vehicleid;
								  $brand=$post->Brand;
								  $model=$post->Model;
								  $modelyear=$post->Modelyear;
							echo '<img src="http://www.autotraders.ga/images/Vehicleimages/' . $image . '" style="width:200px; height:150px;"/>';?>
						</div>
						<div style="width: 540px;height: 200px;float: left;margin:0;padding-left: 10px">
							<div style="width: 540px;height:26px;float:left;background-color:#cc3e19;border-radius:3px;color:#ffffff;top:0;padding-left:5px">
							<?php echo $post->Brand . " " . $post->Model . " " . $post->Modelyear;?>
							</div>
							<div style="width:160px;height:150px;float: left">
							<b><p style="color:#000">BRAND: <?php echo $post->Brand;?></p></b>
							<p style="color:#000"><b>MODEL : </b><?php echo $post->Model;?></p>
							<p style="color:#000"><b>MODEL YEAR : </b><?php echo $post->Modelyear;?></p>
							<p style="color:#000"><b>CONDITION : </b><?php echo $post->VehicleCondition;?></p>
							</div>
							<div style="width:175px;height:150px;float: left">
							<p style="color:#000"><b>MILEAGE : </b><?php echo $post->Mileage;?>KM</p>
							<p style="color:#000"><b>TRANSMISSION: </b><?php echo $post->Transmission;?></p>
							<p style="color:#000"><b>FUEL TYPE: </b><?php echo $post->Fueltype;?></p>
							</div>
							<div style="width:185px;height:150px;float:left;padding:5px">
							<h4 style="width:115px;background-color:#66b2ff;border-radius:3px;color:#fff;padding:5px;font-size:16px"><b>Rs. </b><?php echo $post->Price;?></h4>
							<div style="padding-bottom:10px" id="divCompare" data-id="<?php echo $vehicleid; ?>">
							<button class="btn comp" data-id="<?php echo $vehicleid; ?>"><i class="fa fa-exchange"></i> Add to compare list</button>
							</div>
							<div id="divFav" data-id="<?php echo $vehicleid; ?>">	
								<?php 
								 
							    if(!(isset($this->session->userdata['logged_in']))) 
							    {
							       
								?>
								<a href = "#"><button class="btn" disabled="true"><i class="fa fa-heart-o"></i> Add to Favourites</button></a>
								<?php
								}
								else{
									//$email = $this->session->userdata['logged_in']['email']; 
								?>

								<button class="btn fav" data-id="<?php echo $vehicleid; ?>"><i class="fa fa-heart-o"></i> Add to Favourites</button>
								<?php
								}?>
							</div>
							<div class="spacer-10"></div>
							<a href="<?php echo 'http://www.autotraders.ga/adpreview_ctrl/getad_preview/'.$vehicleid?>"><input type="button" value="View" class="btn-primary"></a>
							</div>
						</div>
						</div>
						<?php }?>
							<div style="padding-left:35px;padding-top:10px"><?php echo $page_links; ?></div>
						</div>	
				
				</div>
				</div>

				</div>
				
				</div>
				
			</div>
		</div>
	

	<script>
	
	function submitForm2()
    {
    	job=confirm("Are you sure you want to save this search criterias?");
        if (job!=true) {
          return false;
        }
        document.forms['myForm'].action = 'http://www.autotraders.ga/advanced_ctrl/savesearch';
        document.forms['myForm'].submit();
    }    

    function savedsearchconfirm()
    {
        job=confirm("Are you sure you want to save this search result?");
        if (job!=true) {
          return false;
        }
    }

    var farr=[];
	$(".fav").click(function() {
		//document.getElementById('preloader').style.visibility="visible";
		var vehicleID = $(this).attr("data-id");
		//alert(vehicleID);
		if ($.cookie('vehicleList')) {
            farr=JSON.parse(getCookie("favList"));
        }

        farr.push(vehicleID);
        var json_str = JSON.stringify(farr);
        setCookie("favList", json_str, 60);
		//document.getElementById('preloader').style.visibility="hidden";

		var item = $('button.fav[data-id="' + vehicleID + '"]').remove();

                    $('div#divFav[data-id="' + vehicleID + '"]').html('<button class="btn favremove" data-id="' + vehicleID + '"><i class="fa fa-remove"></i> Remove from favourites</button>');
		/*var url="insertFavourite";
        var data = new FormData();
        data.append('vehicleID', vehicleID);
        //$(".fav").text('Remove from favourites');
        $.ajax({
            url: url,
            type:"post",
            data: data,
            dataType:"JSON",
            processData: false,
            contentType: false,
              success: function (text) {
                console.log("Success");
                
                var json = JSON.stringify(text), obj = JSON.parse(json);

              }, 
              error: function(text) {
                  if (data.status === 422) {
                    alert("Something went wrong. Please try again!");
                  } else {
                    document.getElementById('preloader').style.visibility="hidden";
                	    
                  }
              }
            });*/
	});

	$(document).ready(function() {
		cmpAdd();
		cmpRemove();

		var array=[];
		if ($.cookie('vehicleList')) {
			array=JSON.parse(getCookie("vehicleList"));
		}
								
		for (var i = 0; i < array.length; i++) {
			var vehicleId=array[i];

				var item = $('button.comp[data-id="' + vehicleId + '"]');
				item.attr('class', 'btn cmpremove');
				item.html('<i class="fa fa-remove"></i> Remove from compare list');

				console.log(vehicleId);
	    }

	});

    </script>