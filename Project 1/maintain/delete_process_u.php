<?php
include '../db.php';

	mysqli_query($conn,"DELETE FROM users WHERE user_id='" . $_GET["user_id"] . "'");
	header('location: users.php');

?>
