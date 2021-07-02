<?php
include '../db.php'; include '../header.php';

$result = mysqli_query($conn,"SELECT * FROM users WHERE user_id='" . $_GET["user_id"] . "'");
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
  <title>Update Users</title>
  <link rel="stylesheet" href="../main.css">
</head>
<div>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['submit']))
{
$user_id = $_REQUEST['user_id'];
$name = $_REQUEST['name'];
$tel_num = $_REQUEST['tel_num'];
$email = $_REQUEST['email'];
$address = $_REQUEST['address'];
$city_c = $_REQUEST['city_c'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$balance = $_REQUEST['balance'];

$update="UPDATE USERS SET user_id='".$user_id."', name='".$name."',
tel_num='".$tel_num."', email='".$email."', address='".$address."',
city_c='".$city_c."', username='".$username."', password='".$password."',
balance='".$balance."' where user_id='".$user_id."'";

mysqli_query($conn, $update) or die(mysqli_error($conn)) ;
$status = "Record Updated Successfully. </br></br>
<a href='users.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action="">
<input type="hidden" name="update"/>
<input name="user_id" type="hidden" value="<?php echo $row['user_id'];?>" />
<p>Name: <input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
<p>Phone Number: <input type="text" name="tel_num" placeholder="Enter Phone Number" required value="<?php echo $row['tel_num'];?>" /></p>
<p>Email: <input type="text" name="email" placeholder="Enter Email" required value="<?php echo $row['email'];?>" /></p>
<p>Address: <input type="text" name="address" placeholder="Enter Address" required value="<?php echo $row['address'];?>" /></p>
<p>City Code: <input type="text" name="city_c" placeholder="Enter City Code" required value="<?php echo $row['city_c'];?>" /></p>
<p>Username: <input type="text" name="username" placeholder="Enter Username" required value="<?php echo $row['username'];?>" /></p>
<p>Password: <input type="text" name="password" placeholder="Enter Password" required value="<?php echo $row['password'];?>" /></p>
<p>Balance: <input type="text" name="balance" placeholder="Enter Balance" required value="<?php echo $row['balance'];?>" /></p>
<p><input name="submit" type="submit" value="submit" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
