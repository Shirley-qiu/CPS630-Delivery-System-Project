<?php include 'header.php' ?>

<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
  echo "<h1> Please Sign In To Admin Use This Service </h1>";
} else {
  echo "<h1> Please Sign In To Use Our Service </h1>";
}
?>





</body>
</html>
