<!-- Start Body Content -->
    <div class="main" role="main">
    <div style="background-image:url(http://www.autotraders.ga/images/gallerybg.jpg);background-repeat:no-repeat;
                background-size:100% 100%;
                background-attachment:fixed">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <section class="signup-form sm-margint">
                          <form method="post" action="<?php echo 'http://www.autotraders.ga/moreinfo_reply_ctrl/send_email_moreinfo/'.$email.'/'.$vehicleid?>">
                                <!-- Request more info -->
                                <div class="regular-signup">
                                    <h3>Request more information</h3>
                                <div class="input-group">
                                    
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Full Name" name="Name">
                                </div>
                                <div class="spacer-20"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                    <?php 
                                        if(!(isset($this->session->userdata['logged_in']))) 
                                        {
                                   
                                    ?>
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" placeholder="Email" name="Email">
                                    <?php
                                    }
                                        else{
                                            $email = $this->session->userdata['logged_in']['email']; 

                                    ?>
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" value="<?php echo $email;?>"placeholder="Email" name="Email">
                                    <?php
                                    }?>
                                        </div>
                                    </div>
                                    <div class="spacer-20"></div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="text" class="form-control" placeholder="Phone" name="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="spacer-20"></div>
                                <input type="submit" class="btn btn-primary pull-right" value="Request Info">
                                <label class="btn-block">Preferred Contact</label>
                                <label class="checkbox-inline"><input type="checkbox" name="checkemail"> Email</label>
                                <label class="checkbox-inline"><input type="checkbox" name="checkphn"> Phone</label>
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