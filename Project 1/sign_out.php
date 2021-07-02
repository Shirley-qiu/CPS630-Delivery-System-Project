<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();
?>

<?php include 'header.php';?>

<h1> You're Logged Off </h1>

</body>
</html>
<?php exit;?>
