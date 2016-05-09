  <div class="main" role="main" style="background-color:#ffffff">
    	<div id="content" class="content full dashboard-pages">
        	<div class="container">
            	<div class="dashboard-wrapper">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <!-- SIDEBAR -->
                            <div class="users-sidebar tbssticky">
                            	<a href="user-dashboard.html" class="btn btn-block btn-primary add-listing-btn">New Ad listing</a>
                                <ul class="list-group">
                                    <li class="list-group-item"> <span class="badge">5</span> <a href="<?php echo 'http://www.autotraders.ga/dashboard_ctrl/load_my_ads/'.$this->session->userdata['logged_in']['email']?>"><i class="fa fa-home"></i> Dashboard</a></li>
                                    <li class="list-group-item"> <span class="badge"><?php echo $this->session->userdata['savedsearch']; ?></span> <a href="http://www.autotraders.ga/saved_search_ctrl"><i class="fa fa-folder-o"></i> Saved Searches</a></li>
                                    <li class="list-group-item active"> <span class="badge">2</span> <a id ="savecar" href="#"><i class="fa fa-star-o"></i> Saved Cars</a></li>
                                    <li class="list-group-item"> <a href="http://www.autotraders.ga/postad"><i class="fa fa-plus-square-o"></i> Create new Ad</a></li>
                                    <li class="list-group-item"> <span class="badge"><?php echo $this->session->userdata['ads']; ?></span> <a href="<?php echo 'http://www.autotraders.ga/my_ads_ctrl/get_my_ads/'.$this->session->userdata['logged_in']['email']?>"><i class="fa fa-edit"></i> Manage Ads</a></li>
                                    <li class="list-group-item"> <a href="http://www.autotraders.ga/MyProf/start"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li class="list-group-item"> <a href="http://www.autotraders.ga/Logout/out"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                        	<h2>Saved Cars</h2>
                            <div class="dashboard-block">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive dashboard-tables saved-cars-table">
                                        <thead>
                                            <tr>
                                                <td>Description</td>
                                                <td>Price/Status</td>
                                                <td>Timestamp</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                        foreach($details as $detail){
                                                            $image=$detail->Image1; 
                                                            $vehicleid=$detail->Vehicleid;
                                            ?>
                                            <tr>
                                                <td>
                                                    <!-- Result -->
                                                   <a href="<?php echo 'http://www.autotraders.ga/adpreview_ctrl/getad_preview/'.$vehicleid?>" class="car-image"><?php echo '<img src="http://www.autotraders.ga/images/Vehicleimages/' . $image . '" style="width:100px; height:70px;"/>';?></a>
                                                    <div class="search-find-results">
                                                        <h5><?php echo $detail->Brand . " " . $detail->Model . " " . $detail->Modelyear;?></a></h5> 
                                                        <ul class="inline">
                                                            <li><i class="fa fa-caret-right"> <?php echo $detail->VehicleCondition;?></i></li>
                                                            <li><i class="fa fa-caret-right"> <?php echo $detail->Mileage;?>KM</i></li>
                                                            <li><i class="fa fa-caret-right"> <?php echo $detail->Transmission;?></i></li>
                                                            <li><i class="fa fa-caret-right"> <?php echo $detail->Fueltype;?></i></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><span class="price">Rs.<?php echo $detail->Price;?></span></td>
                                                <td><span class="text-success">Created on<?php echo $detail->Timestamp;?></span><br/></td>
                                                <!--<td align="center">
                                                <?php
                                                    //$status=$detail->Status;
                                                    //if ($status=="Approved") { ?>
                                                        <span class="label label-success"></span></td>
                                                <?php    
                                                    //}
                                                    //else if ($status=="Pending") {
                                                    ?>
                                                        <span class="label label-warning"></span></td>    
                                                 <?php   
                                                    //}
                                                    //else {
                                                 ?>     <span class="label label-danger"></span></td>    
                                                 <?php
                                                    //}
                                                    ?>   
                                                </td> -->
                                                <td align="center">
                                            
                                                    <!--<a href="<?php //echo 'myads_ctrl/delete_myad/'.$vehicleid?>"><input type="button" class="btn-primary" value="Delete"></a>-->
                                                    <!--<button class="text-default" title="Archive"><i class="fa fa-archive"></i></button>  -->                                              
                                                    <button class="text-danger" title="Delete" onclick="return deleteconfirm();"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                               	</div>
                                <button class="btn btn-default btn-sm disabled">Delete Selected</button>
                            </div>
                       	</div>
                    </div>
                </div>
           	</div>
        </div>
   	</div>

     <script>
     function deleteconfirm()
    {
        job=confirm("Are you sure you want to delete this ad?");
        if (job!=true) {
          return false;
        }
    }
        $("#save").click(function() {
           var array=JSON.parse(getCookie("favList"));
            document.getElementById('savecar').href="http://www.autotraders.ga/saved_cars_ctrl/get_saved_cars/"+array;
        });


    </script>