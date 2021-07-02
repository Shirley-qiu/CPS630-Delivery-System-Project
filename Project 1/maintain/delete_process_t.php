<?php
include '../db.php';

  mysqli_query($conn,"DELETE FROM trips WHERE trip_id='" . $_GET["trip_id"] . "'");
	header('location: trips.php');

?>
