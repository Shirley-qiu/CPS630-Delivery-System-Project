<?php include 'header.php';?>

<h1> Sign Up </h1>

<form action="sign_up.php" method="POST">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"required><br>

  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>

  <label for="tel_num">Telephone Number :</label><br>
  <input type="text" id="tel_num" name="tel_num"><br>

  <label for="address">Address :</label><br>
  <input type="text" id="address" name="address"><br>

  <label for="city_c">City :</label><br>
  <input type="text" id="city_c" name="city_c"><br>

  <label for="email">E-Mail:</label><br>
  <input type="text" id="email" name="email"><br>

  <input type="submit" value="Submit">

</form>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "127.0.0.1";
$un = "root";
$pw = "";
$dbname = "p2s";

$name= $_POST['name'];
$tel_num=$_POST['tel_num'];
$email=$_POST['email'];
$address=$_POST['address'];
$city_c=$_POST['city_c'];
$username=$_POST['username'];
$password=$_POST['password'];
$salt=rand(1,999999999999);
$hashed_pw=md5($password.$salt);
// Create connection
$conn = new mysqli($servername, $un, $pw,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `users` (`name`,`tel_num`,`email`,`address`,`city_c`,`username`,`password`,`salt`,`hashed_pw`)
VALUES ('".$name."' , '".$tel_num."', '".$email."','".$address."','".$city_c."','".$username."','".$password."','".$salt."','".$hashed_pw."')";



if (mysqli_query($conn, $sql)) {
  echo "New USERS created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>

</body>
</html>
