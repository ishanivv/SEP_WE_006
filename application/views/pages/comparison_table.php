<div class="main" role="main" style="background-color:#ffffff">
	<div id="content" class="content full">
		<div class="container">
			<!--<div class="comparision-table-resp">-->
				<div class="row">
				<h2>Comparison Table</h2>
					
					<table style="table-layout:fixed;border-collapse:collapse;border-spacing:0">
						<tbody style="display:table-row-group;vertical-align:middle;border-color:grey">
							<tr style="display:table-row">
								<td valign="top" width="115px">
									<table style="width:100%;table-layout:fixed;border-collapse:collapse;border-spacing:0">
										<tbody style="display:table-row-group;vertical-align:middle;border-color:grey">
											<tr class="header">
												<td class="item name" style="height:110px">Picture</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Title</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Body Type</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Mileage</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Price</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Transmission</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Fuel Type</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Engine Capacity</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Condition</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Model Year</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name" style="height:100px">Description</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">District</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Location</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">Phone</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
											<tr class="header">
												<td class="item name">E-mail</td>
											</tr>
											<tr>
												<td class="divider"></td>
											</tr>
										</tbody>
									</table>
								</td>
								<td valign="top" class="field-content">
									<div class="scroll">
										<table style="width:100%;table-layout:fixed;border-collapse:collapse;border-spacing:0">
											<tbody style="display:table-row-group;vertical-align:middle">
												<tr class="in">
												<?php
													foreach ($posts as $post) {
														$image=$post->Image1;
														$vehicleid=$post->Vehicleid;
												?>
													<td class="item">
														<div class="preview">
															<?php echo '<img src="http://www.autotraders.ga/images/Vehicleimages/' . $image . '" style="width:120px; height:90px;"/>'; ?>
															<a><div class="removefromView" data-id="<?php echo $vehicleid?>" style="float:right"><i class="fa fa-trash"></i></div></a>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Brand . " " . $post->Model . " " . $post->Modelyear;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->BodyType;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Mileage;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Price;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Transmission;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Fueltype;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->EngineCapacity;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->VehicleCondition;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Modelyear;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item" style="height:100px">
														<div class="preview">
															<?php echo $post->Description;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->District;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Location;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Phone;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
												<tr class="in">
												<?php
													foreach ($posts as $post) {
												?>
													<td class="item">
														<div class="preview">
															<?php echo $post->Email;?>
														</div>
													</td>
												<?php
													}
												?>
												</tr>
												<tr>
													<td class="divider"></td>
												</tr>
											</tbody>
										</table>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			<!--</div>-->
		</div>
	</div>	
</div>
<script>
	//function removefromview(){
        //$("a").live({click:function(){
        $(".removefromView").click(function() {
            job=confirm("Are you sure you want to remove this vehicle from compare list?");
            if (job!=true) {
                return false;
            }

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
                window.location.href = "http://www.autotraders.ga/compare_ctrl/get_compare_details/"+array;
        });
</script>