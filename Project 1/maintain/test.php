<?php
$count=1;
$sel_query="Select * from users;";
$result = mysqli_query($conn, $sel_query);

while($row = mysqli_fetch_assoc($result)) {
$count++;
}

if(isset($_POST['submit1']))
{
   $sql = "INSERT INTO users(user_id, name, tel_num, email, address, city_c, username, password, balance)
   VALUES ('".$_POST["user_id"]."','".$_POST["name"]."','".$_POST["tel_num"]."','".$_POST["email"]."',
   '".$_POST["address"]."','".$_POST["city_c"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["balance"]."')";

   $result = mysqli_query($conn,$sql);
   echo "<meta http-equiv='refresh' content='0'>";
}
?>
