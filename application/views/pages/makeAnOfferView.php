
<div class="main" role="main">
<div style="background-image:url(http://www.autotraders.ga/images/road2.jpg);width:100%;background-repeat:no-repeat;
                background-size:100% 100%;
                background-attachment:fixed">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                    <section class="signup-form sm-margint">
                        
                         
                        <div class="regular-signup">
                            
                        <?php 
                            $email = $details['email'];
                            $id = $details['id'];
                            ?>
                            
                        
                                
                            <form name="myform4" action="<?php echo base_url(). 'makeAnOfferCtrl/sendSellerEmailToReview/'. $email .'/'. $id ;?> " method="POST">
                               
                                

                            <b><h3>Make an offer</h3></b>
                        
                            <div class="spacer-20"></div>
    
                            <label class="col-md-4">Your offer (Rs.)</label>    
                            <input type="text" name="offer" class="form-control" placeholder="Offer" value="<?php echo set_value("offer") ?>">
                            
                            <div class="spacer-20"></div>

                            <label class="col-md-4">Message to seller</label>
                            <textarea rows="10" cols="103" name="message" placeholder="Message" class="form-control" value="<?php echo set_value("message")?>"></textarea>
                            
                            <div class="spacer-20"></div>
                        
                            
                            <input type="submit" name="reviewoffer" class="btn btn-primary btn-lg" value="REVIEW OFFER">
                            
                            <div class="spacer-20"></div>

                     
                            </form>
                            
                        </div>


                    </section>
                    
                    </div>
                </div>
            </div>
        </div>
</div>
</div>

