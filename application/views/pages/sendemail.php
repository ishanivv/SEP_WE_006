<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>AutoStars - Responsive Car Dealership Template</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="http://localhost/ci/css/bootstrap.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="http://localhost/ci/vendor/flexslider/css/flexslider.css" type="text/css" media="screen" />-->
<link href="http://localhost/ci/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="http://localhost/ci/css/style.css" rel="stylesheet" type="text/css">
<link href="http://localhost/ci/vendor/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="http://localhost/ci/vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="http://localhost/ci/vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<link href="http://localhost/ci/css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
<!-- Color Style -->
<link href="http://localhost/ci/colors/color1.css" rel="stylesheet" type="text/css">
<!-- SCRIPTS
  ================================================== -->
<script src="http://localhost/ci/js/modernizr.js"></script><!-- Modernizr -->

</head>
<body>
			<div class="container">
				<div>
				<?php
					foreach($posts as $post){
						$vehicleid=$post->Vehicleid;
						?>
					<p>Dear Customer, </p>
					<p>Your vehicle adverstisement has been posted successfully. To view your ad <a href="<?php echo 'http://localhost/ci/adpreview_ctrl/getad_preview/'.$vehicleid?>">Click here</a></p>
				</div>
						<div style="width: 915px;height: 200px;float: left;background-color:#fff;opacity:0.9;border-color:#cc3e19;border-style:solid;margin-bottom:30px">
						<div style="width: 200px;height: 150px;float: left;padding: 20px">
							<?php $image=$post->Image1; 
							echo '<img src="https://raw.githubusercontent.com/ishanivv/SEP_WE_006/master/images/' . $image . '" style="width:200px; height:150px;"/>';?>
						</div>
						<div style="width: 600px;height: 200px;float: left;margin:0;padding-left: 10px">
							<div style="width: 600px;height:26px;float:left;background-color:#cc3e19;border-radius:3px;color:#ffffff;top:0;padding-left:5px">
							<b><?php echo $post->Brand . " " . $post->Model . " " . $post->Modelyear;?></b>
							</div>
							<div style="width:200px;height:150px;float: left">
							<p style="color:#000"><b>BRAND: </b><?php echo $post->Brand;?></p>
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
							<a href="<?php echo 'http://localhost/ci/adpreview_ctrl/getad_preview/'.$vehicleid?>"><input type="button" value="View" class="btn-primary"></a>
				
							</div>
						</div>
						</div>
						<?php } 
						?>
			</div>
</body>
</html>