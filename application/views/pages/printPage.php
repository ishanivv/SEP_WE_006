<div class="main" role="main" style="background-color:#ffffff">
      <div id="content" class="content full">
          <div class="container">
          	<style type="text/css">

          	@media print {
    #with_print {
        display: none;
    }
}
        h4{
        	font-size: 18px;
        }

        h3{

        	font-size: 17px;

        }

        h2{
        	font-style: bold;
        }


          	</style>



<?php
                    foreach($details as $detail){
                  
?>
 
<div style="width:1000px;height:300px;">
 <div class="btn btn-info price" style="float:right" onclick="window.print()" id="with_print">Print the page</div>

 <div style="width:300px;height:300px;float:right">
 <div class="spacer-20"></div>
 <div class="spacer-20"></div>
<h4>Owner Information</h4>
<h3>Email : <?php  echo $detail->Email ?></h3>
	<h3>Phone:  <?php echo $detail->Phone;?></h3>
<h3> District :    <?php echo $detail->District ; ?> </h3>         
<h3> Location  :    <?php echo $detail->Location?></h3>

</div>



<div style="width:400px;height:1000px;float:left">
<div style="width:400px;height:300px;">
	<b><h2> <?php echo $detail->Brand.' ' .$detail->Model.' '.$detail->Modelyear ; ?></h2></b>

 	<?php $image1=$detail->Image1;
                      echo '<img src="http://localhost/ci/images/Vehicleimages/'.$image1.'" style="width:500px; height:300px" />';?>



</div>




<div style="width:400px;height:700px">
<div class="spacer-20"></div>
<div class="spacer-20"></div>
<div class="spacer-20"></div>
<div class="spacer-20"></div>
<div class="spacer-20"></div>
<div class="spacer-20"></div>
	<h4>Common </h4>
	<h3> Category : Car </h3>
	<h3> Make :     <?php echo $detail->Brand ;?>  </h3>
	<h3> Model :     <?php echo $detail->Model ;?></h3>				
	<h3> Model Year :    <?php echo $detail->Modelyear;?></h3>
	<h3> Body Type :    <?php echo $detail->BodyType;?></h3>
	<h3> Mileage  :    <?php echo $detail->Mileage;?></h3>
	<h3> Transmission : <?php echo $detail->Transmission;?></h3>
	<h3> Condition : <?php echo $detail->VehicleCondition ; ?></h3>
	<h3> Fuel Type : <?php echo $detail->Fueltype ; ?> </h3>
	<h3> Engine Capacity : <?php  echo $detail->EngineCapacity ; ?> </h3>
	<h3> Additional Information : <?php echo $detail->Description ; ?> </h3>

	 

</div>
<div style="width:1000px">
<center>&copy; Powered by AutoTraderslk.</center>
</div>

</div>





                                                                     

                   
	 
	 
	





<?php }?>






</div>
</div>
</div>
</div>
          
      
  