<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php
session_start();
if($_SESSION['username'] == ""){
	$message = "Username is Missing, ";
}elseif($_SESSION['pass'] == ""){
	$message = "Password is missing, ";
}elseif($_SESSION['valid'] != 1){
	$message = "Username or Password was not found, ";
}else{
	$message = "session has encountered an error, ";
}
?>
<?php include 'layout_head.php'; ?>
<body class = "body">
    <div class="form">

		<h2>We are sorry about this but your, <?php echo $message ?> please try again or create a new account!</h2>
		<br>
		<a href = "./login.php">Return</a>
    </div>
</body>
<?php include 'layout_foot.php'; ?>
</html>