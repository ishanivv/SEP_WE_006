<div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">		
                    <section class="signup-form sm-margint">
                        <form name="form1" method="post" action="http://localhost/ci/advanced_ctrl/search_advanced">
            		        <div class="regular-signup">
            	           	<h3>Advanced Search</h3>
					        <div class="row">
                            <div class="col-md-6">
        					<label>Vehicle Make</label>
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
                        </div>
                        <div class="row">
                        <div class="col-md-6">
    					<label>Vehicle Model</label>
    						<input type="text" name="model" class="form-control" >
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                        <label>Condition</label>
                            <select name="condition" class="form-control selectpicker">
                                <option>Any</option>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                                <option value="Reconditioned">Reconditioned</option>
                            </select>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                        <label>Price</label>
                             <input type="number" name = "pria" class="form-control" placeholder="from" />
                             <input type="number" name = "prib" class="form-control" placeholder="to" />
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                        <label>Transmission</label>
                            <select name="transmission" class="form-control selectpicker">
                                <option>Any</option>
                                <option value="Automatic">Automatic</option>
                                <option value="Manual">Manual</option>
                                <option value="Other transmission">Other transmission</option>
                            </select>
                        </div>
                        </div>
                         <div class="row">
                        <div class="col-md-6">
                        <label>Model Year</label>
                             <input type="number" name = "year1" Placeholder="from" class="form-control" />
                             <input type="number" name = "year2" Placeholder="to" class="form-control" />
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                        <label>Fuel</label>
                            <select name="fuel" class="form-control selectpicker">
                                <option>Any</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="CNG">CNG</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        </div>
                       
                        <div class="row">
                        <div class="col-md-6">
                        <label>Mileage</label>
                             <input type="number" name = "dis1" Placeholder="from" class="form-control" />
                             <input type="number" name = "dis2" Placeholder="to" class="form-control"/>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                        <label>Engine Capacity (cc)</label>
                             <input type="number" name = "cap1" Placeholder="from" class="form-control"/>
                             <input type="number" name = "cap2" Placeholder="to" class="form-control"/>
                        </div>
                        </div>
    					<div><input type="submit" value="Search" name="search" class="btn btn-primary btn-lg" />
    					</div>
    					</div>
    					</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
					 