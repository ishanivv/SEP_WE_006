<!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-6">
                    	<section class="signup-form sm-margint">
                          <form method="post">
                            	<!-- Regular Signup -->
                                <div class="regular-signup">
                        			<h3>View Page of Feeedback</h3>
                                    
                                    <?php foreach ($details as $detail){?>

                                     <?php
                                        $feedbackid=$detail->Feedbackid;
                                    ?>

                                    <div class="spacer-20"></div>
                                    <label>Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $detail->Name;?>" name="uname" disabled="disabled"/>
                                    <div class="spacer-20"></div>
                                    <label>Email :</label>
                                    <input type="text" class="form-control" value="<?php echo $detail->Email;?>" name="email" disabled="disabled"/>
                                    <div class="spacer-20"></div>
                                    <label>Message :</label>
                                    <input type="text" class="form-control" value='<?php echo $detail->Message;?>' name="subject" disabled="disabled"/> 
                                     
                                    <!--<input type="email" class="form-control" name="email" placeholder="Your E-mail">-->
                                    <!--<textarea rows="4" cols="65" name="reply" placeholder="Reply" disabled="disabled"></textarea> -->
                                    <div class="spacer-20"></div>
                                    <a href="<?php echo 'http://www.autotraders.ga/admin_feedback_ctrl/get_feedback_email/'.$feedbackid?>"><input type="button" class="btn btn-primary btn-lg" value="Reply">
                                    <a href="<?php echo 'http://www.autotraders.ga/admin_feedback_ctrl/delete_feedback/'.$feedbackid ?>"><input type="button" class="btn btn-primary btn-lg" value="delete" onclick="return deleteconfirm();"></a>

                                    <?php }?>
                                <div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->
    <script type="text/javascript">
    function deleteconfirm()
    {
        job=confirm("Are you sure you want to delete this message?");
        if (job!=true) {
          return false;
        }
    }
    </script>