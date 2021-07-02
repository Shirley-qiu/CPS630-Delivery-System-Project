<?php
session_start();
include 'db.php';
$id=$_SESSION["id"];

$src = $_POST['src'];
$des = $_POST['des'];


$sql = "SELECT * FROM cars WHERE car_id = '".$id."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) == 1) {
 $price=$row['price'];}


$sql = "INSERT INTO trips (car_id_fk, source_c, destin_c, price)
VALUES ('$id','$src','$des','$price')";

if ($conn->query($sql) === TRUE) {
    $_SESSION["src"]=$src ;
    $_SESSION["des"]=$des;

  echo "New record created successfully";
  header( "refresh:2; url=lec3-3-example5-locInmap-markers-info.php" );

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
