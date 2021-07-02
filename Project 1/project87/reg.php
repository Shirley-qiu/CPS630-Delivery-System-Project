<?php
session_start();




$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$pass = $_POST['pass'];


include 'db.php';


$sql = "INSERT INTO users (Name,Tel,Email,Address,City,Password)
VALUES ('$name','$phone','$email','$address','$city','$pass')";

if ($conn->query($sql) === TRUE) {
  

  echo "New record created successfully";
  header( "refresh:2; url=index.php" ); 

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>