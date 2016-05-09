<!-- Start Body Content -->
  	<div class="main" role="main">
    <div style="background-image:url(http://www.autotraders.ga/images/road2.jpg);width:100%;background-repeat:no-repeat;
                background-size:100% 100%;
                background-attachment:fixed">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-10">
                    <div style="color:green">
                        <h4 align="center" style="color:green;background-color:#ffffff"><?php echo $this->session->flashdata('success_msg');?></h4>
                    </div>
                    	<section class="signup-form sm-margint">
                            <form method="post" action="<?php echo base_url();?>feedback_ctrl/insert_into_feedback">
                            	<!-- Regular Signup -->
                                <div class="regular-signup">
                        			<h3>Contact Us</h3>
                                    <div style="color:red">
                                    <?php
                                        $CI =& get_instance();
                                        $CI->load->library('form_validation');
                                        echo validation_errors();
                                    ?>
                                    </div>
                                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                                    <input type="email" class="form-control" name="email" placeholder="Your E-mail">
                                    <textarea rows="4" cols="103" name="message" placeholder="Your Message" class="form-control"></textarea>
                                    <div class="spacer-20"></div>
                                    <input type="submit" class="btn btn-primary btn-lg" value="Send Message">
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