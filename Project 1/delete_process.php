<?php
include 'db.php';

	mysqli_query($conn,"DELETE FROM users WHERE user_id='" . $_GET["user_id"] . "'");
  mysqli_query($conn,"DELETE FROM cars WHERE car_id='" . $_GET["car_id"] . "'");
  mysqli_query($conn,"DELETE FROM trips WHERE trip_id='" . $_GET["trip_id"] . "'");
  mysqli_query($conn,"DELETE FROM flowers WHERE flower_id='" . $_GET["flower_id"] . "'");
  mysqli_query($conn,"DELETE FROM orders WHERE order_id='" . $_GET["order_id"] . "'");
	header('location: delete.php');

?>
