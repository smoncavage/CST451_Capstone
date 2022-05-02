<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php 
include '../layout_head.php';
?>
<html lang="">
<link rel = "stylesheet" href = "../../css/style.css" type="text/css">
<body class="form2"> 
<?php
    include_once('./../../../autoloader.php');
	//session_start();
	//startSess();
	//$conn = dbConnect();
	
	date_default_timezone_set("America/New_York");
	
    // When form submitted, check and create user session.
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$username = stripslashes($_REQUEST["username"]);
			$_SESSION['username'] = $username;
			$pass = stripslashes($_REQUEST["pass"]);
			$_SESSION['pass'] = $pass;
			$_SESSION['login_user'] = $username;
			$_SESSION['login_time'] = time();
			saveUserId($username);
			$valid = checkUser();
			
			echo $_SESSION["valid"];
			try{
				$_SESSION["valid"] = $valid;
				if(session_id() !== NULL){
					header("Location:../store.php");
					throw new Exception("User passed Login: ", 202);
				}else{
					header("Location:./loginFailed.php");
					throw new Exception("User Failed Login: ", 202);
				}
			}catch (Exception $e){
			$datetime = new DateTime();
			$datetime->setTimezone(new DateTimeZone('UTC'));
			$logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;
		
			//log to default error_log destination
			error_log($logentry);
			}	
			//$row = $result-fetch_assoc();
		}	
?>
	<form class = "form" method = "post">
        <h1 class="login-title"><b>Login</b></h1>
        <label>
            <input class = "login-input" type="text"  name = "username" placeholder = "Username" />
        </label>
        <label>
            <input class = "login-input" type="password"  name = "pass" placeholder ="Password"  />
        </label>
        <a href = "./login.php" ><input class = "login-button" type ="submit" value ="Login" name ="login"/></a>
		<br>
		<br>
		<a href = "../../../index.php">Cancel</a>
        <br>
		<br>
		<a href = "./register.html">New Registration</a>
	</form>
</body>
<?php include '../layout_foot.php'; ?>
</html>