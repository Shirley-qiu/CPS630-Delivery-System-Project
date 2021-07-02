<?php  include 'header.php' ?>

<?php

  // collect value of input field
  $name = $_POST['id'];
  $_SESSION["id"] = $name;

?>



<style>
.container{
    width:300px
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #555;
}

.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
}
</style>

<div class="center">

<form method="post" action="add1.php">
  <label for="fname">Source Address</label>
  <input type="text" id="fname" name="src" >
  <label for="lname">Destination Address</label>
  <input type="text" id="lname" name="des" >
  <label for="birthdaytime">Delivery date (date and time):</label>
  <input type="datetime-local" id="birthdaytime" name="date"><br>
  <input type="submit" value="buy">

</form>

<style>
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</div>
