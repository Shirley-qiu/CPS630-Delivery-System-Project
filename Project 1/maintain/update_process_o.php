<?php
include '../db.php'; include '../header.php';

$result = mysqli_query($conn,"SELECT * FROM orders WHERE order_id='" . $_GET["order_id"] . "'");
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
  <title>Update Orders</title>
  <link rel="stylesheet" href="../main.css">
</head>
<body>
<div>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['submit']))
{
$order_id = $_REQUEST['order_id'];
$user_id_fk = $_REQUEST['user_id_fk'];
$trip_id_fk = $_REQUEST['trip_id_fk'];
$flower_id_fk = $_REQUEST['flower_id_fk'];
$date_issued = $_REQUEST['date_issued'];
$date_completed = $_REQUEST['date_completed'];
$t_price = $_REQUEST['t_price'];
$pay_c = $_REQUEST['pay_c'];

$update="UPDATE ORDERS SET order_id='".$order_id."', user_id_fk='".$user_id_fk."',
trip_id_fk='".$trip_id_fk."', flower_id_fk='".$flower_id_fk."',
date_issued='".$date_issued."', date_completed='".$date_completed."', t_price='".$t_price."',
pay_c='".$pay_c."' where order_id='".$order_id."'";

mysqli_query($conn, $update) or die(mysqli_error($conn)) ;
$status = "Record Updated Successfully. </br></br>
<a href='orders.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div>
<form name="form" method="post" action="">
<input type="hidden" name="update"/>
<input name="order_id" type="hidden" value="<?php echo $row['order_id'];?>" />
<p>User ID: <input type="text" name="user_id_fk" placeholder="Enter User ID" required value="<?php echo $row['user_id_fk'];?>" /></p>
<p>Trip ID: <input type="text" name="trip_id_fk" placeholder="Enter Trip ID" required value="<?php echo $row['trip_id_fk'];?>" /></p>
<p>Flower ID: <input type="text" name="flower_id_fk" placeholder="Enter Flower ID" required value="<?php echo $row['flower_id_fk'];?>" /></p>
<p>Date Issued: <input type="text" name="date_issued" placeholder="Enter Date Issued" required value="<?php echo $row['date_issued'];?>" /></p>
<p>Date Completed: <input type="text" name="date_completed" placeholder="Enter Date Completed" required value="<?php echo $row['date_completed'];?>" /></p>
<p>Total Price: <input type="text" name="t_price" placeholder="Enter Total Price" required value="<?php echo $row['t_price'];?>" /></p>
<p>Pay Code: <input type="text" name="pay_c" placeholder="Enter Pay Code" required value="<?php echo $row['pay_c'];?>" /></p>
<p><input name="submit" type="submit" value="submit" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
