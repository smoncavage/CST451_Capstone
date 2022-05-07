<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php include '../layout_head.php'; ?>
<link rel = "stylesheet" href = "../../css/style.css" type="text/css"> 
<body class="body">
<?php
	include_once('myfuncs.php');
    if(isSessionStarted() == TRUE){
	session_destroy();
    // Destroy session
	}
	session_unset();
	echo "In order to continue, " 
	
	 //if(session_destroy() !== NULL) {
        // Redirecting To Home Page
        //header("Location: ./index.php");
    //}
?>
<br>
Please return to the <a href = "../index.php">Homepage </a> or <a href = "../login/login.php"> Login </a> again.
</body>
<?php include '../layout_foot.php'; ?>
</html>