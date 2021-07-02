<?php include 'header.php'?>

<h1> Contact Us </h1>

<div class="about">
<h3>Kyle Kan</h3>
<p> Kyle.kan@ryerson.ca </p>
</div>

<div class="about">
<h3>Joy Khatter</h3>
<p> Jkhatter@ryerson.ca </p>
</div>

<div class="about">
<h3>Xueqing Qiu</h3>
<p> Xueqing.qiu@ryerson.ca</p>
</div>

</body>
</html>
<style>
.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.about {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.about::after, .row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
