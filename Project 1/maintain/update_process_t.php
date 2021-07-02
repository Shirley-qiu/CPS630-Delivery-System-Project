<?php
include '../db.php'; include '../header.php';

$result = mysqli_query($conn,"SELECT * FROM trips WHERE trip_id='" . $_GET["trip_id"] . "'");
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
  <title>Update Trips</title>
  <link rel="stylesheet" href="../main.css">
</head>
<div>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['submit']))
{
$trip_id = $_REQUEST['trip_id'];
$car_id_fk = $_REQUEST['car_id_fk'];
$source_c = $_REQUEST['source_c'];
$destin_c = $_REQUEST['destin_c'];
$distance = $_REQUEST['distance'];
$price = $_REQUEST['price'];

$update="UPDATE TRIPS SET trip_id='".$trip_id."', car_id_fk='".$car_id_fk."',
source_c='".$source_c."', destin_c='".$destin_c."', distance='".$distance."',
price='".$price."' where trip_id='".$trip_id."'";

mysqli_query($conn, $update) or die(mysqli_error($conn)) ;
$status = "Record Updated Successfully. </br></br>
<a href='trips.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action="">
<input type="hidden" name="update"/>
<input name="trip_id" type="hidden" value="<?php echo $row['trip_id'];?>" />
<p>Car ID: <input type="text" name="car_id_fk" placeholder="Enter Car ID" required value="<?php echo $row['car_id_fk'];?>" /></p>
<p>Source Code: <input type="text" name="source_c" placeholder="Enter Source Code" required value="<?php echo $row['source_c'];?>" /></p>
<p>Destination Code: <input type="text" name="destin_c" placeholder="Enter Destination Code" required value="<?php echo $row['destin_c'];?>" /></p>
<p>Distance: <input type="text" name="distance" placeholder="Enter Distance" required value="<?php echo $row['distance'];?>" /></p>
<p>Price: <input type="text" name="price" placeholder="Enter Price" required value="<?php echo $row['price'];?>" /></p>
<p><input name="submit" type="submit" value="submit" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
