<div class="main" role="main">
<div style="background-image:url(http://www.autotraders.ga/images/gallerybg.jpg);background-repeat:no-repeat;
                background-size:100% 100%;
                background-attachment:fixed">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                     
                    <div class="col-md-10">
                        <section class="signup-form sm-margint">
    
                         <div class="regular-signup">  
                                         
                            <?php $Vehicleid=$details['id']; ?>
                                
                            <h2>Rate Ad</h2>
                            <p>All field marked with * are required</p>
                           
    
                             <div class="spacer-20"></div>
                            <h4>Your rating*</h4>
      <form name="myForm7" method="post" action="<?php echo 'http://www.autotraders.ga/businessRateCtrl/insertIntoBusinessReview'.'/'. $Vehicleid;?>" >


                           <h1><div class="rating" style="width:200px;float:left;padding-left:1px">
                    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
                                <span class="rate-star" data-rate="Excellent">&bigstar;</span> 
                                <span class="rate-star" data-rate="Good" >&bigstar;</span> 
                                <span class="rate-star" data-rate="Okay" >&bigstar;</span>
                                <span class="rate-star" data-rate="Unsatisfied" >&bigstar;</span>
                                <span class="rate-star" data-rate="Terrible" >&bigstar;</span>
                                </div>
                            </h1>


                              <div style="float:right;padding-right:450px">
                            <h3><label id="rateText" name="lblrating"></label></h3>
                                <input type="hidden" id="rating" name="RatingTxt" value="" /> 
                                </div>

                            <div class="spacer-20"></div>

                           
                             
                             <h4>Write your review</h4>
                              <div class="spacer-20"></div>
                            <label class="col-md-4"> Title </label> 
                            <input type="text" name="reviewTitle" placeholder="Title your review" class="form-control">     
                            
                            <div class="spacer-20"></div>

                            <label class="col-md-4">Your review </label>       
                            <textarea rows="10" cols="103" name="review" placeholder="Write your review" class="form-control"></textarea>
                            <div class="spacer-20"></div>
                            <a class="btn btn-primary btn-lg" href="<?php echo 'http://www.autotraders.ga/adpreview_ctrl/getad_preview/'.$Vehicleid?>"  onclick="return cancelConfirm();">Cancel</a>
                             <input disabled type="submit" name="submitreview" id="submitreview" class="btn btn-primary btn-lg" value="SUBMIT"/>
                            
                     </form>                               
                        </div>
                    </section>
                    </div>
                </div>
            </div>
            
        </div>
            <script type="text/javascript">
                   var rateText;
                    window.onload = function() {
                    var starList = document.getElementsByClassName('rate-star');  
                    var numOfStars = starList.length;
 
                        for(var i = 0; i < numOfStars; i++) {
                            starList[i].addEventListener('click', starClickHandler, false);
                        }
                    }

                        function starClickHandler(event) {

                            var star = event.currentTarget;

                            setActive(star, false);
                            setActive(star, true);
                            document.getElementById('rateText').textContent = star.getAttribute('data-rate');
                            
                           document.myForm7.RatingTxt.value = document.getElementById('rateText').textContent ;
                            
                        }

                        function setActive(element, isActive) {
                            if(isActive) {
                            element.classList.add('active');
                            element.nextElementSibling && setActive(element.nextElementSibling, isActive);
                            }
                            else {
                            element.classList.remove('active');
                            element.previousElementSibling && setActive(element.previousElementSibling, isActive);
                            }
                            }

                        $(document).ready(function(){
                            $(".rating .rate-star").click(function(){
                            $(".active").removeClass("active");
                            $( ".rate-star:lt("+($(this).index()+1)+")" ).addClass("active");
                            $("#rateText").html($(this).data("rate"));
                            $("#submitreview").removeAttr("disabled");
                            });

                            });

                   function cancelConfirm(){
                            return confirm("Are you sure you want to cancel and leave this page?");
                        }

            </script>        



                     
       
            <style type="text/css">

                 .active{

                            color:yellow;
                                }
                    
                       #rateText{
                            
                    text-align:right;

                        }
                        .rating {
                            unicode-bidi: bidi-override;
                            direction: rtl ;
                                }
                      

                                .rating > .rate-star.active,
                                .rating > .rate-star:hover,
                                .rating > .rate-star:hover ~ .rate-star {
                                     color: #FFFF00;
                                    cursor: default;
                                    }





            </style>
</div>
