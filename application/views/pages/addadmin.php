
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
                <div style="color:green">
                <h4 align="center" style="color:green;background-color:#ffffff"><?php echo $this->session->flashdata('success_msg');?></h4>
            	</div>
                <div class="row">
                    <div class="col-md-4">
                    	<section class="signup-form sm-margint">
                            <form method="post" action="<?php echo base_url();?>admin_ctrl/insert_into_admin">
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
                                    <input type="text" id="name" name="name" value='<?php echo set_value("name"); ?>' class="form-control" placeholder="Name">
                                    <input type="email" id="email" name="email" value='<?php echo set_value("email"); ?>' class="form-control" placeholder="E-mail">
                                    <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Password"/>
                                    <input type="password" id="cpwd" name="cpwd" class="form-control" placeholder="Confirm Password"/>
                                    <div class="spacer-20"></div>
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Add Admin">
                                </div>
                            </form>
                        </section>
                    </div>
                    <div class="table-responsive">
                        <!-- Administrator table -->
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
                                <?php foreach ($admins as $admin) {?>
                                <tr style="height:30px">
                                    <td><?php echo $admin->Name?></td>
                                    <td><?php echo $admin->Email?></td>
                                    <td><?php echo $admin->Password?></td>
                                    <?php
                                        $email=$admin->Email;
                                    ?>
                                    <!--<td><a href="<?php //echo 'admin_ctrl/delete_admin/'.$email?>"><input type="button" class="btn-primary" value="Delete"></a></td>-->
                                    <td align="center"><a href="<?php echo 'http://www.autotraders.ga/admin_ctrl/get_admin/'.$admin->Email?>"><input type="button" class="btn-primary" value="Edit"></a>
                                    <a href="<?php echo 'http://www.autotraders.ga/admin_ctrl/delete_admin/'.$email?>"><button class="text-danger" title="Delete" onclick="return deleteconfirm();"><i class="fa fa-times"></i></button></a></td>
                                </tr>
                            </tbody>
                                <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->

    <script type="text/javascript">
        function deleteconfirm()
        {
            job=confirm("Are you sure you want to delete this admin?");
            if (job!=true) {
            return false;
            }
        }
    </script>