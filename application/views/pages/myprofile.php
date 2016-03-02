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
                                    <li class="list-group-item"> <span class="badge"><?php echo $this->session->userdata['logged_in']['ads']; ?></span> <a href="<?php echo 'my_ads_ctrl/get_my_ads/'.$this->session->userdata['logged_in']['email']?>"><i class="fa fa-edit"></i> Manage Ads</a></li>
                                    <li class="list-group-item active"> <a href="http://localhost/ci/New_Password"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li class="list-group-item"> <a href="user-dashboard-settings.html"><i class="fa fa-cog"></i> Account Settings</a></li>
                                    <li class="list-group-item"> <a href="http://localhost/ci/Logout/out"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                        	<h2>My Profile</h2>
                            <div class="dashboard-block">
                                <div class="tabs profile-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"> <a data-toggle="tab" href="#personalinfo" aria-controls="personalinfo" role="tab">Personal Info</a></li>
                                        <li> <a data-toggle="tab" href="#changepassword" aria-controls="changepassword" role="tab">Change Password</a></li>
                                    </ul>
                                        <div class="tab-content">
                                            <!-- PROFIE PERSONAL INFO -->
                                            <div id="personalinfo" class="tab-pane fade active in">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <form>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            	<label>First name*</label>
                                                                <input type="text" class="form-control" placeholder="" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                            	<label>Last name</label>
                                                                <input type="text" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            	<label>Email*</label>
                                                                <input type="text" class="form-control" placeholder="mail@example.com" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                            	<label>Phone</label>
                                                                <input type="text" class="form-control" placeholder="000-00-0000">
                                                            </div>
                                                        </div>
                                                        
                                                        <h3>Security Question</h3>
                            							<div class="lighter"><p>Please choose a security question so we can better identify you if you forget your password, or in regard to your ad.</p></div>
                                                        <label>Question</label>
                                                        <select name="Security Questions" class="form-control selectpicker">
                                                            <option selected>What is your maiden name?</option>
                                                            <option selected>What is your pet's name?</option>
                                                            <option selected>What is your first school name?</option>
                                                            <option selected>What is your place of birth name?</option>
                                                            <option selected>Who is your favourite actor?</option>
                                                       	</select>
                                                        <label>Answer</label>
                                                        <input type="password" class="form-control">
                                                        <button type="submit" class="btn btn-info">Update details</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            <!-- PROFIE CHANGE PASSWORD -->
                                            <div id="changepassword" class="tab-pane fade">
                                            	<div class="row">
                                                    <div class="col-md-8">
                                                    <form method="post" action="http://localhost/ci/New_Password/newp">
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
                                                        		<label>Old Password</label>
                                                                <input type="password" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                        		<label>New password</label>
                                                                <input type="password" class="form-control" name="password" id="password" placeholder="">
                                                            </div>
                                                            <div class="col-md-6">
                                                        		<label>Confirm new password</label>
                                                                <input type="password" class="form-control" name="confirmPassword" placeholder="">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-info" id="submit">Change Password</button>
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