<?php
include '../db.php';

	mysqli_query($conn,"DELETE FROM orders WHERE order_id='" . $_GET["order_id"] . "'");
	header('location: orders.php');

?>
