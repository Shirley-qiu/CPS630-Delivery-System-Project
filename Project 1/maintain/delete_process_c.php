<?php
include '../db.php';

  mysqli_query($conn,"DELETE FROM cars WHERE car_id='" . $_GET["car_id"] . "'");
	header('location: cars.php');

?>
