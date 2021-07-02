<?php include '../db.php';
include 'header.php'; ?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="maintain.css">
<link rel="stylesheet" href="../main.css">
</head>
<body>
<div class="container">

<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">
<i class="glyphicon glyphicon-plus"></i> Add New Order</button>
<br></br>

<form action="<?php $_PHP_SELF ?>" method="POST">
<table class="table table-bordered table-striped">
<tr>
  <th>Order ID</th>
  <th>User ID</th>
  <th>Trip ID</th>
  <th>Flower ID</th>
  <th>Date Issued</th>
  <th>Date Completed</th>
  <th>Total Price</th>
  <th>Pay Code</th>
  <th>Update</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query = "SELECT * from orders;";
$result = mysqli_query($conn, $sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["order_id"]; ?></td>
<td><?php echo $row["user_id_fk"]; ?></td>
<td><?php echo $row["trip_id_fk"]; ?></td>
<td><?php echo $row["flower_id_fk"]; ?></td>
<td><?php echo $row["date_issued"]; ?></td>
<td><?php echo $row["date_completed"]; ?></td>
<td>$<?php echo $row["t_price"]; ?></td>
<td><?php echo $row["pay_c"]; ?></td>
<td><a href="update_process_o.php?order_id=<?php echo $row["order_id"]; ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
<td><a href="delete_process_o.php?order_id=<?php echo $row["order_id"]; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
</tr>
<?php $count++;} ?>
</table>
</form>
</div>

<?php
if(isset($_POST['submit']))
{
  $sql = "INSERT INTO orders(order_id, user_id_fk, trip_id_fk, flower_id_fk, date_issued, date_completed, t_price, pay_c)
  VALUES ('".$_POST["order_id"]."','".$_POST["user_id_fk"]."','".$_POST["trip_id_fk"]."','".$_POST["flower_id_fk"]."',
  '".$_POST["date_issued"]."','".$_POST["date_completed"]."','".$_POST["t_price"]."','".$_POST["pay_c"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}
?>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  <form action="<?php $_PHP_SELF ?>" method="POST">
    <div class="modal-content">

    <div class="modal-header">
        <h1 class="modal-title">Insert Order</h1>
    </div>

    <div class="modal-body">
    <label class="control-label">Order ID</label>
    <div>
        <input class="form-control" id="order_id" name="order_id" type="text">
    </div>

    <label class="control-label">User ID</label>
    <div>
        <input class="form-control" id="user_id_fk" name="user_id_fk" type="text" required>
    </div>

    <label class="control-label">Trip ID</label>
    <div>
        <input class="form-control" id="trip_id_fk" name="trip_id_fk" type="text" required>
    </div>

    <label class="control-label">Flower ID</label>
    <div>
        <input class="form-control" id="flower_id_fk" name="flower_id_fk" type="text" required>
    </div>

    <label class="control-label">Date Issued</label>
    <div>
        <input class="form-control datetimepicker-input" id="date_issued" name="date_issued" type="datetime-local">
    </div>

    <label class="control-label">Date Completed</label>
    <div>
        <input class="form-control datetimepicker-input" id="date_completed" name="date_completed" type="datetime-local">
    </div>

    <label class="control-label">Total Price</label>
    <div>
        <input class="form-control" id="t_price" name="t_price" type="text">
    </div>

    <label class="control-label">Pay Code</label>
    <div>
        <input class="form-control" id="pay_c" name="pay_c" type="text">
    </div>
    </div>

    <div class="modal-footer">
        <button type="submit" name="submit" class="btn">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
  </form>
</div>
</div>
</div>

</body>
</html>
