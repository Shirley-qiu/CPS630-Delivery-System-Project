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
</tr>
<?php $count++; }
if(isset($_POST['submit1']))
{
   $sql = "INSERT INTO users(user_id, name, tel_num, email, address, city_c, username, password, balance)
   VALUES ('".$_POST["user_id"]."','".$_POST["name"]."','".$_POST["tel_num"]."','".$_POST["email"]."',
   '".$_POST["address"]."','".$_POST["city_c"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["balance"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}
?>
<tr>
  <th><input id="user_id" name="user_id" type="text" size="4"/></th>
  <th><input id="name" name="name" type="text"/></th>
  <th><input id="tel_num" name="tel_num" type="text"/></th>
  <th><input id="email" name="email" type="text"/></th>
  <th><input id="address" name="address" type="text"/></th>
  <th><input id="city_c" name="city_c" type="text"/></th>
  <th><input id="username" name="username" type="text"/></th>
  <th><input id="password" name="password" type="text"/></th>
  <th><input id="balance" name="balance" type="text" placeholder="Enter number only"/></th>
</tr>
</table>
<input type="submit" name="submit1" value="Submit">
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
</tr>
<?php $count++; }
if(isset($_POST['submit2']))
{
   $sql = "INSERT INTO cars(car_id, model, car_c, availability)
   VALUES ('".$_POST["car_id"]."','".$_POST["model"]."','".$_POST["car_c"]."','".$_POST["availability"]."',
   '".$_POST["img"]."','".$_POST["price"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}?>
<tr>
  <th><input id="car_id" name="car_id" type="text" size="4"/></th>
  <th><input id="model" name="model" type="text"/></th>
  <th><input id="car_c" name="car_c" type="text"/></th>
  <th><input id="availability" name="availability" type="text"/></th>
  <th><input id="img" name="img" type="text"/></th>
  <th><input id="price" name="price" type="text" placeholder="Enter number only"/></th>
</tr>
</table>
<input type="submit" name="submit2" value="Submit">
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
<td><?php echo $row["distance"]; ?>km</td>
<td>$<?php echo $row["price"]; ?></td>
</tr>
<?php $count++; }
if(isset($_POST['submit3']))
{
   $sql = "INSERT INTO trips(trip_id, car_id_fk, source_c, destin_c, distance, price)
   VALUES ('".$_POST["trip_id"]."','".$_POST["car_id_fk"]."','".$_POST["source_c"]."',
     '".$_POST["destin_c"]."','".$_POST["distance"]."','".$_POST["price"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}?>
<tr>
  <th><input id="trip_id" name="trip_id" type="text" size="4"/></th>
  <th><input id="car_id_fk" name="car_id_fk" type="text" size="4"/></th>
  <th><input id="source_c" name="source_c" type="text"/></th>
  <th><input id="destin_c" name="destin_c" type="text"/></th>
  <th><input id="distance" name="distance" type="text" placeholder="Enter number only"/></th>
  <th><input id="price" name="price" type="text" placeholder="Enter number only"/></th>
</tr>
</table>
<input type="submit" name="submit3" value="Submit">
</form>

<h2>Flower Table</h2>
<form action="<?php $_PHP_SELF ?>" method="post">
<table align="center" border="1" width="100%">
<tr>
  <th>Flower ID</th>
  <th>Store Code</th>
  <th>Price</th>
  <th>Image</th>
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
<td>$<?php echo $row["img"]; ?></td>
</tr>
<?php $count++; }
if(isset($_POST['submit4']))
{
   $sql = "INSERT INTO flowers(flower_id, store_c, price)
   VALUES ('".$_POST["flower_id"]."','".$_POST["store_c"]."','".$_POST["price"]."','".$_POST["img"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}?>
<tr>
  <th><input id="flower_id" name="flower_id" type="text" size="4"/></th>
  <th><input id="store_c" name="store_c" type="text"/></th>
  <th><input id="price" name="price" type="text" placeholder="Enter number only"/></th>
  <th><input id="img" name="img" type="text"/></th>
</tr>
</table>
<input type="submit" name="submit4" value="Submit">
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
</tr>
<?php $count++; }
if(isset($_POST['submit5']))
{
   $sql = "INSERT INTO orders(order_id, user_id_fk, trip_id_fk, flower_id_fk, date_issued, date_completed, t_price, pay_c)
   VALUES ('".$_POST["order_id"]."','".$_POST["user_id_fk"]."','".$_POST["trip_id_fk"]."','".$_POST["flower_id_fk"]."',
   '".$_POST["date_issued"]."','".$_POST["date_completed"]."','".$_POST["t_price"]."','".$_POST["pay_c"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}?>
<tr>
  <th><input id="order_id" name="order_id" type="text" size="4"/></th>
  <th><input id="user_id_fk" name="user_id_fk" type="text" size="4"/></th>
  <th><input id="trip_id_fk" name="trip_id_fk" type="text" size="4"/></th>
  <th><input id="flower_id_fk" name="flower_id_fk" type="text" size="4"/></th>
  <th><input id="date_issued" name="date_issued" type="date"/></th>
  <th><input id="date_completed" name="date_completed" type="date"/></th>
  <th><input id="t_price" name="t_price" type="text" placeholder="Enter number only"/></th>
  <th><input id="pay_c" name="pay_c" type="text"/></th>
</tr>
</table>
<input type="submit" name="submit5" value="Submit">
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
