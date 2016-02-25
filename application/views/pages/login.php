
    <!-- Start Body Content -->

    <div class="main" role="main">
    <div style="background-image:url(http://localhost/ci/images/City-Night-City-Road-Vehicles.jpg);background-repeat:no-repeat;
                background-size:100% 100%;
                background-attachment:fixed">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                   <!-- <div class="col-md-8">
                        <div style="background-color:#fff;padding:20px;opacity:0.9">
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
                            <p>Don't have an account? <span class="accent-color"><a href="register">Register here</a></span></p>
                        </div>
                        <div class="spacer-20"></div>
                        </div>
                    </div>-->
                    <div class="col-md-4">

                    	<section class="signup-form sm-margint">
                            <form method="post" action="<?php echo "http://localhost/ci/Login/log"?>">
                            	<!-- Login -->
                                
                                <div class="regular-signup">
                                    <h3>Login</h3>
                                    <div style="color:red">
                                    <?php
                                        if(isset($message))
                                        {
                                            echo $message;
                                            echo "<br/>";
                                        }

                                        $CI =& get_instance();
                                        $CI->load->library('form_validation');
                                        echo validation_errors();
                                    ?>
                        			</div>
                                    <input type="email" id="email" class="form-control" name="email" value="<?php echo set_value("email")?>" placeholder="E-mail"/>
                                    <input type="password" id="password" class="form-control" name="password" placeholder="Password"/>
                                    <input type='checkbox' checked='checked' name='rememberMe' id='rememberMe' value='yes'/>&nbspRemember me
                                    <br>
                                    <p><a href="http://localhost/ci/ResetPassword">Forgot password?</a></p>
                                    <div>
                                    <p>Don't have an account? <span class="accent-color"><a href="register">Register here</a></span></p>
                                    </div>
                                    <div class="spacer-20"></div>
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="Login">
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
            <div class="spacer-30"></div>
        </div>
   	</div>
</div>
    <!-- End Body Content -->