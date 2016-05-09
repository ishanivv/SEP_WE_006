<div class="main" role="main" style="background-color:#ffffff">
      <div id="content" class="content full">
          <div class="container">
            <article class="single-vehicle-details">
              <div style="color:green">
                <h4 align="center" style="color:green;background-color:#ffffff"><?php echo $this->session->flashdata('success_msg');?></h4>
              </div>
              <div class="single-listing-actions">
                        <?php
                        foreach($details as $detail){
                          $vehicleid=$detail->Vehicleid;
                          $price=$detail->Price;
                          $email=$detail->Email;
                        }
                        ?>
                        <div class="btn-group pull-right" role="group">
                          <?php if(isset($this->session->userdata['logged_in']['email'])) {?>
                            <a href="<?php echo 'http://www.autotraders.ga/businessRateCtrl/loadReviewPage'.'/'.$vehicleid?>"><button class="btn btn-default"><i class="fa fa-star-o"></i> <span>Rate this ad</span></button></a>
                           <?php }?> 
                            <!--<button class="btn btn-default fav" data-id="<?php echo $vehicleid?>"><i class="fa fa-heart-o"></i> <span>Add to favourites</span></button>
                            <button class="btn btn-default comp" data-id="<?php echo $vehicleid?>"><i class="fa fa-exchange"></i> <span>Add to compare list</span></button>-->
                            <a href="<?php echo 'http://www.autotraders.ga/moreinfo_ctrl/get_sellers_email/'.$vehicleid.'/'.$email;?>"><button class="btn btn-default"><i class="fa fa-info"></i> <span>Request more info</span></button></a>
                            <?php if(isset($this->session->userdata['logged_in']['email'])) {?>
                            <a href="<?php echo 'http://www.autotraders.ga/makeAnOfferCtrl/sendSellerEmailToView/'.$email . '/'.$vehicleid;?>"><button class="btn btn-default"><i class="fa fa-dollar"></i> <span>Make an offer</span></button></a>
                            <?php }?>
                            <a href="<?php echo 'http://www.autotraders.ga/Reporting/startReport/'.$vehicleid;?>"><button class="btn btn-default"><i class="fa fa-ban"></i> <span>Report Ad</span></button></a>
                            <a href="<?php echo 'http://www.autotraders.ga/adpreview_ctrl/printPage/'.$vehicleid;?>"><button class="btn btn-default"><i class="fa fa-print"></i> <span>Print</span></button></a>
                        </div>
                        <div class="btn btn-info price">Rs. <?php echo $price;?></div>
                    </div>
              <div class="row">
              <div class="col-md-7">
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
                      echo '<img src="http://www.autotraders.ga/images/Vehicleimages/'.$image1.'" style="width:100%; height:100%" />';?>
                </li>
                <li>
                  <?php
                      $image2=$detail->Image2;
                      echo '<img src="http://www.autotraders.ga/images/Vehicleimages/'.$image2.'" style="width:100%; height:100%" />';?>
                </li>    
                <li>
                  <?php
                      $image3=$detail->Image3;
                      echo '<img src="http://www.autotraders.ga/images/Vehicleimages/'.$image3.'" style="width:100%; height:100%" />';?>
                </li>
                </ul>
              </div>
              <div class="spacer-10"></div>
              <div id="carousel" class="flexslider">
                <ul class="slides">
                  <li>
                  <?php
                      $image1=$detail->Image1;
                      echo '<img src="http://www.autotraders.ga/images/Vehicleimages/'.$image1.'" style="width:100%; height:100%" />';?>
                </li>
                <li>
                  <?php
                      $image2=$detail->Image2;
                      echo '<img src="http://www.autotraders.ga/images/Vehicleimages/'.$image2.'" style="width:100%; height:100%" />';?>
                </li>
                <li>
                  <?php
                      $image3=$detail->Image3;
                      echo '<img src="http://www.autotraders.ga/images/Vehicleimages/'.$image3.'" style="width:100%; height:100%" />';?>     
                </li>
                 </ul>
              </div>
              </section>
            </div>
            <?php 
                $a5 = 5*$fivestar;
                $a4 = 4*$fourstar;
                $a3 = 3*$threestar;
                $a2 = 2*$twostar;
                $a1 = 1*$onestar;?>
              <div class="rating" style="width:194px;float:left;padding-left:15px">
               

               <?php 
              {
                    if($a5!=0 || $a4!=0 || $a3!=0 || $a2!=0 || $a1!=0 ){
                  
                    $avg_rating=($a1+$a2+$a3+$a4+$a5)/($fivestar+$fourstar+$threestar+$twostar+$onestar);
                    $avg_rating=round($avg_rating,1);

                    $whole = (int) $avg_rating;         
                    $frac  = $avg_rating - (int) $avg_rating; 

 
  

    

   
          if($frac==0.0){
                  for($i=1;$i<=$whole;$i++){
    

                          print '<div class="rating-nogo">&bigstar;</div>';
                  }

                if($whole==4){
                          print '<div class="emptystar">&bigstar;</div>';
                  }
                elseif($whole==3){
                          for($i=1;$i<=2;$i++)
                          {
                           print '<div class="emptystar">&bigstar;</div>';
                          }
                }
                elseif($whole==2){
                          for($i=1;$i<=3;$i++)
                          {
                            print '<div class="emptystar">&bigstar;</div>';
                          }
                }
                elseif($whole==1){
                          for($i=1;$i<=4;$i++)
                          {
                             print '<div class="emptystar">&bigstar;</div>';
                          }
                }



          }


          elseif($frac!=0.0){
  

                for($i=1;$i<=$whole;$i++){
  
                        print '<div class="rating-nogo" >&bigstar;</div>';


                }
                if($whole==4){
                      print '<div class="rating-nogo" ><span class="half">&bigstar;</span>';
                      print  '<span class="other half">&star;</span></div>';
                }

                elseif($whole==3){
                      print '<div class="rating-nogo" ><span class="half">&bigstar;</span>';
                      print  '<span class="other half">&star;</span></div>';
                      print '<div class="emptystar">&bigstar;</div>';
                }
                elseif($whole==2){
                      print '<div class="rating-nogo" ><span class="half">&bigstar;</span>';
                      print  '<span class="other half">&star;</span></div>';
                      print '<div class="emptystar">&bigstar;</div>';
                      print '<div class="emptystar">&bigstar;</div>';
                }
                elseif($whole==1){
                      print '<div class="rating-nogo" ><span class="half">&bigstar;</span>';
                      print  '<span class="other half">&star;</span></div>';
                      print '<div class="emptystar">&bigstar;</div>';
                      print '<div class="emptystar">&bigstar;</div>';
                      print '<div class="emptystar">&bigstar;</div>';

                }

        }
            }else if($a5==0 && $a4==0 && $a3==0 && $a2==0 && $a1==0 ){
                            for($i=1;$i<=5;$i++){
                                  print '<div class="emptystar">&bigstar;</div>';
                            }
              

            }?>

             
             <?php }

            ?>




