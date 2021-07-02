<?php
include '../db.php';

	mysqli_query($conn,"DELETE FROM flowers WHERE flower_id='" . $_GET["flower_id"] . "'");
	header('location: flowers.php');

?>
