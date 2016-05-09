
    <!-- Start Body Content -->


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
                        <div class="spacer-20"></div>
                    </div>
                    <div class="col-md-4">
                    	<section class="signup-form sm-margint">
                            <form method="post" action="http://www.autotraders.ga">
                                <div class="regular-signup">
                                <?php
                                    $CI =& get_instance();
                                    $CI->load->library('form_validation');

                                if($resetPassword=='yes')
                                {
                                    echo 
                                    '
                                        <form method="post" action="http://www.autotraders.ga/New_Password/newp">
                                        <h3>Create new password</h3>
                                        You have logged in with the random password generated by our system. Please select your own password here...
                                        <div class="spacer-20"></div>
                                    '
                                    .
                                        validation_errors()
                                    .
                                    '
                                        <input type="password" name="oldPassword" class="form-control" placeholder="Old Password" id="oldPassword"/>
                                        <input type="password" name="password" class="form-control" placeholder="Password" id="password"/>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"/>
                                        <div class="spacer-20"></div>
                                        <input type="submit" class="btn btn-primary btn-block" value="Change password" id="submit">
                                        </form>
                                    ';
                                }
                                else
                                {
                                    echo 
                                    '
                                        <form method="post" action="http://www.autotraders.ga">
                                        <h3>Login Successful</h3>
                                        <div class="spacer-20"></div>
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="continue" value="Continue">
                                        </form>
                                    ';
                                }
                                ?>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->