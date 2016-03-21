<div class="main" role="main" style="background-color:#ffffff">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
            	<div style="width:600px;height:700px;float:left">
					<section class="slider">
        			<div id="slider" class="flexslider">
        			  <ul class="slides">
            			<li>
                  <?php
                    foreach($details as $detail){
                      $nego=$detail->Negotiable;
                      $Negotiable="";
                      if ($nego==1) {
                        $Negotiable='Yes';
                      }
                      else{
                        $Negotiable='No';
                      }
                      $vehicleid=$detail->Vehicleid;
                      $email=$detail->Email;
                      $image1=$detail->Image1;
  	    	    		    echo '<img src="http://localhost/ci/images/Vehicleimages/'.$image1.'" style="width:100%; height:100%" />';?>
  	    				</li>
  	    				<li>
                  <?php
  	    	    		    $image2=$detail->Image2;
                      echo '<img src="http://localhost/ci/images/Vehicleimages/'.$image2.'" style="width:100%; height:100%" />';?>
  	    				</li> 
                <li>
                  <?php
                      $image3=$detail->Image3;
                      echo '<img src="http://localhost/ci/images/Vehicleimages/'.$image3.'" style="width:100%; height:100%" />';?>
                </li>   
        			  </ul>
        			</div>
              <div class="spacer-10"></div>
        			<div id="carousel" class="flexslider">
        			  <ul class="slides">
            			<li>
                  <?php
  	    	    		    $image1=$detail->Image1;
                      echo '<img src="http://localhost/ci/images/Vehicleimages/'.$image1.'" style="width:100%; height:100%" />';?>
  	    				</li>
  	    				<li>
  	    	    		<?php
                      $image2=$detail->Image2;
                      echo '<img src="http://localhost/ci/images/Vehicleimages/'.$image2.'" style="width:100%; height:100%" />';?>
  	    				</li>
  	    				<li>
                  <?php
                      $image3=$detail->Image3;
                      echo '<img src="http://localhost/ci/images/Vehicleimages/'.$image3.'" style="width:100%; height:100%" />';?>     
                </li>
       				   </ul>
        			</div>
      				</section>
      			</div>
      			<div style="width:400px;height:700px;float:left;padding-left:20px">
            <div>
      				<h4 style="background-color:#e96c4c;border-radius:3px;padding:5px;color:#fff"><?php echo $detail->Brand . " " . $detail->Model . " " . $detail->Modelyear;?></h4> 
             </div> 
              <div class="row">
                    <div class="col-md-12">
                            <div class="sidebar-widget widget">
                                <ul class="list-group">
                                    <li class="list-group-item"> <span class="badge">Year</span> <?php echo $detail->Modelyear;?></li>
                                    <li class="list-group-item"> <span class="badge">Make</span> <?php echo $detail->Brand;?></li>
                                    <li class="list-group-item"> <span class="badge">Model</span> <?php echo $detail->Model;?></li>
                                    <li class="list-group-item"> <span class="badge">Body type</span> <?php echo $detail->BodyType;?></li>
                                    <li class="list-group-item"> <span class="badge">Mileage</span> <?php echo $detail->Mileage.'KM';?></li>
                                    <li class="list-group-item"> <span class="badge">Transmission</span> <?php echo $detail->Transmission;?></li>
                                    <li class="list-group-item"> <span class="badge">Condition</span> <?php echo $detail->VehicleCondition;?></li>
                                    <li class="list-group-item"> <span class="badge">Fuel Type</span> <?php echo $detail->Fueltype;?></li>
                                    <li class="list-group-item"> <span class="badge">Engine Capacity</span> <?php echo $detail->EngineCapacity.'cc';?></li>
                                    <li class="list-group-item"> <span class="badge">Negotiable</span> <?php echo $Negotiable;?></li>
                                    <li class="list-group-item"> <span class="badge">E-mail</span> <?php echo $detail->Email;?></li>
                                </ul>
                            </div>
                            <div class="btn btn-info price"><?php echo 'Rs. '.$detail->Price;?></div>
                              <div class="vehicle-enquiry-foot">
                                    <span class="vehicle-enquiry-foot-ico"><i class="fa fa-phone"></i></span>
                                    <strong><?php echo $detail->Phone;?></strong>Seller's Phone Number
                              </div>
                      </div>
                      </div>
                      <div class="spacer-10"></div>
                      <div>
                        <a href="<?php echo 'http://localhost/ci/approve_ctrl/approve/'.$vehicleid.'/'.$email?>"><input type="button" value="Approve" class="btn-primary" onclick="return approveconfirm();"></a>
                        <a href="<?php echo 'approve_ctrl/reject/'.$vehicleid.'/'.$email?>"><input type="button" value="Reject" class="btn-primary" onclick="return rejectconfirm();"></a>
                      </div>
      			</div>
      		</div>
          <div class="spacer-20"></div>
          <div class="tabs vehicle-details-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"> <a data-toggle="tab" href="#vehicle-overview">Description and location</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="vehicle-overview" class="tab-pane fade in active">
                                        <p><?php echo $detail->Description;; ?></p>
                                        <?php
                                          $location=$detail->Location;
                                          $district=$detail->District;
                                        ?>
                                        <iframe width="100%" height="300px" frameBorder="0" src="<?php echo 'http://localhost/ci/adpreview_ctrl/get_map/'.$district.'/'.$location?>"></iframe>
                                    
                                    <?php }
                                    ?>
                                    </div>
                                </div>
          </div>
      	</div>
      </div>
     </div>






<script src="http://localhost/ci/js/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="http://localhost/ci/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: true,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: true,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

  <script type="text/javascript">
    function approveconfirm()
    {
        job=confirm("Are you sure you want to approve this advertisement?");
        if (job!=true) {
          return false;
        }
    }

    function rejectconfirm()
    {
        job=confirm("Are you sure you want to reject this advertisement?");
        if (job!=true) {
          return false;
        }
    }
</script>