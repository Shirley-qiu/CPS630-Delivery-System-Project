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
<i class="glyphicon glyphicon-plus"></i> Add New Car</button>
<br></br>

<form action="<?php $_PHP_SELF ?>" method="POST">
<table class="table table-bordered table-striped">
<tr>
  <th>Car ID</th>
  <th>Model</th>
  <th>Car Code</th>
  <th>Availability</th>
  <th>Image</th>
  <th>Price</th>
  <th>Update</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query = "SELECT * from cars;";
$result = mysqli_query($conn, $sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["car_id"]; ?></td>
<td><?php echo $row["model"]; ?></td>
<td><?php echo $row["car_c"]; ?></td>
<td><?php echo $row["availability"]; ?></td>
<td><?php echo $row["img"]; ?></td>
<td>$<?php echo $row["price"]; ?></td>
<td><a href="update_process_c.php?car_id=<?php echo $row["car_id"]; ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
<td><a href="delete_process_c.php?car_id=<?php echo $row["car_id"]; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
</tr>
<?php $count++;} ?>
</table>
</form>
</div>

<?php
if(isset($_POST['submit']))
{
  $sql = "INSERT INTO cars(car_id, model, car_c, availability, img, price)
  VALUES ('".$_POST["car_id"]."','".$_POST["model"]."','".$_POST["car_c"]."','".$_POST["availability"]."',
  '".$_POST["img"]."','".$_POST["price"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}
?>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  <form action="<?php $_PHP_SELF ?>" method="POST">
    <div class="modal-content">

    <div class="modal-header">
        <h1 class="modal-title">Insert Car</h1>
    </div>

    <div class="modal-body">
    <label class="control-label">Car ID</label>
    <div>
        <input class="form-control" id="car_id" name="car_id" type="text">
    </div>

    <label class="control-label">Model</label>
    <div>
        <input class="form-control" id="model" name="model" type="text" required>
    </div>

    <label class="control-label">Car Code</label>
    <div>
        <input class="form-control" id="car_c" name="car_c" type="text" required>
    </div>

    <label class="control-label">Availability</label>
    <div>
        <input class="form-control" id="availability" name="availability" type="text" required>
    </div>

    <label class="control-label">Image</label>
    <div>
        <input class="form-control" id="img" name="img" type="text">
    </div>

    <label class="control-label">Price</label>
    <div>
        <input class="form-control" id="price" name="price" type="text">
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
