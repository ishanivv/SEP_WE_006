<!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-6">
                    	<section class="signup-form sm-margint">
                        <?php foreach ($details as $detail){?>
                          <form method="post" action="<?php echo 'http://www.autotraders.ga/feedback_reply_ctrl/reply_to_feedback/'.$detail->Email.'/'.$detail->Feedbackid?>" >
                            	<!-- Regular Signup -->
                                <div class="regular-signup">
                        			<h3>Reply to Messages</h3>
                                    <label>To</label>
                                    <input type="text" class="form-control" value="<?php echo $detail->Email;?>" name="email" disabled>
                                    <label>Subject</label>
                                    <input type="text" class="form-control" value='Re:<?php echo $detail->Message; ?>' name="subject" placeholder="Subject"/> 
                                     
                                    <label>Reply</label>
                                    <textarea rows="10" cols="55" name="reply" placeholder="Type your Reply" class="form-control"></textarea>
                                    <div class="spacer-20"></div>
                                    <input type="submit" class="btn btn-primary btn-lg" value="Send Reply">

                                    <?php }?>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->