</div>
            </div>
            <!--<div style="width:400px;height:700px;float:left;padding-left:30px;padding-right:15px">
            <div>
              <h4 style="background-color:#e96c4c;border-radius:3px;padding:5px;color:#fff"><?php echo $detail->Brand . " " . $detail->Model . " " . $detail->Modelyear;?></h4> 
             </div>-->
                <!--<div class="row">-->
                    <div class="col-md-5" style="height:700px;float:right">
                          <div>
                            <h4 style="background-color:#e96c4c;border-radius:3px;padding:5px;color:#fff"><?php echo $detail->Brand . " " . $detail->Model . " " . $detail->Modelyear;?></h4> 
                          </div>
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
                            <!--<div class="btn btn-info price"><?php //echo 'Rs. '.$detail->Price;?></div>-->
                              <div class="vehicle-enquiry-foot">
                                    <span class="vehicle-enquiry-foot-ico"><i class="fa fa-phone"></i></span>
                                    <strong><?php echo $detail->Phone;?></strong>Seller's Phone Number
                              </div>
                      </div>
                  <!--</div>-->
          <!--  </div>-->
          </div>
          <div class="spacer-20"></div>
          <div class="row">
            <div style="padding-left:15px;padding-right:15px">
              <div class="tabs vehicle-details-tabs">
                  <ul class="nav nav-tabs">
                      <li class="active"> <a href="#overview" aria-controls="overview" role="tab">Description and location</a></li>
                                    <!--<li> <a href="#location" aria-controls="location" role="tab">Location</a> </li>-->
                  </ul>
                  <div class="tab-content">
                      <div id="overview" class="tab-pane fade in active">
                          <p><?php echo $detail->Description; ?></p>
                                    <!--</div>
                                    <div id="location" class="tab-pane fade"> -->
                          <?php
                              $location=$detail->Location;
                              $district=$detail->District;
                          ?>
                          <iframe width="100%" height="300px" frameBorder="0" src="<?php echo 'http://www.autotraders.ga/adpreview_ctrl/get_map/'.$district.'/'.$location?>"></iframe>
                                    
                          <?php }
                          ?>
                      </div>
                  </div>
                  <div class="spacer-20"></div>
                  <div>
                            <h2>Advertisement Reviews</h2>
