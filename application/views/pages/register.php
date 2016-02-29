
    <!-- Start Body Content -->
     <div class="page-header parallax" style="background-image:url(http://localhost/ci/images/black_infiniti.jpg); height:300px"></div>
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-8">
                        <h2>Get started with AutoStars</h2>
                        <p>Manage All your Ads in one place- for free!</p>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <h3>Sell your car to make money</h3>
                            <div class="spacer-20"></div>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <h3>Flexible listing options</h3>
                            <div class="spacer-20"></div>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <h3>Easy to use tools</h3>
                            <div class="spacer-20"></div>
                        </div>
                        <div class="spacer-20"></div>
                        <br/>
                        <div>
                            <p>Already have an account? <span class="accent-color"><a href="login">Log In here</a></span></p>
                        </div>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="col-md-4">
                    	<section class="signup-form sm-margint">
                            <form method='post' action='http://localhost/ci/Register/reg' onSubmit='return check();'>
                            	<!-- Regular Signup -->
                                <div class="regular-signup">
                        			<h3>Create an account</h3>
                                    <div style="color:red">
                                    <?php
                                        $CI =& get_instance();
                                        $CI->load->library('form_validation');
                                        echo validation_errors();
                                    ?>
                                    </div>
                                    <input type="radio" checked='checked' name='userType' value='Private'> Private
                                    <input type="radio" name='userType' value='Business'> Business Advertiser
                                    <div class="spacer-20"></div>
                                    <input type="text" id='Name' value='<?php echo set_value("Name"); ?>' name='Name' class="form-control" placeholder="Name">
                                    <input type="email" value='<?php echo set_value("email"); ?>' class="form-control" placeholder="E-mail" id='email' name='email'>
                                    <input type="password" name="password" class="form-control" placeholder="Password" id='password'/>
                                    <input type="password" class="form-control" id='confirmPassword' name='confirmPassword' placeholder="Confirm Password"/>
                                    <label class="checkbox-inline"><input type="checkbox" id='terms'>By signing up, I agree to the <a href="#">terms &amp; conditions</a> and <a href="#">privacy policy</a></label>
                                    <div class="spacer-20"></div>
                                    <script language='javascript'>
                                    function check()
                                    {
                                        if(document.getElementById("terms").checked==false)
                                        {
                                            alert('Please accept terms & conditions and privacy policy !');
                                            return false;
                                        }
                                        else
                                        {
                                            return true;
                                        }
                                    }
                                    </script>
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Create account" id="submit">
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->