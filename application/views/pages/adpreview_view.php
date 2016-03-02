<div class="main" role="main" style="background-color:#ffffff">
      <div id="content" class="content full">
          <div class="container">
              <div class="row">
              <div style="width:600px;height:700px;float:left">
              <section class="slider">
              <div id="slider" class="flexslider" data-arrows="yes">
                <ul class="slides">
                  <li>
                  <?php
                    foreach($details as $detail){
                      $vehicleid=$detail->Vehicleid;
                      $nego=$detail->Negotiable;
                      $Negotiable="";
                      if ($nego==1) {
                        $Negotiable='Yes';
                      }
                      else{
                        $Negotiable='No';
                      }
                      $image1=$detail->Image1;
                      echo '<img src="http://localhost/ci/images/'.$image1.'" style="width:100%; height:100%" />';?>
                </li>
                <li>
                  <?php
                      $image2=$detail->Image2;
                      echo '<img src="http://localhost/ci/images/'.$image2.'" style="width:100%; height:100%" />';?>
                </li>    
                <li>
                  <?php
                      $image3=$detail->Image3;
                      echo '<img src="http://localhost/ci/images/'.$image3.'" style="width:100%; height:100%" />';?>
                </li>
                </ul>
              </div>
              <div class="spacer-10"></div>
              <div id="carousel" class="flexslider">
                <ul class="slides">
                  <li>
                  <?php
                      $image1=$detail->Image1;
                      echo '<img src="http://localhost/ci/images/'.$image1.'" style="width:100%; height:100%" />';?>
                </li>
                <li>
                  <?php
                      $image2=$detail->Image2;
                      echo '<img src="http://localhost/ci/images/'.$image2.'" style="width:100%; height:100%" />';?>
                </li>
                <li>
                  <?php
                      $image3=$detail->Image3;
                      echo '<img src="http://localhost/ci/images/'.$image3.'" style="width:100%; height:100%" />';?>     
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
                                    <li class="list-group-item"> <span class="badge">Price</span> <?php echo 'Rs. '.$detail->Price;?></li>
                                    <li class="list-group-item"> <span class="badge">Negotiable</span> <?php echo $Negotiable;?></li>
                                    <li class="list-group-item"> <span class="badge">Description</span> <?php echo $detail->Description;?></li>
                                    <li class="list-group-item"> <span class="badge">Phone</span> <?php echo $detail->Phone;?></li>
                                    <li class="list-group-item"> <span class="badge">E-mail</span> <?php echo $detail->Email;?></li>
                                </ul>
                            </div>
                      </div>
                      </div>
                <?php  }
                ?>

            </div>
          </div>
          <div class="spacer-20"></div>
          <div class="tabs vehicle-details-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"> <a data-toggle="tab" href="#vehicle-overview">Overview</a></li>
                                    <li class="active"> <a data-toggle="tab" href="#vehicle-location">Location</a> </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="vehicle-overview" class="tab-pane fade in active">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                    </div>
                                        <!-- End Toggle --> 
                                    <div id="vehicle-location" class="tab-pane fade in active">
                                        <iframe width="100%" height="300px" frameBorder="0" src="http://a.tiles.mapbox.com/v3/imicreation.map-zkcdvthf.html?secure/colombo"></iframe>
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
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
