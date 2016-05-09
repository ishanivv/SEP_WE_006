<!-- Start Body Content -->
  <div class="page-header parallax" style="background-image:url(http://localhost/ci/images/black_infiniti.jpg); height:300px"></div>	
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
            	<div class="results-container">
				<h3>Recent activities</h3>
				<?php
					$rowCount = count($activities);
					$row=0;
					while($row<$rowCount)
					{
						$activityDescription = $activities[$row][2];
						$dateAndTime = $activities[$row][4];
						$uRL = $activities[$row][3];
						echo '<div style="width: 915px;height: 65px;float: left;background-color:#fff;opacity:0.9;border-color:#cc3e19;border-style:solid;margin-bottom:30px"><center><p style="align:center">';
						echo '<br/>You have <a href="'.$uRL.'">';
						echo $activityDescription.'</a>';
						echo ' on '.$dateAndTime.'';
						echo '</p></center></div>';
						$row++;
					}
				?>
				</div>

				</div>
			</div>
		</div>
	</div>