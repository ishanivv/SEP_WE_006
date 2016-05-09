 
    <!-- Start Body Content -->

    <div class="main" role="main">
    <div style="background-image:url(http://www.autotraders.ga/images/homebg.jpg);background-repeat:no-repeat;
                background-size:100% 100%;
                background-attachment:fixed">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-4">
                    	 
                    	<section class="signup-form sm-margint">
                    	
                            <form method="post" action="<?php echo "http://www.autotraders.ga/Reporting/report"?>">
                            	<!-- Report Add -->
                               
                                <div class="regular-signup">
                                    <h3>Is there something wrong with this ad?</h3>
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
                                    <select name="reason" class="form-control selectpicker">
                             
                             		<option value="select1">--Select a Reason--</option>
                                    <option value="itemsold">Item sold/unavailable</option>
									<option value="fraud">Fraud</option>
									<option value="duplicate">Duplicate</option>
									<option value="spam">Spam</option>
									<option value="wrongcat">Wrong Category</option>
									<option value="offensive">Offensive</option>
									<option value="other">Other</option>

									</select>

									<input type="email" id="email" class="form-control" name="email" value="<?php echo $this->session->userdata['logged_in']['email']?>" placeholder="E-mail" readonly/>

									<textarea name="message" class="form-control" rows="5" cols="5" value="<?php echo set_value("message")?>" placeholder="Message"></textarea>

                                    <input type="hidden" value="<?php print_r($addId); ?>" name="addId">
                                    
                                    <div class="spacer-20"></div>
                                    
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="report" value="Send Report">
                                    
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