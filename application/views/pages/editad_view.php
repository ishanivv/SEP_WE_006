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
							

					<label><h4>Edit Photos</h4></label>  
					 <div>  		
					<!-- <?php //echo form_open_multipart('post_ctrl/upload') ?>  --> 
					<!-- <form action="" method="post" enctype="multipart/form-data"> -->
													
					<ul><input type="file" name="image1" accept="image/*" class="col-md-4" value="<?php echo $post->Image1 ?>"></ul>
					<ul><input type="file" name="image2" accept="image/*"class="col-md-4" value="<?php echo $post->Image2 ?>"></ul> 
			   		<ul><input type="file" name="image3" accept="image/*" class="col-md-4" value="<?php echo $post->Image3 ?>"></ul>
					<!-- <input type="submit" name="addphoto" class="btn btn-primary btn-lg" value="Add a photo">  -->
						
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