<?php include 'header.php';?>

<?php include 'db.php';?>
<h2>User Table</h2>
<form action="<?php $_PHP_SELF ?>" method="post">
<table align="center" border="1" width="100%">
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Phone Number</th>
  <th>Email</th>
  <th>Address</th>
  <th>City Code</th>
  <th>Username</th>
  <th>Password</th>
  <th>Balance</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query="Select * from users;";
$result = mysqli_query($conn, $sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["user_id"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["tel_num"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["address"]; ?></td>
<td><?php echo $row["city_c"]; ?></td>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["password"]; ?></td>
<td>$<?php echo $row["balance"]; ?></td>
<td><a href="delete_process.php?user_id=<?php echo $row["user_id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</table>
</form>

<h2>Car Table</h2>
<form action="<?php $_PHP_SELF ?>" method="post">
<table align="center" border="1" width="100%">
<tr>
  <th>Car ID</th>
  <th>Model</th>
  <th>Car Code</th>
  <th>Availability</th>
  <th>Image</th>
  <th>Price</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query="Select * from cars;";
$result = mysqli_query($conn, $sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["car_id"]; ?></td>
<td><?php echo $row["model"]; ?></td>
<td><?php echo $row["car_c"]; ?></td>
<td><?php echo $row["availability"]; ?></td>
<td><?php echo $row["img"]; ?></td>
<td>$<?php echo $row["price"]; ?></td>
<td><a href="delete_process.php?car_id=<?php echo $row["car_id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</table>
</form>

<h2>Trip Table</h2>
<form action="<?php $_PHP_SELF ?>" method="post">
<table align="center" border="1" width="100%">
<tr>
  <th>Trip ID</th>
  <th>Car ID</th>
  <th>Source Code</th>
  <th>Destination Code</th>
  <th>Distance</th>
  <th>Price</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query="Select * from trips;";
$result = mysqli_query($conn, $sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["trip_id"]; ?></td>
<td><?php echo $row["car_id_fk"]; ?></td>
<td><?php echo $row["source_c"]; ?></td>
<td><?php echo $row["destin_c"]; ?></td>
<td><?php echo $row["distance"]; ?></td>
<td>$<?php echo $row["price"]; ?></td>
<td><a href="delete_process.php?trip_id=<?php echo $row["trip_id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</table>
</form>

<h2>Flower Table</h2>
<form action="<?php $_PHP_SELF ?>" method="post">
<table align="center" border="1" width="100%">
<tr>
  <th>Flower ID</th>
  <th>Store Code</th>
  <th>Price</th>
  <th>Image</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query="Select * from flowers;";
$result = mysqli_query($conn, $sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row["flower_id"]; ?></td>
<td><?php echo $row["store_c"]; ?></td>
<td>$<?php echo $row["price"]; ?></td>
<td><?php echo $row["img"]; ?></td>
<td><a href="delete_process.php?flower_id=<?php echo $row["flower_id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</table>
</form>

<h2>Order Table</h2>
<form action="<?php $_PHP_SELF ?>" method="post">
<table align="center" border="1" width="100%">
<tr>
  <th>Order ID</th>
  <th>User ID</th>
  <th>Trip ID</th>
  <th>Flower ID</th>
  <th>Date Issued</th>
  <th>Date Completed</th>
  <th>Total Price</th>
  <th>Pay Code</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query="Select * from orders;";
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
<td><a href="delete_process.php?order_id=<?php echo $row["order_id"]; ?>">Delete</a></td>
</tr>
<?php $count++; } ?>
</table>
</form>
</body>
<style>
table,td,th
{
 padding:10px;
 border-collapse:collapse;
 border:solid #ddd 2px;
}
input[type="text"] {
 width: 100%;
 box-sizing: border-box;
 -webkit-box-sizing:border-box;
 -moz-box-sizing: border-box;
}
</style>
</html>
