
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-4">
                    	<section class="signup-form sm-margint">
                            <?php
                                foreach ($admin as $detail) {
                                    $name=$detail->Name;
                                    $email=$detail->Email;
                                    $password=$detail->Password;

                                }
                            ?>
                            <form method="post" action="<?php echo 'http://localhost/ci/admin_ctrl/edit_admin/'.$email?>">
                            	<!-- Regular Signup -->
                                <div class="regular-signup">
                        			<h3>Manage Administrators</h3>
                                    <div style="color:red">
                                    <?php
                                        $CI =& get_instance();
                                        $CI->load->library('form_validation');
                                        echo validation_errors();
                                    ?>
                                    </div>
                                    <input type="text" id="name" name="name" value='<?php echo $name; ?>' class="form-control" placeholder="Name">
                                    <input type="email" id="email" name="email" value='<?php echo $email; ?>' class="form-control" placeholder="E-mail" disabled>
                                    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password"/>
                                    <input type="password" id="cpwd" name="cpwd" class="form-control" placeholder="Confirm Password"/>
                                    <div class="spacer-20"></div>
                                    <input type="submit" class="btn btn-primary" value="Edit Admin">
                                    <a href="http://localhost/ci/admin_table_ctrl"><input type="button" class="btn btn-primary" value="Cancel"></a>
                                </div>
                            </form>
                        </section>
                    </div>
                        <!-- Administrator table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive dashboard-tables saved-cars-table">
                            <thread>    
                                <tr>
                                    <th><h4>Admin Name</h4></th>
                                    <th><h4>E-mail</h4></th>
                                    <th><h4>Password</h4></th>
                                    <th><h4>Actions</h4></th>    
                                </tr>
                            </thread> 
                            <tbody>   
                                <tr style="height:30px">
                                    <td><?php echo $name?></td>
                                    <td><?php echo $email?></td>
                                    <td><?php echo $password?></td>
                                    <td align="center"><a href="<?php echo 'http://localhost/ci/admin_ctrl/get_admin/'.$email?>"><input type="button" class="btn-primary" value="Edit"></a>
                                    <a href="<?php echo 'http://localhost/ci/admin_ctrl/delete_admin/'.$email?>"><button class="text-danger" title="Delete"><i class="fa fa-times"></i></button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->