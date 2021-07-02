<?php
session_start();
if($_SESSION['username']!="Admin" ){
  header("Location: /project1/login.php");
  exit;
}
?>
<!doctype html>
<html>
<head>
  <title>Maintain Page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    }

    .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    }

    .dropdown a:hover {background-color: #ddd;}
  </style>
</head>

<body>

<div class="container">
  <h1>Welcome to the Maintain Page</h1>
  <p>Please select a table:</p>
  <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Select a table</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="cars.php">Cars</a>
    <a href="flowers.php">Flowers</a>
    <a href="orders.php">Orders</a>
    <a href="trips.php">Trips</a>
    <a href="users.php">Users</a>
  </div>
  </div>

</div>
<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</html>
