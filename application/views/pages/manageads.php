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
                                    <li class="list-group-item"> <span class="badge">5</span> <a href="<?php echo 'http://localhost/ci/dashboard_ctrl/load_my_ads/'.$this->session->userdata['logged_in']['email']?>"><i class="fa fa-home"></i> Dashboard</a></li>
                                    <li class="list-group-item"> <span class="badge">5</span> <a href="user-dashboard-saved-searches.html"><i class="fa fa-folder-o"></i> Saved Searches</a></li>
                                    <li class="list-group-item"> <span class="badge">12</span> <a href="user-dashboard-saved-cars.html"><i class="fa fa-star-o"></i> Saved Cars</a></li>
                                    <li class="list-group-item"> <a href="add-listing-form.html"><i class="fa fa-plus-square-o"></i> Create new Ad</a></li>
                                    <li class="list-group-item active"> <span class="badge"><?php echo $this->session->userdata['logged_in']['ads']; ?></span> <a href="<?php echo 'http://localhost/ci/my_ads_ctrl/get_my_ads/'.$this->session->userdata['logged_in']['email']?>"><i class="fa fa-edit"></i> Manage Ads</a></li>
                                    <li class="list-group-item"> <a href="http://localhost/ci/New_Password"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li class="list-group-item"> <a href="user-dashboard-settings.html"><i class="fa fa-cog"></i> Account Settings</a></li>
                                    <li class="list-group-item"> <a href="http://localhost/ci/Logout/out"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                        	<h2>Manage Ads</h2>
                            <div class="dashboard-block">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive dashboard-tables saved-cars-table">
                                        <thead>
                                            <tr>
                                                
                                                <td>Description</td>
                                                <td>Price</td>
                                                <td>Timestamp</td>
                                                <td>Status</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                        foreach($posts as $post){
                                                            $image=$post->Image1; 
                                                            $vehicleid=$post->Vehicleid;
                                            ?>
                                            <tr>
                                                <td>
                                                    <!-- Result -->
                                                    <a href="<?php echo 'http://localhost/ci/adpreview_ctrl/getad_preview/'.$vehicleid?>" class="car-image"><?php echo '<img src="http://localhost/ci/images/' . $image . '" style="width:100px; height:70px;"/>';?></a>
                                                    <div class="search-find-results">
                                                        <h5><a href="<?php echo 'http://localhost/ci/adpreview_ctrl/getad_preview/'.$vehicleid?>"><?php echo $post->Brand . " " . $post->Model . " " . $post->Modelyear;?></a></h5>
                                                        <ul class="inline">
                                                            <li><i class="fa fa-caret-right"> <?php echo $post->VehicleCondition;?></i></li>
                                                            <li><i class="fa fa-caret-right"> <?php echo $post->Mileage;?>KM</i></li>
                                                            <li><i class="fa fa-caret-right"> <?php echo $post->Transmission;?></i></li>
                                                            <li><i class="fa fa-caret-right"> <?php echo $post->Fueltype;?></i></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><span class="price">Rs.<?php echo $post->Price;?></span></td>
                                                <td><span class="text-success">Created on </span><br/><?php echo $post->Timestamp;?></td>
                                                <td align="center">
                                                <?php
                                                    $status=$post->Status;
                                                    if ($status=="Approved") { ?>
                                                        <span class="label label-success"><?php echo $status;?></span></td>
                                                <?php    
                                                    }
                                                    else if ($status=="Pending") {
                                                    ?>
                                                        <span class="label label-warning"><?php echo $status;?></span></td>    
                                                 <?php   
                                                    }
                                                    else {
                                                 ?>     <span class="label label-danger"><?php echo $status;?></span></td>    
                                                 <?php
                                                    }
                                                    ?>   
                                                <td align="center">
                                                    <a href="<?php echo 'http://localhost/ci/editad_ctrl/show_myad/'.$vehicleid?>"><input type="button" class="btn-primary" title="Edit" value="Edit"></a>
                                                    <!--<a href="<?php //echo 'myads_ctrl/delete_myad/'.$vehicleid?>"><input type="button" class="btn-primary" value="Delete"></a>-->
                                                    <!--<button class="text-default" title="Archive"><i class="fa fa-archive"></i></button>  -->                                              
                                                    <button class="text-danger" title="Delete"><i class="fa fa-times"></i></button>
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