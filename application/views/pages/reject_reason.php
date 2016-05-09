<!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-11">
                    	<section class="signup-form sm-margint">
                        <?php    foreach($posts as $post){?>
                          <form method="post" action="<?php echo 'http://www.autotraders.ga/approve_ctrl/reject/'.$post->Vehicleid.'/'.$post->Email?>" >
                            	<!-- Regular Signup -->
                                <div class="regular-signup">
                        			<h3>Reason for rejecting</h3>
                                <div style="width: 930px;height: 200px;float: left;background-color:#fff;opacity:0.9;border-color:#cc3e19;border-style:solid;margin-bottom:30px">
                                <div style="width: 200px;height: 150px;float: left;padding: 20px">
                                    <?php $image=$post->Image1; 
                                          $vehicleid=$post->Vehicleid;
                                    echo '<img src="http://www.autotraders.ga/images/Vehicleimages/' . $image . '" style="width:200px; height:150px;"/>';?>
                                </div>
                                <div style="width: 700px;height: 200px;float: left;margin:0;padding-left: 10px">
                                    <div style="width: 703px;height:26px;float:left;background-color:#cc3e19;border-radius:3px;color:#ffffff;top:0;padding-left:5px">
                                    <?php echo $post->Brand . " " . $post->Model . " " . $post->Modelyear;?>
                                    </div>
                                    <div style="width:200px;height:150px;float: left">
                                    <b><p style="color:#000">BRAND: <?php echo $post->Brand;?></p></b>
                                    <p style="color:#000"><b>MODEL : </b><?php echo $post->Model;?></p>
                                    <p style="color:#000"><b>MODEL YEAR : </b><?php echo $post->Modelyear;?></p>
                                    <p style="color:#000"><b>CONDITION : </b><?php echo $post->VehicleCondition;?></p>
                                    </div>
                                    <div style="width:200px;height:150px;float: left">
                                    <p style="color:#000"><b>MILEAGE : </b><?php echo $post->Mileage;?>KM</p>
                                    <p style="color:#000"><b>TRANSMISSION: </b><?php echo $post->Transmission;?></p>
                                    <p style="color:#000"><b>FUEL TYPE: </b><?php echo $post->Fueltype;?></p>
                                    </div>
                                    <div style="width:200px;height:150px;float:left;padding:5px">
                                    <h4 style="width:105px;background-color:#66b2ff;border-radius:3px;color:#fff;padding:5px;font-size:16px"><b>Rs. </b><?php echo $post->Price;?></h4>
                                    <a href="<?php echo 'http://www.autotraders.ga/adpreview_ctrl/getad_preview/'.$vehicleid?>"><input type="button" value="View" class="btn-primary"></a>
                                    </div>
                                </div>
                                </div>  
                                    <div>
                                    <label>To</label>
                                    <input type="text" class="form-control" value="<?php echo $post->Email;?>" name="email" disabled>
                                    <label>Reason</label>
                                    <textarea rows="10" cols="55" name="reason" placeholder="Type your Message" class="form-control"></textarea>
                                    <div class="spacer-20"></div>
                                    <input type="submit" class="btn btn-primary btn-lg" value="Send Reject Email">

                                    <?php }?>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->