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
                        
						<form name="myForm2" method="post" action="<?php echo base_url();?>post_ctrl/insert_into_vehicle">
						<div class="regular-signup">
						<h2>Post your Ad</h2>
						<div style="color:green">
						<?php
							if(isset($message))
                            {
                                echo $message;
                            }
						?>
						</div>
                        <label><h4>Add Photos</h4></label>
                        <div>
						<!--<?php //echo form_open_multipart('post_ctrl/upload') ?>-->
						<input type="file" name="image1" accept="image/*" class="col-md-4">
						<input type="file" name="image2" accept="image/*" class="col-md-4">
						<input type="file" name="image3" accept="image/*" class="col-md-4">
						<!--<input type="submit" name="addphoto" class="btn btn-primary btn-lg" value="Add a photo">-->
						</form>
						</div>
						<div class="spacer-20"></div>
						<h4>Fill the details</h4>
						<p>All field marked with * are required</p>
						<select name="Brand" class="form-control selectpicker">
							<option value="select1">Brand*</option>
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
							<option value="Mitsubishi">Mitsubishi</option>
							<option value="Geely">Geely</option>
							<option value="Toyota">Toyota</option>

					</select>
					<input type="text" name="Model" Placeholder="Model*" class="form-control">
					<input type="text" name="ModelYear" Placeholder="Model Year*" class="form-control">
					<select name="VehicleCondition" class="form-control selectpicker">
						<option value="select2">Condition*</option>
						<option value="New">New</option>
						<option value="Used">Used</option>
						<option value="Reconditioned">Reconditioned</option>
					</select>
					<input type="text" name="Mileage" placeholder="Mileage*" class="form-control">
					<select name="BodyType" class="form-control selectpicker">
						<option value="select3">Body Type*</option>
						<option value="Saloon">Saloon</option>
						<option value="Hatchbatch">Hatchback</option>
						<option value="Station wagen">Station wagon</option>
						<option value="Convertible">Convertible</option>
						<option value="Coupe/Sports">Coupe/Sports</option>
						<option value="SUV / 4x4">SUV / 4x4</option>
						<option value="MPV">MPV</option>
					</select>
					<select name="Transmission" class="form-control selectpicker">
						<option value="select4">Transmission*</option>
						<option value="Manual">Manual</option>
						<option value="Automatic">Automatic</option>
						<option value="Other">Other Transmission</option>
					</select>
					<label class="col-md-4">Fuel Type* </label>
					<input type="radio" name="groupFuel" value="Petrol" /> Petrol
					<input type="radio" name="groupFuel" value="Diesel" />Diesel
					<input type="radio" name="groupFuel" value="CNG" /> CNG
					<input type="radio" name="groupFuel" value="Other" />Other
					<div class="spacer-20"></div>
					<input type="text" name="EngineCapacity" placeholder="Engine capacity (cc)*" class="form-control">
					<div class="spacer-20"></div>
					<input type="text" name="Price" placeholder="Price(Rs.)*" class="col-md-4" />
					<input type="checkbox" name="checkbox5" value="1" class="col-md-1">Negotiable
					<div class="spacer-20"></div>		
					<textarea rows="10" cols="103" name="Description" placeholder="Description*" class="form-control"></textarea>
					<input type="text" name="Phone" placeholder="Phone*" class="form-control">
					<input type="email" name="Email" placeholder="Email*" class="form-control">
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