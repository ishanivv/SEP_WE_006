<!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <div style="color:green">
                        <h4 align="center" style="color:green;background-color:#ffffff"><?php echo $this->session->flashdata('success_msg');?></h4>
                    </div>
                    <div class="table-responsive">
                        <!-- FeedBack table -->
                        <table class="table table-bordered table-responsive dashboard-tables saved-cars-table">
                            <col style="width:10%">
                            <col style="width:10%">
                            <col style="width:20%">
                            <col style="width:20%">
                            <col style="width:15%">
                            <col style="width:20%">
                            <thread>    
                                <tr>
                                    <th><h4>Name</h4></th>
                                    <th><h4>E-mail</h4></th>
                                    <th><h4>Message</h4></th>
                                    <th><h4>Received on</h4></th>
                                    <th><h4>Status</h4></th>  
                                    <th><h4>Actions</h4></th>  
                                </tr>
                            </thread>
                            <tbody>
                                <?php foreach ($adminfeeds as $adminfeed){?>
                                <tr>
                                    <?php $adminfeed->Feedbackid?>
                                    <td><?php echo $adminfeed->Name?></td>
                                    <td><?php echo $adminfeed->Email?></td>
                                    <td><?php echo $adminfeed->Message?></td>
                                    <td><?php echo $adminfeed->Timestamp?></td>
                                    <?php
                                        $feedbackid=$adminfeed->Feedbackid;
                                    ?>
                                    
                                    <td>
                                        <?php
                                            $status=$adminfeed->Status;
                                            $feedbackid=$adminfeed->Feedbackid;

                                            if ($status=="Checked") {?>
                                                <input type="button" class="btn-success" value="<?php echo $adminfeed->Status ?>" disabled>     
                                        <?php }
                                            else {
                                        ?>
                                        <a href="<?php echo 'http://www.autotraders.ga/admin_feedback_ctrl/change_feedback_status/'.$feedbackid ?>"><input type="button" class="btn-primary" value="<?php echo $adminfeed->Status ?>" onclick="this.disabled=true;this.value='Checked';this.class='btn-success'"></a>
                                        <?php } 
                                        ?>
                                    </td>
                                    <td align="center">
                                    <a href="<?php echo 'http://www.autotraders.ga/admin_feedback_ctrl/get_feedback_view/'.$feedbackid?>"><input type="button" class="btn-primary" value="View"></a>
                                    <a href="<?php echo 'http://www.autotraders.ga/admin_feedback_ctrl/get_feedback_email/'.$feedbackid?>"><input type="button" class="btn-primary" value="Reply"></a>
                                    <a href="<?php echo 'http://www.autotraders.ga/admin_feedback_ctrl/delete_feedback/'.$feedbackid ?>"><button class="text-danger" title="Delete" onclick="return deleteconfirm();"><i class="fa fa-times"></i></button></a></td>
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
        job=confirm("Are you sure you want to delete this message?");
        if (job!=true) {
          return false;
        }
    }
    </script>