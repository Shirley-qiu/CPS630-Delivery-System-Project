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
<i class="glyphicon glyphicon-plus"></i> Add New User</button>
<br></br>

<form action="<?php $_PHP_SELF ?>" method="POST">
<table class="table table-bordered table-striped">
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
  <th>Update</th>
  <th>Delete</th>
</tr>
<?php
$count=1;
$sel_query = "SELECT * from users;";
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
<td><a href="update_process_u.php?user_id=<?php echo $row["user_id"]; ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
<td><a href="delete_process_u.php?user_id=<?php echo $row["user_id"]; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
</tr>
<?php $count++;} ?>
</table>
</form>
</div>

<?php
if(isset($_POST['submit']))
{
   $sql = "INSERT INTO users(user_id, name, tel_num, email, address, city_c, username, password, balance)
   VALUES ('".$_POST["user_id"]."','".$_POST["name"]."','".$_POST["tel_num"]."','".$_POST["email"]."',
   '".$_POST["address"]."','".$_POST["city_c"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["balance"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}
?>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  <form action="<?php $_PHP_SELF ?>" method="POST">
    <div class="modal-content">

    <div class="modal-header">
        <h1 class="modal-title">Insert User</h1>
    </div>

    <div class="modal-body">
    <label class="control-label">User ID</label>
    <div>
        <input class="form-control" id="user_id" name="user_id" type="text">
    </div>

    <label class="control-label">Name</label>
    <div>
        <input class="form-control" id="name" name="name" type="text" required>
    </div>

    <label class="control-label">Phone Number</label>
    <div>
        <input class="form-control" id="tel_num" name="tel_num" type="text" required>
    </div>

    <label class="control-label">Email</label>
    <div>
        <input class="form-control" id="email" name="email" type="text" required>
    </div>

    <label class="control-label">Address</label>
    <div>
        <input class="form-control" id="address" name="address" type="text">
    </div>

    <label class="control-label">City Code</label>
    <div>
        <input class="form-control" id="city_c" name="city_c" type="text">
    </div>

    <label class="control-label">Username</label>
    <div>
        <input class="form-control" id="username" name="username" type="text">
    </div>

    <label class="control-label">Password</label>
    <div>
        <input class="form-control" id="password" name="password" type="text">
    </div>

    <label class="control-label">Balance</label>
    <div>
        <input class="form-control" id="balance" name="balance" type="text" placeholder="Enter number only">
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
