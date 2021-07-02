<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="main.css">
<title>project</title>
<style>
    * {
    margin: 0;
    padding: 0;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
</style>
</head>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="register.php">SIGN UP</a></li>
  <li><a href="index.php">REVIEWS</a></li>

  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>

  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">TYPES OF SERVICES</a>
    <div class="dropdown-content">
    <a href="ride_service.php">RIDE SERVICE</a>
  <a href="delvr.php">DELIVERY SERVICE</a>
    </div>
  </li>
 

  <li style="float:right; 
    z-index: 1;
    position: fixed;
    top: 43px;
    right: 10px;">
  <aside id="sidebar">
        <div class="basket">
            <div class="basket_list">
                <div class="head">
                    <span class="name">SHOPPING CART</span>
                    <span class="count">Quantity</span>
                </div>
                <form action="add.php" method="post">
                <ul>
                    <!--li>
                        <span class="name">Samsung S3 asd asdasdaf dfsdghgfg dgfg</span>
                        <input class="count" value="1" type="text">
                        <button class="delete">&#10005;</button>
                    </li-->
                </ul>
                <button id="ss" type="submit" style="width: 100px;
    height: 32px;
    background: #5ec558;margin-left:50px;display:none">order</button>
                </form>

            </div>
        </div>
        </li>
     

    </aside>
  <li style="float:right"><a class="active" href="#about">About</a></li>
  <li style="float:right"><a class="active" href="#about">CONTACT US</a></li>

</ul>

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 10;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>