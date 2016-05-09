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
                                    <li class="list-group-item active"> <span class="badge"><?php echo $this->session->userdata['savedsearch']; ?></span> <a href="http://www.autotraders.ga/saved_search_ctrl"><i class="fa fa-folder-o"></i> Saved Searches</a></li>
                                    <li class="list-group-item" id="save"> <span class="badge">2</span> <a id ="savecar" href="#"><i class="fa fa-star-o"></i> Saved Cars</a></li>
                                    <li class="list-group-item"> <a href="http://www.autotraders.ga/postad"><i class="fa fa-plus-square-o"></i> Create new Ad</a></li>
                                    <li class="list-group-item"> <span class="badge"><?php echo $this->session->userdata['ads']; ?></span> <a href="<?php echo 'http://www.autotraders.ga/my_ads_ctrl/get_my_ads/'.$this->session->userdata['logged_in']['email']?>"><i class="fa fa-edit"></i> Manage Ads</a></li>
                                    <li class="list-group-item"> <a href="http://www.autotraders.ga/MyProf/start"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li class="list-group-item"> <a href="http://www.autotraders.ga/Logout/out"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <h2>Saved Searches</h2>
                            <div id="success">
                            </div>
                            <div style="color:green">
                                <h4 align="center" style="color:green;background-color:#ffffff"><?php echo $this->session->flashdata('success_msg');?></h4>
                            </div>
                            <div class="dashboard-block">
                                <div class="table-responsive">
                                    <table class="table table-bordered dashboard-tables saved-searches-table">
                                        <thead>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>Criteria</td>
                                                <td>Details</td>
                                                <td>Receive alerts</td>
                                                <td>Timestamp</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($posts as $post) {
                                                    $searchid=$post->Searchid;
                                                    $make=$post->Brand;
                                                    $model=$post->Model;
                                                    $yearfrom=$post->Modelyearfrom;
                                                    $yearto=$post->Modelyearto;
                                                    $condition=$post->VehicleCondition;
                                                    $mileagefrom=$post->Mileagefrom;
                                                    $mileageto=$post->Mileageto;
                                                    $bodytype=$post->BodyType;
                                                    $transmisson=$post->Transmission;
                                                    $fueltype=$post->FuelType;
                                                    $capfrom=$post->EngineCapacityfrom;
                                                    $capto=$post->EngineCapacityto;
                                                    $pricemin=$post->PriceMin;
                                                    $pricemax=$post->PriceMax;
                                                    $status=$post->Status;
                                                    $district=$post->District;
                                                    $lastcheck=$post->LastCheck;
                                            ?>
                                            <tr>
                                                <td valign="middle"><input type="checkbox"></td>
                                                <!--<td><a href="#" class="search-name">Search name</a></td>-->
                                                <td>
                                                    <?php 
                                                        if($make!="Any")
                                                        {
                                                            echo 'Make : ';
                                                            echo '<br/>';
                                                        }
                                                        if(!empty($model))
                                                        {
                                                            echo 'Model : ';
                                                            echo '<br/>';
                                                        }
                                            
                                                        if((!empty($yearfrom))|| (!empty($yearto)))
                                                        {
                                                            echo 'Model year : ';
                                                            echo '<br/>';
                                                        }
                                                        
                                                        if($condition!="Any")
                                                        {
                                                            echo 'Vehicle Condition : ';
                                                            echo '<br/>';
                                                        }
                                                        if((!empty($mileagefrom))|| (!empty($mileageto)))
                                                        {
                                                            echo 'Mileage : ';
                                                            echo '<br/>';
                                                        }
                                                        if($bodytype!="Any")
                                                        {
                                                            echo 'Body Type : ';
                                                            echo '<br/>';
                                                        }
                                                        if($transmisson!="Any")
                                                        {
                                                            echo 'Transmission : ';
                                                            echo '<br/>';
                                                        }
                                                        if($fueltype!="Any")
                                                        {
                                                            echo 'Fuel Type : ';
                                                            echo '<br/>';
                                                        }
                                                        if((!empty($capfrom))|| (!empty($capto)))
                                                        {
                                                            echo 'Engine Capacity : ';
                                                            echo '<br/>';
                                                        }
                                                        if((!empty($pricemin))|| (!empty($pricemax)))
                                                        {
                                                            echo 'Price : ';
                                                            echo '<br/>';
                                                        }
                                                        if($district!="Any")
                                                        {
                                                            echo 'District : ';
                                                            echo '<br/>';
                                                        }

                                                    ?>
                                                </td>
                                                <td style="color:#000">
                                                    <?php
                                                        if($make!="Any")
                                                        {
                                                            echo $make;
                                                            echo '<br/>';
                                                        }

                                                        if(!empty($model))
                                                        {
                                                            echo $model;
                                                            echo '<br/>';
                                                        }
                                                        if((!empty($yearfrom))&&(empty($yearto)))
                                                        {
                                                            echo 'from '.$yearfrom;
                                                            echo ' to Any';
                                                            echo '<br/>';
                                                        }
                                                        if ((empty($yearfrom))&&(!empty($yearto))) {
                                                            echo 'from Any';
                                                            echo ' to '.$yearto;
                                                            echo '<br/>';
                                                        }
                                                        if($condition!="Any")
                                                        {
                                                            echo $condition;
                                                            echo '<br/>';
                                                        }

                                                        if((!empty($mileagefrom))&&(empty($mileageto)))
                                                        {
                                                            echo 'from '.$mileagefrom;
                                                            echo ' to Any KM';
                                                            echo '<br/>';
                                                        }

                                                        if ((empty($mileagefrom))&&(!empty($mileageto))) {
                                                            echo 'from Any';
                                                            echo ' to '.$mileageto.'KM';
                                                            echo '<br/>';
                                                        }
                                                        if($bodytype!="Any")
                                                        {
                                                            echo $bodytype;
                                                            echo '<br/>';
                                                        }
                                                        if($transmisson!="Any")
                                                        {
                                                            echo $transmisson;
                                                            echo '<br/>';
                                                        }
                                                        if($fueltype!="Any")
                                                        {
                                                            echo $fueltype;
                                                            echo '<br/>';
                                                        }
                                                        if((!empty($capfrom))&&(empty($capto)))
                                                        {
                                                            echo 'from '.$capfrom;
                                                            echo ' to Any CC';
                                                            echo '<br/>';
                                                        }

                                                        if ((empty($capfrom))&&(!empty($capto))) {
                                                            echo 'from Any';
                                                            echo ' to '.$capto.'CC';
                                                            echo '<br/>';
                                                        }

                                                        if((!empty($pricemin))&&(empty($pricemax)))
                                                        {
                                                            echo 'from Rs.'.$pricemin;
                                                            echo ' to Any';
                                                            echo '<br/>';
                                                        }
                                                        if ((empty($pricemin))&&(!empty($pricemax))) {
                                                            echo 'from Any';
                                                            echo ' to Rs.'.$pricemax;
                                                            echo '<br/>';
                                                        }
                                                        if($district!="Any")
                                                        {
                                                            echo $district;
                                                            echo '<br/>';
                                                        }

                                                    ?>
                                                </td>
                                                <td><a href="#"><select class="st form-control selectpicker input-sm" data-id="<?php echo $searchid;?>" onchange="getComboA(this)">
                                                    <?php if ($status=='Enable') {
                                                        # code...
                                                    ?>
                                                    <option value="Enable">Enable</option>
                                                    <option value="Disable">Disable</option>
                                                    <?php
                                                        }
                                                        else{
                                                    ?>
                                                    <option value="Disable">Disable</option>
                                                    <option value="Enable">Enable</option>
                                                    <?php
                                                        }
                                                        ?>
                                                </select></a></td>
                                                <td><span class="text-success">Saved on </span><?php echo $lastcheck?></td>
                                                <td align="center"><a href="<?php echo 'http://www.autotraders.ga/saved_search_ctrl/delete_saved_search/'.$searchid?>"><button class="text-danger" title="Delete" onclick="return deleteconfirm();"><i class="fa fa-times"></i></button></a></td>
                                            </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php if(empty($posts))
                                                {
                                                    echo '<div style="color:#999">';
                                                    echo '<h3 align="center" style="color:#999;background-color:#ffffff">No Saved Searches</h3>';
                                                    echo '</div>';
                                                }?>
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
    <script>
        function deleteconfirm()
        {
            job=confirm("Are you sure you want to delete this saved search?");
            if (job!=true) {
              return false;
            }
        }
        function getComboA(sel) {

            document.getElementById('preloader').style.visibility="visible";
            var value = sel.value;
            var searchid = $(sel).attr("data-id");

            console.log(searchid);
            var url="changeStatus";
            var data = new FormData();
            data.append('value', value);
            data.append('searchid',searchid);

            $.ajax({
            url: url,
            type:"post",
            data: data,
            dataType:"JSON",
            processData: false,
            contentType: false,
              success: function (text) {
                console.log("Success");
                
                var json = JSON.stringify(text), obj = JSON.parse(json);

              }, 
              error: function(text) {
                  if (data.status === 422) {
                    alert("Something went wrong. Please try again!");
                  } else {
                    document.getElementById('preloader').style.visibility="hidden";
                    document.getElementById('success').innerHTML ='<h4 align="center" style="color:green;background-color:#ffffff">Status has been changed</h4>';
                  }
              }
            }); //AJAX End
        }

        $("#save").click(function() {
           var array=JSON.parse(getCookie("favList"));
            document.getElementById('savecar').href="http://www.autotraders.ga/saved_cars_ctrl/get_saved_cars/"+array;
        });

    </script>