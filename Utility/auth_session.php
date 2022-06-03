<!--
Stephan Moncavage
CST-451
Capstone Project
19 May 2022
Session Authorization Functions
-->
<?php
	include_once('myfuncs.php');
	$sessTime = $_SESSION['login_time'] + (15 * 60);
	if (isSessionStarted() === FALSE){
		session_cache_expire(30);
		session_start();
		setTimeStamp(time());
	}
	function sessCheck(){
		$sessTime = getTimeStamp() + (15 * 60);
		$now = strtotime(time());
		if(!$sessTime){
			header("Location: ./logout.php");
		}else{
			
			if($now <= ($sessTime)){
				$_SESSION['valid'] = 1;
	
			}else{
				$_SESSION['valid'] = 2;
				echo "Session has Expired ";
				header('Location: ./logout.php');
			}
		}
	}
?>