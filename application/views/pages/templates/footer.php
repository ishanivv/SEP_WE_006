<!-- Start site footer -->
<!--<div id="hello" style="display:none">
        <p>There are no listing to be compared</p>
</div>-->
        <div id="vehiclelist" style="display:none">
            <p id="list">Listing to be compared</p>
            <p style="display:none" id="nolist">There are no listing to be compared</p>

            <a onclick="closePopup();"><i style="float: right; position: relative; top: -35px;" class="fa fa-close"></i></a>
                            
            <div id="vehicleItems">
                                
            </div>

                            <!--<input type="button" value="Remove All" onclick="removeAllVehicles()" class="btn-primary">-->
            <a id="myAnchor" href="#"><input type="button" style="display:none" id="comparebutton" value="Compare" class="btn-primary"></a>
        </div>
    <footer class="site-footer">
        <div class="site-footer-bottom">
        	<div class="container">
                <div class="row">
                	<div class="col-md-6 col-sm-6 copyrights-left">
                    	<p>&copy; 2016 AutoTraders. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End site footer -->
  	<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>  
    <button class="btn" id="fixedbutton"><i class="fa fa-exchange"></i> Comparison Table<span class="counter"></span></button>
</div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
<script src="vendor/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
<script src="js/ui-plugins.js"></script> <!-- UI Plugins -->
<script src="js/helper-plugins.js"></script> <!-- Helper Plugins -->
<script src="vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
<script src="vendor/password-checker.js"></script> <!-- Password Checker -->
<script src="js/bootstrap.js"></script> <!-- UI -->
<script src="js/init.js"></script> <!-- All Scripts -->
<script src="vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
    
        $("#fixedbutton").click(function() {
             /*var $this=$(this);
             $this.toggleClass('comp');
            
             if ($this.hasClass('comp')) {  
                  $('#vehiclelist').hide();
            }
            else{*/
                var array=[];
                if ($.cookie('vehicleList')) {
                    array=JSON.parse(getCookie("vehicleList"));
                }
                else
                {
                    $('#list').hide();
                    $('#nolist').show();
                    $('#vehiclelist').show();
                    return;
                }

                if(array.length==0)
                {
                    $('#list').hide();
                    $('#nolist').show();
                    $('#vehiclelist').show();
                    return;
                }

                document.getElementById('vehicleItems').innerHTML="";
                array=JSON.parse(getCookie("vehicleList"));
                
                if(array.length>1)
                {
                    $('#comparebutton').show();
                }

                for (var i = 0; i < array.length; i++) {
                    var vehicleID=array[i];
                
                    var url="fetchVehicleDetails";
                    var data = new FormData();
                    data.append('vehicleID', vehicleID);
                    $.ajax({
                        url: url,
                        type:"post",
                        data: data,
                        dataType:"JSON",
                        processData: false,
                        contentType: false,
                          success: function (text) {
                            console.log("Success");
                            document.getElementById('preloader').style.visibility="hidden";

                            var json = JSON.stringify(text), obj = JSON.parse(json);
                            var image = obj.Image1;
                            var year = obj.Modelyear;
                            var brand = obj.Brand;
                            var model = obj.Model;

                            document.getElementById('vehicleItems').innerHTML = document.getElementById('vehicleItems').innerHTML + '<div class="vehicle item clearfix" id="compare_196450" style="display: block;"> <div class="left"> <a href="undefined" target="_blank"><img style="width: 65px;" alt="" src="http://www.autotraders.ga/images/Vehicleimages/' + image + '" title=""></a> </div> <div class="right"> <a><div class="removeVehicle" data-id="'+vehicleID+'" style="position: absolute; right: 0;"><i class="fa fa-trash"></i></div></a> <div class="link"> <a href="undefined" target="_blank"></a> </div> <div class="category"> <a href="#">' + year + " " + brand + " " + model + '</a> </div> </div> </div>';


                            deleteVehicle();

                            $('#vehiclelist').show();
                          }, 
                          error: function(text) {
                              if (data.status === 422) {
                                alert("Something went wrong. Please try again!");
                              } else {
                            
                              }
                          }
                    }); //AJAX End
                };
           //}
         });
    

        $("#comparebutton").click(function() {
            var array=JSON.parse(getCookie("vehicleList"));
            document.getElementById('myAnchor').href="http://www.autotraders.ga/compare_ctrl/get_compare_details/"+array;
        });

        function closePopup() {
            $('#vehiclelist').hide();
        }

        function removeAllVehicles(){
            setCookie("vehicleList", "", 7);
            document.getElementById('vehicleItems').innerHTML = "";
        }

        
        var arr = [];

        function cmpAdd(){
            $(".comp").click(function() {
                console.log("Compare");
                if ($.cookie('vehicleList')) {
                    arr=JSON.parse(getCookie("vehicleList"));
                }

                document.getElementById('preloader').style.visibility="visible";

                var vehicleID = $(this).attr("data-id");
                
                arr.push(vehicleID);
                if(arr.length>1)
                {
                    $('#comparebutton').show();
                }

                var json_str = JSON.stringify(arr);
                setCookie("vehicleList", json_str, 7)

                var url="fetchVehicleDetails";
                var data = new FormData();
                data.append('vehicleID', vehicleID);

                $.ajax({
                url: url,
                type:"post",
                data: data,
                dataType:"JSON",
                processData: false,
                contentType: false,
                  success: function (text) {
                    console.log("Success");
                    document.getElementById('preloader').style.visibility="hidden";

                    var json = JSON.stringify(text), obj = JSON.parse(json);
                    var image = obj.Image1;
                    var year = obj.Modelyear;
                    var brand = obj.Brand;
                    var model = obj.Model;

                    document.getElementById('vehicleItems').innerHTML = document.getElementById('vehicleItems').innerHTML + '<div class="vehicle item clearfix" id="compare_196450" data-id="'+vehicleID +'" style="display: block;"> <div class="left"> <a href="undefined" target="_blank"><img style="width: 65px;" alt="" src="http://www.autotraders.ga/images/Vehicleimages/' + image + '" title=""></a> </div> <div class="right"> <a><div class="removeVehicle" style="position: absolute; right: 0;"><i class="fa fa-trash"></i></div></a> <div class="link"> <a href="undefined" target="_blank"></a> </div> <div class="category"> <a href="#">' + year + " " + brand + " " + model + '</a> </div> </div> </div>';
                    
                    var item = $('button.comp[data-id="' + vehicleID + '"]').remove();

                    $('div#divCompare[data-id="' + vehicleID + '"]').html('<button class="btn cmpremove" data-id="' + vehicleID + '"><i class="fa fa-remove"></i> Remove from compare list</button>');
                    cmpRemove();

                    deleteVehicle();

                    $('#vehiclelist').show();
                  }, 
                  error: function(text) {
                      if (data.status === 422) {
                        alert("Something went wrong. Please try again!");
                      } else {
                    
                      }
                  }
                }); //AJAX End*/
                
            }); 
        }

        function cmpRemove(){
            $(".cmpremove").click(function() {
                console.log("Compare Remove");
                var array=JSON.parse(getCookie("vehicleList"));
                
                var Id = $(this).attr("data-id");
                for (var i = 0; i < array.length; i++) {
                    var vehicleId=array[i];
                    if(Id==vehicleId)
                    {
                        array.splice(i,1);
                    }
                }
                
                if(array.length<=1)
                {
                    $('#comparebutton').hide();
                }
                var json_str = JSON.stringify(array);
                setCookie("vehicleList", "", 7);
                //$.cookie("vehicleList", null, { path: '/' });
                setCookie("vehicleList", json_str, 7);
                
                deleteVehicle();
                var item = $('button.cmpremove[data-id="' + Id + '"]').remove();
                //var item2=$('button.removeVehicle[data-id="' + Id + '"]').remove();

                
                $('div#divCompare[data-id="' + Id + '"]').html('<button class="btn comp" data-id="' + Id + '"><i class="fa fa-exchange"></i> Add to compare list</button>');

                cmpAdd();
                
                $('div.vehicle item clearfix[data-id="' + Id + '"]').closest("div.vehicle").remove();
                e.preventDefault();
            }); 
       }


        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
            }
            return "";
        }

        function deleteVehicle(){
            $(".removeVehicle").on("click", function(e) {
                
                var array=JSON.parse(getCookie("vehicleList"));
                
                var Id = $(this).attr("data-id");
                for (var i = 0; i < array.length; i++) {
                    var vehicleId=array[i];
                    if(Id==vehicleId)
                    {
                        /*array = jQuery.grep(array, function(value) {
                            return value != vehicleId;
                        });*/
                        array.splice(i,1);
                    }
                }
                
                var json_str = JSON.stringify(array);
                setCookie("vehicleList", "", 7);
                //$.cookie("vehicleList", null, { path: '/' });
                setCookie("vehicleList", json_str, 7);
            
                //deleteVehicle();
                var item = $('button.cmpremove[data-id="' + Id + '"]').remove();

                $('div#divCompare[data-id="' + Id + '"]').html('<button class="btn comp" data-id="' + Id + '"><i class="fa fa-exchange"></i> Add to compare list</button>');
                $(this).closest("div.vehicle").remove();
                e.preventDefault();

                cmpAdd();
            });


            if(arr.length==1||arr.length==0)
                {
                    $('#compbutton').hide();
                }
        }

        

   </script>
</body>
</html>