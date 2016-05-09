<div class="main" role="main">
	<div id="content" class="content full">
		<div class="container">
			<div class="row">
				<div>
				<div class="filters-sidebar" style="float:left">
					<div>
                            <h4 style="background-color:#e96c4c;border-radius:3px;padding:5px;color:#fff">Account Search</h4> 
                    </div>
					<div style="background-color:#ffffff;padding:10px">
					<form name="accountform" method="post" action="http://www.autotraders.ga/dealers_ctrl/load_dealer_view/Commonwealth@gmail.com">
						<div class="accordion-group">
                           	<label style="color:grey">Name</label>
  								<div class="form-group">	
                                    <input type="text" name = "name" class="form-control" />
                                </div>    
                        </div>
                        <div class="accordion-group">
                           	<label style="color:grey">Company Name</label>
  								<div class="form-group">	
                                    <input type="text" name = "companyname" class="form-control" />
                                </div>    
                        </div>
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
                        <button type="submit" name="search" class="btn-primary btn-sm btn"><i class="fa fa-search"></i> Search</button>
					</form>
					</div>
					</div>
				<div>
				<section>
					<?php
						foreach ($users as $user) {
							$email=$user->Email;
							$image=$user->Photo;

					?>
					<article style="float:left;height:220px;width:400px;padding-left:30px">
						<div>
							<div style="float:left;height:150px;margin-right:15px;width:150px">
								<?php
									if(empty($image))
									{
								?>
								<a href="<?php echo 'http://www.autotraders.ga/dealers_ctrl/load_dealer_view/'.$user->Email ?>"><?php echo '<img src="http://www.autotraders.ga/images/logos/default-user.png" style="width:150px; height:150px;"/>';?></a>
								<?php
									}
									else{
								?>
								<a href="<?php echo 'http://www.autotraders.ga/dealers_ctrl/load_dealer_view/'.$user->Email ?>"><?php echo '<img src="http://www.autotraders.ga/images/logos/' . $image . '" style="width:200px; height:150px;"/>';?></a>
								<?php
									}
								?>
							</div>
							<div style="float:left;height:150px;width:150px">
								<?php
									if(isset($this->session->userdata['logged_in']))
									{
								?>
								<div style="padding-top:40px;width:100px">
								<!--<button class="btn-primary" onclick="this.value='Unsubscribe';this.class='btn-primary un'">Subscribe</button></div>-->
								<input type="button" class="btn-primary" onclick="this.value='Unsubscribe';this.class='btn-primary un'" value="Subscribe">
								</div>
								<?php
								}
								else
								{
								?>
								<div style="padding-top:40px;width:100px">
								<!--<button class="btn-primary" disabled="true">Subscribe</button>-->
								<input type="button" class="btn-primary" disabled="true" value="Subscribe">
								</div>
								<?php
								}
								?>
								<div style="position:absolute;padding-top:20px">
									<span>2</span>
									<span>Listings</span>
								</div>
							</div>
						</div>
						<div style="width:200px">
						<ul style="list-style:outside none none">
							<li style="line-height:24px;list-style:outside none none">
								<span><a href=""><?php echo $user->CompanyName?></a></span></li>
							<li style="line-height:24px;list-style:outside none none">
								<span><a href=""><?php echo $user->WebSite?></a></span>

							</li>
						</ul>
						</div>
					</article>
					<?php
					}
					?>
				</section>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
