<?php
include 'header.php';
?>



<style> 
.container{
    width:300px;
    margin-top:30px
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
input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}
input[type=text]:focus  {
  border: 3px solid #555;
}

.center {


  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  margin-top:30px;
}    

</style>

<div class="center">
<form method="post" action="reg.php">
  <label for="fname">name</label>
  <input type="text" id="fname" name="name" required>
  <label for="fname">phone</label>
  <input type="text" id="fname" name="phone" required>
  <label for="fname">email</label>
  <input type="text" id="fname" name="email" required>

  <label for="fname">Address</label>
  <input type="text" id="fname" name="address" required>
  <label for="fname">City</label>
  <input type="text" id="fname" name="city" required>
  <label for="fname">Password</label>
  <input type="password" id="fname" name="pass" required>


 
  <input type="submit" value="register">

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

<script>
    $("input").prop('required',true);

</script>
</div>