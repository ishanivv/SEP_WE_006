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
                                    <li class="list-group-item"> <span class="badge"><?php echo $this->session->userdata['savedsearch']; ?></span> <a href="user-dashboard-saved-searches.html"><i class="fa fa-folder-o"></i> Saved Searches</a></li>
                                    <li class="list-group-item" id="save"> <span class="badge">2</span> <a id ="savecar" href="#"><i class="fa fa-star-o"></i> Saved Cars</a></li>
                                    <li class="list-group-item"> <a href="http://www.autotraders.ga/postad"><i class="fa fa-plus-square-o"></i> Create new Ad</a></li>
                                    <li class="list-group-item"> <span class="badge"><?php echo $this->session->userdata['ads']; ?></span> <a href="<?php echo 'http://www.autotraders.ga/my_ads_ctrl/get_my_ads/'.$this->session->userdata['logged_in']['email']?>"><i class="fa fa-edit"></i> Manage Ads</a></li>
                                    <li class="list-group-item active"> <a href="http://www.autotraders.ga/MyProf/start"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li class="list-group-item"> <a href="http://www.autotraders.ga/Logout/out"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                        	<h2>My Profile</h2>
                            <div class="dashboard-block">
                                <div class="tabs profile-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"> <a data-toggle="tab" href="#personalinfo" aria-controls="personalinfo" role="tab">Personal Info</a></li>
                                        <!--<li> <a data-toggle="tab" href="#changepassword" aria-controls="changepassword" role="tab">Change Password</a></li>
                                        <li> <a data-toggle="tab" href="#activitylog" aria-controls="activitylog" role="tab">Activity Log</a></li>-->
                                    </ul>
                                        <div class="tab-content">
                                            <!-- PROFIE PERSONAL INFO -->
                                            <div id="personalinfo" class="tab-pane fade active in">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <form method="post" action="http://www.autotraders.ga/MyProf/mp">
                                                        <?php
                                                        if(isset($message))
                                                        {
                                                            echo $message;
                                                        }
                                                        $CI =& get_instance();
                                                        $CI->load->library('form_validation');
                                                        echo validation_errors();
                                                        
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <label>Profile Photo</label>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <?php
                                                                if(empty($logo))
                                                                {
                                                                    echo '<img src="http://www.autotraders.ga/images/logos/default-user.png" style="width:150px; height:150px;"/>';   
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="http://www.autotraders.ga/images/logos/' . $logo . '" style="width:150px; height:150px;"/>';
                                                                }

                                                                ?>
                                                                <!--<button class="btn btn-primary">Update Picture</button>-->
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            	<label>Name</label>
                                                                <input type="text" class="form-control" placeholder="" disabled="true" value="<?php echo $name;?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Email</label>
                                                                <input type="text" class="form-control" placeholder="mail@example.com" disabled="true" value="<?php echo $this->session->userdata['logged_in']['email'];?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            	<label>Phone</label>
                                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="000-00-0000" value="<?php echo $phone?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Change role</label>
                                                                <select class="form-control" name="type">
                                                                    <?php 
                                                                        $type = ($this->session->userdata['type']);
                                                                        if($type=="Private")
                                                                        {
                                                                    ?>
                                                                    <option value="Private">Private</option>
                                                                    <option value="Business">Business</option>
                                                                    <?php
                                                                        }
                                                                        else if($type=="Business")
                                                                        {
                                                                    ?>
                                                                    <option value="Business">Business</option>
                                                                    <option value="Private">Private</option>
                                                                    <?php
                                                                        }
                                                                        else
                                                                        {
                                                                    ?>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Business">Business</option>
                                                                    <option value="Private">Private</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <button type="submit" class="btn btn-info">Update details</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="spacer-20"></div>
                                            <h3>Change Password</h3>
                                            <!-- PROFIE CHANGE PASSWORD -->
                                            <div>
                                            	<div class="row">
                                                    <div class="col-md-8">
                                                    <form method="post" action="http://www.autotraders.ga/New_Password">
                                                    <!--<?php
                                                        /*if(isset($message))
                                                        {
                                                            echo $message;
                                                        }
                                                        $CI =& get_instance();
                                                        $CI->load->library('form_validation');
                                                        echo validation_errors();*/
                                                    ?>-->
                                                        <!--<div class="row">
                                                            <div class="col-md-6">
                                                        		<label>New password</label>
                                                                <input type="password" class="form-control" name="password" id="password" placeholder="">
                                                            </div>
                                                            <div class="col-md-6">
                                                        		<label>Confirm new password</label>
                                                                <input type="password" class="form-control" name="confirmPassword" placeholder="">
                                                            </div>
                                                        </div>-->
                                                        <button type="submit" class="btn btn-info" id="submit">Change Password</button>
                                                    </form>
                                                  	</div>
                                               	</div>
                                            </div>
                                            <div class="spacer-20"></div>
                                            <h3>Activity Log</h3>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <form method="post" action="http://www.autotraders.ga/ActivityLog/actLog">
                                                            <button type="submit" class="btn btn-info">Activity Log</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>     
                                </div>
                            </div>
                       	</div>
                    </div>
                </div>
           	</div>
        </div>
   	</div>
    <script>
        $("#save").click(function() {
           var array=JSON.parse(getCookie("favList"));
            document.getElementById('savecar').href="http://www.autotraders.ga/saved_cars_ctrl/get_saved_cars/"+array;
        });


    </script>