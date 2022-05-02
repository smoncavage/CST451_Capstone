<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php
	include_once('myfuncs.php');
	//$sessTime = $_SESSION['login_time'] + (15 * 60);
	//$now = strtotime(time());
	if (isSessionStarted() === FALSE){
		session_cache_expire(30);
		session_start();
		setTimeStamp(time());
	}
	function sessCheck(){
		//if(isset($_SESSION['sess_time']) && (time() - $_SESION['sess_time'] >= (15 * 60))){
		$sessTime = getTimeStamp() + (15 * 60);
		$now = strtotime(time());
		if(!$sessTime){
			header("Location: ./logout.php");
		}else{
			
			if($now <= ($sessTime)){
				$_SESSION['valid'] = 1;
	
			}else{
			//while(time() >= ($_SESSION['sess_time'] + (15 * 60))){
				//logged in more than an 15 minutes ago
				//session_unset();
				//session_destroy();
				$_SESSION['valid'] = 2;
				echo "Session has Expired ";
				header('Location: ./logout.php');
			//}
			}
		}
	}	
	
	//while(time() >= ($_SESSION['sess_time'] + (5 * 60))){
	//	startSess();
	//}
?>