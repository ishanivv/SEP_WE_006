<!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-10">
                    	<section class="signup-form sm-margint">
                            <form method="post" action="<?php echo base_url();?>feedback_ctrl/insert_into_feedback">
                            	<!-- Regular Signup -->
                                <div class="regular-signup">
                        			<h3>Contact Us</h3>
                                    <?php if (isset($message)) { ?>
                                    <h6 style="color:green;">Data inserted successfully</h6><br>
                                    <?php } ?>
                                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                                    <input type="email" class="form-control" name="email" placeholder="Your E-mail">
                                    <textarea rows="4" cols="103" name="message" placeholder="Your Message"></textarea>
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
    <!-- End Body Content -->