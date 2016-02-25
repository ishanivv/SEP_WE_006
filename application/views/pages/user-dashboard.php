<?php $_SESSION['ads']=count($posts) ?>
<div class="main" role="main" style="background-color:#ffffff">
    	<div id="content" class="content full dashboard-pages">
        	<div class="container">
            	<div class="dashboard-wrapper">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 users-sidebar-wrapper">
                            <!-- SIDEBAR -->
                            <div class="users-sidebar tbssticky">
                            	<a href="user-dashboard.html" class="btn btn-block btn-primary add-listing-btn">New Ad listing</a>
                                <ul class="list-group">
                                    <li class="list-group-item active"> <span class="badge">5</span> <a href="user-dashboard.html"><i class="fa fa-home"></i> Dashboard</a></li>
                                    <li class="list-group-item"> <span class="badge">5</span> <a href="user-dashboard-saved-searches.html"><i class="fa fa-folder-o"></i> Saved Searches</a></li>
                                    <li class="list-group-item"> <span class="badge">12</span> <a href="user-dashboard-saved-cars.html"><i class="fa fa-star-o"></i> Saved Cars</a></li>
                                    <li class="list-group-item"> <a href="add-listing-form.html"><i class="fa fa-plus-square-o"></i> Create new Ad</a></li>
                                    <li class="list-group-item"> <span class="badge"><?php echo $_SESSION['ads']; ?></span> <a href="<?php echo 'http://localhost/ci/myads_ctrl/getmyads/'.$_SESSION['email']?>"><i class="fa fa-edit"></i> Manage Ads</a></li>
                                    <li class="list-group-item"> <a href="http://localhost/ci/NewPassword"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li class="list-group-item"> <a href="user-dashboard-settings.html"><i class="fa fa-cog"></i> Account Settings</a></li>
                                    <li class="list-group-item"> <a href="javascript:void(0)"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                        	<h2>Dashboard</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                            <div class="dashboard-block">
                            	<div class="dashboard-block-head">
                                	<a href="user-dashboard-saved-cars.html" class="btn btn-default btn-sm pull-right">See all Ads (2)</a>
                            		<h3>My Ads</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered dashboard-tables saved-cars-table">
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
                                                <td><span class="text-success">Created on</span><?php echo $post->Timestamp;?></td>
                                                <td align="center">
                                                    <?php
                                                    $status=$post->Status;
                                                    if ($status=="Approved") { ?>
                                                        <span class="label label-success"><?php echo $status;?></span></td>
                                                <?php    
                                                    }
                                                    else{?>
                                                        <span class="label label-warning"><?php echo $status;?></span></td>    
                                                 <?php   
                                                    }
                                                 ?>
                                                <td align="center">
                                                    <a href="<?php echo 'myads_ctrl/edit_myad/'.$vehicleid?>"><input type="button" class="btn-primary" title="Edit" value="Edit"></a>
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
                            <div class="dashboard-block">
                            	<div class="dashboard-block-head">
                                	<a href="user-dashboard-saved-cars.html" class="btn btn-default btn-sm pull-right">See all cars (12)</a>
                            		<h3>Saved Cars</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered dashboard-tables saved-cars-table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>Description</td>
                                                <td>Price/Status</td>
                                                <td>Timestamp</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td valign="middle"><input type="checkbox"></td>
                                                <td>
                                                    <!-- Result -->
                                                    <a href="vehicle-details.html" class="car-image"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="search-find-results">
                                                        <h5><a href="vehicle-details.html">2010 BMW 125i E82 Coupe 2dr Auto 6sp 3.0i [MY10]</a></h5>
                                                        <ul class="inline">
                                                            <li>2 door Coupe</li>
                                                            <li>6 cyl, 3.0 L Petrol</li>
                                                            <li>6 speed Automatic</li>
                                                            <li>Rear Wheel Drive</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><span class="price">$40,990</span></td>
                                                <td><span class="text-success">Saved on</span> 09/12/14 @ 12:09am</td>
                                                <td align="center"><button class="text-danger"><i class="fa fa-times"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td valign="middle"><input type="checkbox"></td>
                                                <td>
                                                    <!-- Result -->
                                                    <a href="vehicle-details.html" class="car-image"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="search-find-results">
                                                        <h5><a href="vehicle-details.html">2010 BMW 125i E82 Coupe</a></h5>
                                                        <ul class="inline">
                                                            <li>2 door Coupe</li>
                                                            <li>6 cyl, 3.0 L Petrol</li>
                                                            <li>6 speed Automatic</li>
                                                            <li>Rear Wheel Drive</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><span class="price">$40,990</span></td>
                                                <td><span class="text-success">Saved on</span> 08/12/14 @ 12:09am</td>
                                                <td align="center"><button class="text-danger"><i class="fa fa-times"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td valign="middle"><input type="checkbox"></td>
                                                <td>
                                                    <!-- Result -->
                                                    <a href="vehicle-details.html" class="car-image"><img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""></a>
                                                    <div class="search-find-results">
                                                        <h5><a href="vehicle-details.html">2010 BMW 125i E82 Coupe 2dr Auto 6sp 3.0i</a></h5>
                                                        <ul class="inline">
                                                            <li>2 door Coupe</li>
                                                            <li>6 cyl, 3.0 L Petrol</li>
                                                            <li>6 speed Automatic</li>
                                                            <li>Rear Wheel Drive</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><span class="price">$40,990</span></td>
                                                <td><span class="text-success">Saved on</span> 06/12/14 @ 12:09am</td>
                                                <td align="center"><button class="text-danger"><i class="fa fa-times"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                               	</div>
                                <button class="btn btn-default btn-sm disabled">Delete Selected</button>
                                <button class="btn btn-default btn-sm disabled">Compare Selected</button>
                            </div>
                            <div class="dashboard-block">
                            	<div class="dashboard-block-head">
                                	<a href="user-dashboard-saved-cars.html" class="btn btn-default btn-sm pull-right">See all searches (5)</a>
                            		<h3>Saved Searches</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered dashboard-tables saved-searches-table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>Custom search name</td>
                                                <td>Details</td>
                                                <td>Receive alerts</td>
                                                <td>Timestamp</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td valign="middle"><input type="checkbox"></td>
                                                <td><a href="#" class="search-name">Search name</a></td>
                                                <td>Donec facilisis fermentum sem, ac viverra ante luctus vel.</td>
                                                <td><a href="#"><select class="form-control selectpicker input-sm"><option>Enable</option><option>Disable</option></select></a></td>
                                                <td><span class="text-success">Saved on</span> 04/11/14 @ 12:09am</td>
                                                <td align="center"><button class="text-danger"><i class="fa fa-times"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td valign="middle"><input type="checkbox"></td>
                                                <td><a href="#" class="search-name">Search name</a></td>
                                                <td>&nbsp;</td>
                                                <td><a href="#"><select class="form-control selectpicker input-sm"><option>Enable</option><option>Disable</option></select></a></td>
                                                <td><span class="text-success">Saved on</span> 04/11/14 @ 12:09am</td>
                                                <td align="center"><button class="text-danger"><i class="fa fa-times"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td valign="middle"><input type="checkbox"></td>
                                                <td><a href="#" class="search-name">Search name</a></td>
                                                <td>Donec facilisis fermentum sem, ac viverra ante luctus vel.</td>
                                                <td><a href="#"><select class="form-control selectpicker input-sm"><option>Enable</option><option>Disable</option></select></a></td>
                                                <td><span class="text-success">Saved on</span> 04/11/14 @ 12:09am</td>
                                                <td align="center"><button class="text-danger"><i class="fa fa-times"></i></button></td>
                                            </tr>
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
    <!-- End Body Content -->