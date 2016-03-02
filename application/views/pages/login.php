
    <!-- Start Body Content -->

    <div class="main" role="main">
    <div style="background-image:url(http://localhost/ci/images/City-Night-City-Road-Vehicles.jpg);background-repeat:no-repeat;
                background-size:100% 100%;
                background-attachment:fixed">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
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
                                    <p><a href="http://localhost/ci/Reset_Password">Forgot password?</a></p>
                                    <div>
                                    <p>Don't have an account? <span class="accent-color"><a href="http://localhost/ci/Register">Register here</a></span></p>
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