
<div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                    <section class="signup-form sm-margint">
                        
                         
                        <div class="regular-signup">
                           <?php  


                            $email = $details['email'];
                            $id = $details['id'];
                            $offer = $_POST['offer'];
                            $msg=$_POST['message'];




                             ?> 
                        <form name="myform5" action="<?php echo base_url().'submitOfferCtrl/submitOffer/'. $email.'/'. $offer.'/'. $msg .'/'. $id;?>" method="POST"> 
                            <b><h3>Make an offer</h3></b>
                        
                            <div class="spacer-20"></div>
    
 
                            <ul>
                            <label class="col-md-4">Your offer </label>
                        
                            
                            <?php $r="Rs."; 
                           
                            ?>
                            <label name="offer"><?php echo $r. $offer ?></label>
                            </ul>

                            <div class="spacer-20"></div>
                        
                            <ul> 
                            <label class="col-md-4">Message to seller</label>
                            </ul>
                            <ul>
                            &nbsp;<label name="message"><?php echo $msg ?></label>
                            </ul>

                            <div class="spacer-20"></div>

                            
                            
                       
                       
                            <input type="submit" name="mybutton" value="Submit Offer" class="btn btn-primary btn-lg"/>   
                          
                        </form>

                         
                        </div>


                    </section>
                    
                    </div>
                </div>
            </div>
        </div>
</div>

