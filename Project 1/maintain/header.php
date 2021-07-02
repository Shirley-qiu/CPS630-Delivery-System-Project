<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../main.css">
</head>
<body>

<?php
$brsw =$_SERVER['HTTP_USER_AGENT'];
if(strpos($brsw,"Chrome")==true){
  echo "Browser: Google Chrome";
}
elseif (strpos($brsw,"Firefox")==true) {
  echo "Browser: Mozilla Firefox";
}
elseif (strpos($brsw,"Trident")==true) {
  echo "Browser: Internet Explorer";
}
else {
  echo "Unknown Browser";
}
?>

<nav class="navbar navbar-static-top navbar-default">
<div class="container-fluid">
  <ul class="nav navbar-nav">
    <li><a href="../index.php">Home</a></li>
    <li><a href="../sign_in.php">Sign In</a></li>
    <li><a href="../sign_out.php">Sign Out</a></li>
    <li><a href="../sign_up.php">Sign Up</a></li>
    <li><a href="../index.php">Reviews</a></li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Types of Services <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="../ride_service.php">Ride Service</a></li>
        <li><a href="../delvr.php">Delivery Service</a></li>
        <li><a href="../apply.php">Apply to be a Driver</a><li>
      </ul>
    </li>
    <li><a href="">DB Maintain</a></li>

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
                  <button id="ss" type="submit" style="width: 100px; height: 32px; background: #5ec558;margin-left:50px;display:none">order</button>
                  </form>
              </div>
          </div>
          </aside>
          </li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../about_us.php">About</a></li>
      <li><a href="../contact_us.php">Contact Us</a></li>
    </ul>
  </div>
</nav>
</body>
</html>
