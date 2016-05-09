
    <!-- Start Body Content -->
     <div class="page-header parallax" style="background-image:url(http://www.autotraders.ga/images/black_infiniti.jpg); height:300px"></div>
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
                            <form enctype="multipart/form-data" method='post' action='http://www.autotraders.ga/Register/reg' onSubmit='return check();'>
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
                                    <div>
                                    <input type="radio" checked='checked' id="r1" name='userType' onclick="privateUser()" value='Private'> Private
                                    <input type="radio" name='userType' id="r2" onclick="businessUser()" value='Business'> Business Advertiser
                                    </div>
                                    <script type="text/javascript">

                                    function privateUser()
                                    {

                                        if(document.getElementById('r1').checked)
                                        {
                                            document.getElementById('companyName').type = 'hidden';  
                                            document.getElementById('userfile').type = 'hidden'; 
                                            document.getElementById('webSite').type = 'hidden';
                                            document.getElementById('address').type = 'hidden';
                                            document.getElementById('companyName').value = 'No Company Name';
                                            document.getElementById('userfile').value = 'default-user.png';
                                            document.getElementById('webSite').value = 'No Website';
                                            document.getElementById('address').value = 'No Address';
                                        }
                                    }
                                        
                                     function businessUser()
                                    {

                                        if(document.getElementById('r2').checked)
                                        {
                                            document.getElementById('companyName').type = 'text'; 
                                            document.getElementById('userfile').type = 'File'; 
                                            document.getElementById('webSite').type = 'text';
                                            document.getElementById('address').type = 'text';
                                            document.getElementById('companyName').value = ''; 
                                            document.getElementById('webSite').value = '';
                                            document.getElementById('address').value = '';
                                            document.getElementById('userfile').value = 'No file chosen';
                                        }
                                    }    

                                    </script>
                                    <div class="spacer-20"></div>
                                    <input type="text" id='Name' value='<?php echo set_value("Name"); ?>' name='Name' class="form-control" placeholder="Name">
                                    <input type="email" value='<?php echo set_value("email"); ?>' class="form-control" placeholder="E-mail" id='email' name='email'>
                                    <input type="hidden" id='telephoneNo' value='' name='telephoneNo' class="form-control" placeholder="Telephone Number">

                                    <input type="hidden" id='address' value='No Address' name='address' class="form-control" placeholder="Address">

                                    <input type='hidden' id='companyName' value='No Company Name' name='companyName' class="form-control" placeholder="Company Name">

                                    
                                    <input type='hidden' id='webSite' value='No Web Site' name='webSite' class="form-control" placeholder="Web Site">

                                    <input type="password" name="password" class="form-control" placeholder="Password" id='password'/>
                                    <input type="password" class="form-control" id='confirmPassword' name='confirmPassword' placeholder="Confirm Password"/>
                                    <input type="hidden" name="userfile" size="100" id="userfile" value = "default-user.png" />
                                    <br />
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