<?php
require 'dbconnect.php';
?>

<?php
if (isset($_POST["combo1"]) && isset($_POST["Model"]) && isset($_POST["Modelyear"]) && isset($_POST["combo2"]) && isset($_POST["Mileage"]) && isset($_POST["combo3"]) && isset($_POST["combo4"]) && isset($_POST["groupFuel"]) && isset($_POST["EngineCapacity"]) && isset($_POST["Description"]) && isset($_POST["Phone"]) && isset($_POST["Email"]) && (isset($_POST["Price"]) || isset($_POST["checkbox5"]))) {

	$Brand = $_POST["combo1"];
	$Model = $_POST["Model"];
	$Modelyear = $_POST["Modelyear"];
	$VehicleCondition = $_POST["combo2"];
	$Mileage = $_POST["Mileage"];
	$BodyType = $_POST["combo3"];
	$Transmission = $_POST["combo4"];
	$Fueltype = $_POST["groupFuel"];
	$EngineCapacity = $_POST["EngineCapacity"];
	$Price = $_POST["Price"];
	$Negotiable = $_POST['checkbox5'];
	$Description = $_POST["Description"];
	$Phone = $_POST["Phone"];
	$Email = $_POST["Email"];

	

} else {
	$error = "One or more fields are not filled";
	echo $error;
}
if (isset($_POST['Submit'])) {
	$insertString = "INSERT INTO vehicle VALUES('$Brand','$Model', '$Modelyear', '$VehicleCondition', '$Mileage', 
	    '$BodyType', '$Transmission', '$Fueltype' , '$EngineCapacity', 
	    '$Price' , '$Negotiable', '$Description', '$Phone', '$Email'  ";

	if (!mysql_query($insertString)) {
		die('Error : ' . mysql_error());
	} 
	else {
		echo '<br/>';
		echo "<script>alert('Vehicle detail added.')</script>";
	}
}
?>
