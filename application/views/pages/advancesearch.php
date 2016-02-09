
    	

                  
            	
            		<form name="form1" method="post" action="http://localhost/ci/advanced_ctrl/search_advanced">
            		<div class="regular-signup">
            		<h3>Advanced Search</h3>
                    <div class="row">
                    <div class="col-md-6">
					<label>Vehicle Type</label>
				        <select name="category" class="form-control selectpicker">
							<option>Any</option>
							<option value="Car">Car</option>
							<option value="Van">Van</option>
							<option value="Bus">Bus</option>
						</select>
                    </div>
                    </div>
					<div class="row">
                    <div class="col-md-6">
					<label>Vehicle Make</label>
						<select name="make" class="form-control selectpicker">
							<option>Any</option>
							<option value="Toyota">Toyota</option>
							<option value="Honda">Honda</option>
							<option value="Nissan">Nissan</option>
							<option value="Mitsubishi">Mitsubishi</option>
							<option value="Mazda">Mazda</option>
							<option value="Suzuki">Suzuki</option>
							<option value="Daihatsu">Daihatsu</option>
							<option value="Subaru">Subaru</option>
							<option value="Isuzu">Isuzu</option>
							<option value="BMW">BMW</option>
							<option value="Marcedes">Marcedes</option>
							<option value="Others">Others</option>
						</select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
					<label>Vehicle Model</label>
						<select name="ttype" class="form-control selectpicker">
							<option>Any</option>
							<option value="Aqua">Aqua</option>
                            <option value="Allion">Allion</option>
                            <option value="Axio">Axio</option>
							<option value="Corolla">Corolla</option>
						</select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <label>Condition</label>
                        <select name="condition" class="form-control selectpicker">
                            <option>Any</option>
                            <option value="Registered">Registered</option>
                            <option value="Unregistered">Unregistered</option>
                            <option value="Brand New">Brand New</option>
                        </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <label>Price</label>
                         <input type="text" name = "pria"/>
                         <input type="text" name = "prib"/>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                    <label>Transmission</label>
                        <select name="transmission" class="form-control selectpicker">
                            <option>Any</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>
                    </div>
                     <div class="row">
                    <div class="col-md-6">
                    <label>Model Year</label>
                         <input type="text" name = "year1" Placeholder="from"/>
                         <input type="text" name = "year2" Placeholder="to"/>
                    </div>
                    </div>




                    <div class="row">
                    <div class="col-md-6">
                    <label>Fuel</label>
                        <select name="fuel" class="form-control selectpicker">
                            <option>Any</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Hybrid">Hybrid</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    </div>
                   
                    <div class="row">
                    <div class="col-md-6">
                    <label>Mileage</label>
                         <input type="text" name = "dis1" Placeholder="from"/>
                         <input type="text" name = "dis2" Placeholder="to"/>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <label>Engine Capacity (cc)</label>
                         <input type="text" name = "cap1" Placeholder="from"/>
                         <input type="text" name = "cap2" Placeholder="to"/>
                    </div>
                    </div>



					<div><input type="submit" value="Search" name="search" class="btn btn-primary btn-lg" />
					</div>
					</div>
					</form>
					
     b  