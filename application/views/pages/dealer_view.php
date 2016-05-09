<div class="main" role="main">
	<div id="content" class="content full">
		<div class="container">
			<div class="row">
				<div class="filters-sidebar" style="float:left">
					<?php
						foreach ($users as $user) {
						 	$companyname=$user->CompanyName;
						 	$website=$user->WebSite;
						 	$phone=$user->Phone;
						 	$city=$user->City;
						 	$address=$user->Address;
						 	$name=$user->Name;
						 	$image=$user->Photo;
						 } 
					?>
					<div>
                        <h4 style="background-color:#e96c4c;border-radius:3px;padding:5px;color:#fff"><?php echo $name;?></h4> 
                    </div>
                    <div style="background-color:#ffffff;padding:10px">
					<div>
						<?php
									if(empty($image))
									{
								?>
								<?php echo '<img src="http://www.autotraders.ga/images/logos/default-user.png" style="width:150px; height:150px;"/>';?>
								<?php
									}
									else{
								?>
								<?php echo '<img src="http://www.autotraders.ga/images/logos/' . $image . '" style="width:200px; height:150px;"/>';?>
								<?php
									}
								?>
					</div>
					<div>
						<p style="color:#000">Company Name: <?php echo $companyname;?></p>
						<p style="color:#000">Web Site: <?php echo $website;?></p>
						<p style="color:#000">Phone: <?php echo $phone;?></p>
					</div>
					</div>
					<div>
                        <h4 style="background-color:#e96c4c;border-radius:3px;padding:5px;color:#fff">Dealer Location</h4> 
                    </div>
                    <div>
                    	<p style="color:#000">City: <?php echo $city;?></p>
                    	<p style="color:#000">Address: <?php echo $address;?></p>
                    	<iframe width="100%" height="300px" frameBorder="0" src="<?php echo 'http://www.autotraders.ga/dealers_ctrl/get_map/'.$city?>"></iframe>
                    </div>
				</div>
				<div>
					<div class="col-md-8.5 results-container">
            	<div id="results-holder" class="results-list-view" style="padding-left:10px;padding-top:40px">
				<div>
				<?php
					if(empty($posts))
					{
				?>	
					<div style="color:#999">
            		<h3 align="center" style="color:#999;background-color:#ffffff"><?php echo "No ads are available for this dealer";?></h3>
            		</div>
				<?php	}
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
							<div>	
								<?php 
								 
							    if(!(isset($this->session->userdata['logged_in']))) 
							    {
							       
								?>
								<a href = "#"><button class="btn" disabled="true"><i class="fa fa-star-o"></i> Add to Favourites</button></a>
								<?php
								}
								else{
									//$email = $this->session->userdata['logged_in']['email']; 
								?>

								<button class="btn fav" data-id="<?php echo $vehicleid; ?>"><i class="fa fa-star-o"></i> Add to Favourites</button>
								<?php
								}?>
							</div>
							<div class="spacer-10"></div>
							<a href="<?php echo 'http://www.autotraders.ga/adpreview_ctrl/getad_preview/'.$vehicleid?>"><input type="button" value="View" class="btn-primary"></a>
							</div>
						</div>
						</div>
						<?php }?>
							<!--<div style="padding-left:35px;padding-top:10px"><?php //echo $page_links; ?></div>-->
						</div>	
				
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
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