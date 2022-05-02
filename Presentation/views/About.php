<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<html lang="php">
<?php include './layout_head.php';
include('./../../autoloader.php');?>
<link rel = "stylesheet" href = "../css/style.css" type="text/css">

<body class = "body">

<div class="container" id="main-content">
	<h3 class = "home-title" >Welcome to ABC Carwash!</h3>
	<br>
	<br>
	<p> This is where I tell you about myself. </p>


	<br>
	<a href="./login/login.php"> <input type = "submit" name = "login" value = "Login"/></a>
	<a href="./login/register.html"> <input type = "submit" name = "register" value = "Register" /></a>
	<a href="./login/logout.php"> <input type = "submit" name = "logout" value = "Logout"/></a>
	</div>
</body>
<?php include './layout_foot.php'; ?>
</html>