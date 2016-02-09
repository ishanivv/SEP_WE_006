<div align="center">
	<form action="<?php echo base_url();?>postad" method="post" name="myform1">

		
			<h1><b>Select a category and a City </b></h1>

			<table class="spacingTable" width="600">
				<tr>
					<td><label name="category">Category</label></td>
					<td>
					<select id="place" name="Category">
						<option value="select">Please select a Category</option>
						<option value="Cars">Cars</option>
						<option value="Motorbikes & Scooters">Motorbikes and Scooters</option>
						<option value="Three Wheelers">Three Wheelers</option>
						<option value="Vans & Busses">Vans and Busses</option>
						<option value="Heavy-Duty vehicles">Heavy-Duty vehicles</option>

					</select></td>
				</tr>

				<tr>

					<td><label name="City">City</label></td>
					<td>
					<input type="text" id="textbox1" name="city">
					</td>

					<td>
					<div id="div-ok">
						 <input type="submit" value="Ok" id="goTo">
					</div></td>

				</tr>

			</table>

				
		
	</form>
	</div>
	
	<script>

        document.getElementById('goTo').onclick = function(e){
            e.preventDefault();

            var yourPath = "",
                yourPage = document.getElementById('place').value;
                extension = '.html';

            window.location = yourPath + yourPage + extension;
        }

    </script>