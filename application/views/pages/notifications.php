<!-- Start Body Content -->
  <div class="page-header parallax" style="background-image:url(http://localhost/ci/images/black_infiniti.jpg); height:300px"></div>	
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
            	<div class="results-container">
            	<div id="results-holder" class="results-list-view" style="padding-left:10px">
				<h4>Pending Ads</h4>
				<div style="color:green">
                <h4 align="center" style="color:green;background-color:#ffffff"><?php echo $this->session->flashdata('success_msg');?></h4>
            	</div>
				<?php
					$offset=$this->uri->segment(3,0)+1;
					foreach($posts as $post){?>
						<div style="width: 915px;height: 200px;float: left;background-color:#fff;opacity:0.9;border-color:#cc3e19;border-style:solid;margin-bottom:30px">
						<div style="width: 200px;height: 150px;float: left;padding: 20px">
							<?php $image=$post->Image1; 
								  $vehicleid=$post->Vehicleid;
								  $email=$post->Email;
							echo '<img src="http://localhost/ci/images/Vehicleimages/' . $image . '" style="width:200px; height:150px;"/>';?>
						</div>
						<div style="width: 700px;height: 200px;float: left;margin:0;padding-left: 10px">
							<div style="width: 703px;height:26px;float:left;background-color:#cc3e19;border-radius:3px;color:#ffffff;top:0;padding-left:5px">
							<?php echo $post->Brand . " " . $post->Model . " " . $post->Modelyear;?>
							</div>
							<div style="width:180px;height:150px;float: left">
							<p style="color:#000">Brand: <?php echo $post->Brand;?></p>
							<p style="color:#000"><b>MODEL : </b><?php echo $post->Model;?></p>
							<p style="color:#000"><b>MODEL YEAR : </b><?php echo $post->Modelyear;?></p>
							<p style="color:#000"><b>CONDITION : </b><?php echo $post->VehicleCondition;?></p>
							</div>
							<div style="width:200px;height:150px;float: left">
							<p style="color:#000"><b>MILEAGE : </b><?php echo $post->Mileage;?>KM</p>
							<p style="color:#000"><b>TRANSMISSION: </b><?php echo $post->Transmission;?></p>
							<p style="color:#000"><b>FUEL TYPE: </b><?php echo $post->Fueltype;?></p>
							</div>
							<div style="width:250px;height:100px;float:left;padding:5px">
							<h4 style="width:105px;background-color:#66b2ff;color:#fff;padding:5px;font-size:16px;border-radius:3px"><b>Rs. </b><?php echo $post->Price;?></h4>
							</div>
							<div>
							<a href="<?php echo 'adpreview_ctrl/getad_preview_notify/'.$vehicleid?>"><input type="button" value="View" class="btn-primary"></a>
							<a href="<?php echo 'http://localhost/ci/approve_ctrl/approve/'.$vehicleid.'/'.$email?>"><input type="button" value="Approve" class="btn-primary" onclick="return approveconfirm();"></a>
							<a href="<?php echo 'approve_ctrl/get_reason/'.$vehicleid?>"><input type="button" value="Reject" class="btn-primary" onclick="return rejectconfirm();"></a>
							</div>
						</div>
						</div>
				<?php }?>
				</div>
				</div>
				<div><?php echo $page_links; ?></div>
				</div>

			</div>
		</div>
	</div>

	<script type="text/javascript">
    function approveconfirm()
    {
        job=confirm("Are you sure you want to approve this advertisement?");
        if (job!=true) {
        	return false;
        }
    }

    function rejectconfirm()
    {
        job=confirm("Are you sure you want to reject this advertisement?");
        if (job!=true) {
        	return false;
        }
    }
</script>