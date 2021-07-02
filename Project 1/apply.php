<?php include 'header.php';
include 'db.php';
?>
<!doctype html>
<html>
<head>
  <title>Apply to be a Driver</title>
  <style>
  .signup-form {
    border-radius: 3px;
    background: #e6eade;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 10px;
    margin-bottom: 10px;
  }
  </style>
</head>
<body>
<div class="container">
<div class="row">
  <div class="col-sm-7">
    <h2>Apply to be a Driver!</h2>
    <h3>Requirements:</h3>
    <ul class="list">
      <li><h4>1. Have at least one year of driving experience</h4></li>
      <li><h4>2. Meet the minimum age to drive in your city</h4></li>
      <li><h4>3. Have a valid driver's license</h4></li>
    </ul>
  </div>
  <div class="col-sm-5">
    <div class="signup-form">
        <form action="apply.php" method="post">
    		<h2>Apply Now</h2>
          <div class="form-group">
            <input type="name" class="form-control" name="name" placeholder="Full Name" required="required">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
          </div>
    		  <div class="form-group">
            <input type="num" class="form-control" name="num" placeholder="Phone Number">
          </div>
          <hr/>
          <div class="form-group">
            <label for="upload">Upload CV/Resume</label>
            <input type="file" name="file" id="file" class="form-control-file">
            <div class="label--desc">Upload your CV/Resume or any other relevant file. Max file size 50 MB</div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Send Application</button>
          </div>
        </div>
        </form>
    	<div class="text-center">Sign up to ride? <a href="sign_up.php">Sign Up</a></div>
    </div>
  </div>
</div>

<?php

$name= $_POST['name'];
$email=$_POST['email'];
$num=$_POST['num'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//upload file
$file= $_FILES['file']['name'];
$tmp_textname= $_FILES['file']['tmp_name'];
$textsubmitbutton= $_POST['submit'];
$textposition= strpos($file, ".");
$textfileextension= substr($file, $textposition + 1);
$textfileextension= strtolower($textfileextension);

if (isset($file)) {

$textpath= 'driver_files/';

if (!empty($file)){
if (move_uploaded_file($tmp_textname, $textpath.$file)) {
echo 'Uploaded!';
}
}
}

$sql = "INSERT INTO `drivers` (`name`,`email`,`num`,`city_c`,)
VALUES ('".$name."' , '".$email."','".$num."','".$file."')";

if(mysqli_query($conn, $sql)){
    echo "You have submitted an application.";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>
