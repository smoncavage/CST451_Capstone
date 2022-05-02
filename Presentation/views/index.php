<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php 
$layout = __DIR__.'/Presentation/views/layout_head.php';
include './layout_head.php'; 
?>
<html lang="">
<link rel = "stylesheet" href = "../css/style.css" type="text/css"/>

<body class = "body">

<div class="container" id="main-content">
	<h3 class = "home-title" >Welcome to eCommerce!</h3>
	<br>
	<br>
	<p> <b>Please Login or Register to Continue.</b> </p>
</div>

	<br>
	<a href="../views/login/login.php"> <input type = "submit" name = "login" value = "Login"/> </a>
	<a href="../views/login/register.html"> <input type = "submit" name = "register" value = "Register" /> </a>

</body>
<?php include './layout_foot.php'; ?>
</html>