<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->

<?php
//include auth_session.php file on all user panel pages
include("./../../Utility/auth_session.php");
//sessCheck();
include('./../../autoloader.php');
?>
<?php include '../views/layout_head.php'; ?>
<html lang="">
<link rel = "stylesheet" href = "../../Presentation/css/style.css" type="text/css"/>
<body class = "body">

    <div class="form">
        <p>Hello <?php echo $_SESSION['username'] ?>!</p>
		<br>
		<p>Thank you for Logging in!</p>
		<br>
        <p>You are now inside the user dashboard page. 
		Please navigate freely to the desired page.</p>
		<br>	
		<form class = "text-align" method = "post" action = "../views/Store.php">
        <a href="../views/login/logout.php"> <input type = "submit" name = "logout" value = "Logout"/></a>
		</form>
		<br>
    </div>
</body>
<?php  include '../views/layout_foot.php'; ?>
</html>