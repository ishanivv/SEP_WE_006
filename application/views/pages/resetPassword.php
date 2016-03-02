
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
                            <form method="post" action="http://localhost/ci/Reset_Password/reset">
                                <div class="regular-signup">
                                <h3>Forgot Password</h3>
                                <div style="color:green">
                                <?php
                                    if(isset($message))
                                    {
                                        echo $message;
                                    }
                                ?>
                                </div>
                                <div style="color:red">
                                <?php      
                                    echo '</br>';
                                    $CI =& get_instance();
                                    $CI->load->library('form_validation');
                                    echo validation_errors();
                                ?>
                                </div>
                                    <input type="email" id="email" class="form-control" name="email" value="<?php echo set_value("email")?>" placeholder="E-mail"/>
                                    <br>
                                    <p>Your new password will be send to this Email address...</p>
                                    <div class="spacer-20"></div>
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="reset" value="Send">
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
   	</div>
    <!-- End Body Content -->