<div class="spacer-20"></div>
<div class="spacer-20"></div>

<?php 

// show number of reviews
if(empty($noOfReviews))
{?>
  <h3>No any reviews has posted yet for this advertisement!</h3>.
<?php }

elseif(!empty($noOfReviews)){
?>

<div style="width: 1200px;height: 200px;float: right;">
  <div style="width: 600px;height: 50px;float:left;margin:0;padding-left: 150px;padding-top:23px;">
    

    <?php 
      $a5 = 5*$fivestar;
      $a4 = 4*$fourstar;
      $a3 = 3*$threestar;
      $a2 = 2*$twostar;
      $a1 = 1*$onestar;



    

      $avg_rating=($a1+$a2+$a3+$a4+$a5)/($fivestar+$fourstar+$threestar+$twostar+$onestar);
      $avg_rating=round($avg_rating,1);

      $whole = (int) $avg_rating;         
    $frac  = $avg_rating - (int) $avg_rating; 

      if($frac==0.0){
      echo '<span style="font-size: 60pt"> '.'&nbsp'.$avg_rating.'.0'.'</span>';
    }
    elseif($frac!=0.0){
      echo '<span style="font-size: 60pt"> '.'&nbsp'.$avg_rating.'</span>';
    }
    ?>
    <br>
<div style="width: 600px;height: 50px;float:left;margin:0;padding-left: 20px;padding-top:2px;">

<?php if($frac==0.0){
  for($i=1;$i<=$whole;$i++){
    

   print '<div class="rating-nogo">&bigstar;</div>';
}

  if($whole==4){
print '<div class="emptystar">&bigstar;</div>';
}
elseif($whole==3){
  for($i=1;$i<=2;$i++)
  {
  print '<div class="emptystar">&bigstar;</div>';
  }
}
elseif($whole==2){
for($i=1;$i<=3;$i++)
  {
  print '<div class="emptystar">&bigstar;</div>';
  }
}
elseif($whole==1){
for($i=1;$i<=4;$i++)
  {
  print '<div class="emptystar">&bigstar;</div>';
  }
}



}


elseif($frac!=0.0){
  

for($i=1;$i<=$whole;$i++){
  
print '<div class="rating-nogo" >&bigstar;</div>';



}
if($whole==4){
print '<div class="rating-nogo" ><span class="half">&bigstar;</span>';
print  '<span class="other half">&star;</span></div>';
}
elseif($whole==3){
print '<div class="rating-nogo" ><span class="half">&bigstar;</span>';
print  '<span class="other half">&star;</span>
</div>';
print '<div class="emptystar">&bigstar;</div>';
}
elseif($whole==2){
print '<div class="rating-nogo" ><span class="half">&bigstar;</span>';
print  '<span class="other half">&star;</span>
</div>';
print '<div class="emptystar">&bigstar;</div>';
print '<div class="emptystar">&bigstar;</div>';
}
elseif($whole==1){
print '<div class="rating-nogo" ><span class="half">&bigstar;</span>';
print  '<span class="other half">&star;</span>
</div>';
print '<div class="emptystar">&bigstar;</div>';
print '<div class="emptystar">&bigstar;</div>';
print '<div class="emptystar">&bigstar;</div>';

}

}?>
</div>

    
      
    <div style="width: 600px;height: 50px;float:left;margin:0;padding-left: 35px;padding-top:1px;">
      <?php echo '<span style="font-size: 13pt"> '.'&nbsp'.$noOfReviews.'  Ratings' ?>
    </div>
  </div>  
  <div style="width: 600px;height: 150px;float: right;margin:0;padding-right: 10px">
                  
  <?php  

  for($i=1;$i<=5;$i++){
  print '<span style="font-size: 20px;" class = "reviewSpan">&bigstar;</span>';
}

echo '<span style="font-size: 13pt"> '.'&nbsp'. $fivestar.'</span>';

?>

<br>
<?php  

  for($i=1;$i<=4;$i++){
  print '<span style="font-size: 20px;" class = "reviewSpan">&bigstar;</span>';
}
  print '<span style="font-size: 20px;">&bigstar;</span>';
  
  echo '<span style="font-size: 13pt"> '.'&nbsp'. $fourstar.'</span>';
?>  
  
<br>
<?php  

  for($i=1;$i<=3;$i++){
  print '<span style="font-size: 20px;" class = "reviewSpan">&bigstar;</span>';
}
  for($i=1;$i<=2;$i++){
  print '<span style="font-size: 20px;">&bigstar;</span>';
}

echo '<span style="font-size: 13pt"> '.'&nbsp'. $threestar.'</span>';
?>  
<br>
<?php  

  for($i=1;$i<=2;$i++){
  print '<span style="font-size: 20px;" class = "reviewSpan">&bigstar;</span>';
}
  for($i=1;$i<=3;$i++){
  print '<span style="font-size: 20px;">&bigstar;</span>';
}

echo '<span style="font-size: 13pt"> '.'&nbsp'. $twostar.'</span>';
?>

<br>
<?php  

  for($i=1;$i<=1;$i++){
  print '<span style="font-size: 20px;" class = "reviewSpan">&bigstar;</span>';
}
  for($i=1;$i<=4;$i++){
  print '<span style="font-size: 20px;">&bigstar;</span>';
}

echo '<span style="font-size: 13pt"> '.'&nbsp'. $onestar.'</span>';
?>


  
  </div>
</div>  


<hr>
<?php 

$print_reviewamount=$noOfReviews-$noOfNullRatings;
// show number of reviews
echo '<span style="font-size: 20pt">'.$print_reviewamount  .' Reviews'.'</span>';?>

<div class="spacer-20"></div>
<div class="spacer-20"></div>

<?php foreach($bdetails as $review){
  $Breview=$review->rating;
  
?>

                
<div style="width: 1000px;height: 200px;float: left;">
            <div style="width: 400px;height: 100px;float:left;">
            <?php if( (!empty($review->title)) || (!empty($review->review)) ){?>
              <?php for ($i = 1;$i<=$Breview;$i++) {
                   
                   print '<span style="font-size: 40px;"class = "reviewSpan" >&bigstar;</span>';

              }?>
              <?php if($Breview==4){
                print '<span style="font-size: 40px;">&bigstar;</span>';
              } 

                elseif($Breview==3){
                for ($i = 1;$i<=2;$i++) {
                   
                print '<span style="font-size: 40px;">&bigstar;</span>';
                    } 
                  }

                elseif($Breview==2){
                for ($i = 1;$i<=3;$i++) {
                   
                print '<span style="font-size: 40px;">&bigstar;</span>';
                    } 
                  } 

                elseif($Breview==1){
                for ($i = 1;$i<=4;$i++) {
                   
                print '<span style="font-size: 40px;">&bigstar;</span>';
                    } 
                  } 
              ?>

              <p>by   <?php echo  $review->reviewPoster;?></p>
              
                <p>On  <?php echo substr($review->TimeStamp,0,10);?></p>

              </div>
            
            <div style="width: 600px;height: 100px;float: left;margin:0;padding-left: 10px">
              
              
              <h3><p><?php echo $review->title ?></p></h3>
              
                <p><?php echo $review->review ?></p>
                
            </div>
<?php }?>
</div>
<?php

 }
}
 ?>
                  </div>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
    </div>






<script src="http://www.autotraders.ga/js/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="http://www.autotraders.ga/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: true,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: true,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
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
                item.attr('class', 'btn btn-default cmpremove');
                item.html('<i class="fa fa-remove"></i><span>Remove from compare list</span>');

                //console.log(vehicleId);
        }

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
        item.attr('class', 'btn btn-default cmpremove');
        item.html('<i class="fa fa-remove"></i> Remove from compare list');

        console.log(vehicleId);
      }

  });
  </script>
