<?php
include '../db.php'; include 'header.php';

$result = mysqli_query($conn,"SELECT * FROM cars WHERE car_id='" . $_GET["car_id"] . "'");
$row = mysqli_fetch_assoc($result);

?>
<!doctype html>
<html>
<head>
  <title>Update Cars</title>
  <link rel="stylesheet" href="../main.css">
</head>
<div>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['submit']))
{
$car_id = $_REQUEST['car_id'];
$model = $_REQUEST['model'];
$car_c = $_REQUEST['car_c'];
$availability = $_REQUEST['availability'];
$img = $_REQUEST['img'];
$price = $_REQUEST['price'];

$update="UPDATE CARS SET car_id='".$car_id."', model='".$model."',
car_c='".$car_c."', availability='".$availability."', img='".$img."',
price='".$price."' where car_id='".$car_id."'";

mysqli_query($conn, $update) or die(mysqli_error($conn)) ;
$status = "Record Updated Successfully. </br></br>
<a href='cars.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action="">
<input type="hidden" name="update"/>
<input name="car_id" type="hidden" value="<?php echo $row['car_id'];?>" />
<p>Model: <input type="text" name="model" placeholder="Enter Model" required value="<?php echo $row['model'];?>" /></p>
<p>Car Code: <input type="text" name="car_c" placeholder="Enter Car Code" required value="<?php echo $row['car_c'];?>" /></p>
<p>Availability: <input type="text" name="availability" placeholder="Enter Availability" required value="<?php echo $row['availability'];?>" /></p>
<p>Image: <input type="text" name="img" placeholder="Enter Image" required value="<?php echo $row['img'];?>" /></p>
<p>Price: <input type="text" name="price" placeholder="Enter Price" required value="<?php echo $row['price'];?>" /></p>
<p><input name="submit" type="submit" value="submit" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
