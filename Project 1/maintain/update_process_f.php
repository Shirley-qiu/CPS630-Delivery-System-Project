<?php
include '../db.php'; include '../header.php';

$result = mysqli_query($conn,"SELECT * FROM flowers WHERE flower_id='" . $_GET["flower_id"] . "'");
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
  <title>Update Flowers</title>
  <link rel="stylesheet" href="../main.css">
</head>
<body>
<div>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['submit']))
{
$flower_id = $_REQUEST['flower_id'];
$store_c = $_REQUEST['store_c'];
$price = $_REQUEST['price'];
$img = $_REQUEST['img'];

$update="UPDATE FLOWERS SET flower_id='".$flower_id."', store_c='".$store_c."',
price='".$price."', img='".$img."' where flower_id='".$flower_id."'";

mysqli_query($conn, $update) or die(mysqli_error($conn)) ;
$status = "Record Updated Successfully. </br></br>
<a href='flowers.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action="">
<input type="hidden" name="update"/>
<input name="flower_id" type="hidden" value="<?php echo $row['flower_id'];?>" />
<p>Store Code: <input type="text" name="store_c" placeholder="Enter Store Code" required value="<?php echo $row['store_c'];?>" /></p>
<p>Price: <input type="text" name="price" placeholder="Enter Price" required value="<?php echo $row['price'];?>" /></p>
<p>Image: <input type="text" name="img" placeholder="Enter Image" required value="<?php echo $row['img'];?>" /></p>
<p><input name="submit" type="submit" value="submit" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
