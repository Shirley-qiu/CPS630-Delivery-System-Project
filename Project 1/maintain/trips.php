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
<i class="glyphicon glyphicon-plus"></i> Add New Trip</button>
<br></br>

<form action="<?php $_PHP_SELF ?>" method="POST">
<table class="table table-bordered table-striped">
<tr>
  <th>Trip ID</th>
  <th>Car ID</th>
  <th>Source Code</th>
  <th>Destination Code</th>
  <th>Distance</th>
  <th>Price</th>
  <th>Update</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query = "SELECT * from trips;";
$result = mysqli_query($conn, $sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["trip_id"]; ?></td>
<td><?php echo $row["car_id_fk"]; ?></td>
<td><?php echo $row["source_c"]; ?></td>
<td><?php echo $row["destin_c"]; ?></td>
<td><?php echo $row["distance"]; ?>km</td>
<td>$<?php echo $row["price"]; ?></td>
<td><a href="update_process_t.php?trip_id=<?php echo $row["trip_id"]; ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
<td><a href="delete_process_t.php?trip_id=<?php echo $row["trip_id"]; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
</tr>
<?php $count++;} ?>
</table>
</form>
</div>

<?php
if(isset($_POST['submit']))
{
  $sql = "INSERT INTO trips(trip_id, car_id_fk, source_c, destin_c, distance, price)
  VALUES ('".$_POST["trip_id"]."','".$_POST["car_id_fk"]."','".$_POST["source_c"]."',
  '".$_POST["destin_c"]."','".$_POST["distance"]."','".$_POST["price"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}
?>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  <form action="<?php $_PHP_SELF ?>" method="POST">
    <div class="modal-content">

    <div class="modal-header">
        <h1 class="modal-title">Insert Trip</h1>
    </div>

    <div class="modal-body">
    <label class="control-label">Trip ID</label>
    <div>
        <input class="form-control" id="trip_id" name="trip_id" type="text">
    </div>

    <label class="control-label">Car ID</label>
    <div>
        <input class="form-control" id="car_id_fk" name="car_id_fk" type="text" required>
    </div>

    <label class="control-label">Source Code</label>
    <div>
        <input class="form-control" id="source_c" name="source_c" type="text" required>
    </div>

    <label class="control-label">Destination Code</label>
    <div>
        <input class="form-control" id="destin_c" name="destin_c" type="text" required>
    </div>

    <label class="control-label">Distance</label>
    <div>
        <input class="form-control" id="distance" name="distance" type="text">
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
