<!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Autotraders Vehicle Portal</title>
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
<!--<link rel="stylesheet" href="http://localhost/ci/css/flexslider.css" type="text/css"/>-->
<!--<link href="http://localhost/ci/vendor/flexslider/css/flexslider.css" rel="stylesheet" type="text/css">-->
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
<body class="home">
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
	<!-- Start Site Header -->
	<div class="site-header-wrapper">
        <header class="site-header">
            <div class="container sp-cont">
                <div class="site-logo">
                    <h1><a href="index.html"><img src="http://localhost/ci/images/logo.png" alt="Logo"></a></h1>
                    <span class="site-tagline">Buying or Selling,<br>just got easier!</span>
                </div>
                <div class="header-right">
                    <div class="topnav dd-menu">
                        <ul class="top-navigation sf-menu">
                            <?php

                                    if (isset($this->session->userdata['logged_in'])) {
                                        $email = ($this->session->userdata['logged_in']['email']);
                                        $type = ($this->session->userdata['logged_in']['type']);
                                        $pendingads=($this->session->userdata['logged_in']['pendingads']);
                                        $messages=($this->session->userdata['logged_in']['messages']);
                                        $notifications=$pendingads+$messages;

                                        if($type=="super admin")
                                        {
                                            echo '<li>';
                                            echo '<a href="http://localhost/ci/admin_table_ctrl">Manage Admins</a>';
                                            echo '</li>';
                                            echo '<li>';
                                            echo '<a href="javascript:void(0)">Notifications <span class="badge">'.$notifications.'</span></a>';
                                            echo '<ul class="dropdown">';
                                            echo '<li><a href="http://localhost/ci/notify_ctrl">Pending Ads <span class="badge">'.$pendingads.'</span></a></li>';
                                            echo '<li><a href="http://localhost/ci/admin_feedback_ctrl">Messages <span class="badge">'.$messages.'</span></a></li>';
                                            echo '</ul>';
                                            echo '</li>';
                                        }

                                        if ($type=="admin") {    
                                            echo '<li>';
                                            echo '<a href="javascript:void(0)">Notifications <span class="badge">'.$notifications.'</span></a>';
                                            echo '<ul class="dropdown">';
                                            echo '<li><a href="http://localhost/ci/notify_ctrl">Pending Ads <span class="badge">'.$pendingads.'</span></a></li>';
                                            echo '<li><a href="http://localhost/ci/admin_feedback_ctrl">Messages <span class="badge">'.$messages.'</span></a></li>';
                                            echo '</ul>';
                                            echo '</li>';
                                        }
                                       

                            ?>
                            <li>
                                <a href="<?php echo 'http://localhost/ci/dashboard_ctrl/load_my_ads/'.$email?>">
                                <?php    
                                    echo $email;
                                    echo '</a>';
                                }
                                else
                                {
                                    echo "<li>";
                                    echo '<a href="http://localhost/ci/Login">Login</a>';
                                }
                            ?>
                            </li>
                            <li>
                            <?php
                                if(!(isset($this->session->userdata['logged_in'])))
                                {
                                    echo '<a href="http://localhost/ci/Register">Register</a>';
                                }
                                else
                                {
                                    echo "<a href='http://localhost/ci/Logout/out'>Logout</a>";
                                }
                            ?>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Site Header -->
        <div class="navbar">
            <div class="container sp-cont">
                <div class="search-function">
                    <a href="#" class="search-trigger"><i class="fa fa-search"></i></a>
                    <span><i class="fa fa-phone"></i> Call us <strong> 0112 332211</strong> <em>or</em> search</span>
                </div>
                <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <!-- Main Navigation -->
                <nav class="main-navigation dd-menu toggle-menu" role="navigation">
                    <ul class="sf-menu">
                        <li><a href="http://localhost/ci/home">HOME</a></li>
                        <li><a href="http://localhost/ci/all_ads_ctrl">ALL ADS</a></li>
                        <li><a href="http://localhost/ci/postad">POST AD</a></li>
                        <li><a href="http://localhost/ci/contactus">CONTACT US</a> </li>
                    </ul>
                </nav> 
                <!-- Search Form -->
                <div class="search-form">
                    <div class="search-form-inner">
                        <form method="post" action="<?php echo base_url();?>search/search_keyword">
                            <h3>Find a Car with our Quick Search</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Make</label>
                                            <select name="Make" class="form-control selectpicker">
                                                <option selected>Any</option>
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
                                        <div class="col-md-6">
                                            <label>Model</label>
                                            <input type="text" name="Model" class="form-control" placeholder="Any">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Price Min</label>
                                            <input type="number" name="PriceMin" class="form-control" placeholder="from">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Price Max</label>
                                            <input type="number" name="PriceMax" class="form-control" placeholder="to">
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Search">
                                        </div>
                                        <div class="col-md-6">
                                        <a href="http://localhost/ci/advancesearch"><input type="button" value="Advanced Search" class="btn btn-block btn-info btn-lg"></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   	</div>