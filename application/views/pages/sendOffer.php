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
						$offer=$post->senderOffer;
						$msg=$post->senderMessage;
						$senderemail=$post->senderEmail;
						
						}?>
					<p>Dear Customer, </p>
					<p>An offer has been made for your advertisement on autotraderslk by <?php echo $senderemail?>

					</p>
					<p>If you are consider about the offer please reply to <?php echo $senderemail?> </p>
					<p> To view your ad <a href="<?php echo 'http://localhost/ci/adpreview_ctrl/getad_preview/'.$vehicleid?>">Click here</a></p>
					<p>Reference no for your advertisement is <?php echo $vehicleid ?></p>
				</div>
						<div style="width: 915px;height: 200px;float: left;background-color:#fff;opacity:0.9;border-color:#cc3e19;border-style:solid;margin-bottom:30px">
						
						<div style="width: 600px;height: 200px;float: left;margin:0;padding-left: 10px">
							<div style="width: 600px;height:26px;float:left;background-color:#cc3e19;border-radius:3px;color:#ffffff;top:0;padding-left:5px">
							<b>An offer for your advertisement</b>
							</div>
							<div style="width:200px;height:150px;float: left">
							<p style="color:#000"><b> SENDERS' OFFER: </b><?php echo $offer;?></p>
							<p style="color:#000"><b>MESSAGE : </b><?php echo $msg;?></p>
							<p style="color:#000"><b>From : </b><?php echo $senderemail;?></p>
													
							</div>
					
				
							</div>
						</div>
						</div>
						
			</div>
</body>
</html>