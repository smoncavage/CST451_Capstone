<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2022
Login Response Page
-->
<?php
//include auth_session.php file on all user panel pages
//include("../../Utility/auth_session.php");
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<?php

include '../../Database/UserDataService.php';
require_once '../../Utility/myfuncs.php';
if(isset($_COOKIE['user'])){
    include '../views/layout_head.php';
}
else {
    header("Location: ./loginFailed.php");
}
?>
<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <form class = "form" method = "POST">
                            <h1 class="login-title"><b>Login</b></h1>
    <div class="form">
		 <!-- <a href="../../Utility/whoAmI.php">Who Am I</a> -->
		<h2>Thank You <?php
                            $user = null;
                            $action = $_GET['action'] ?? "";
                            if(isset($_COOKIE['user'])){
                                $user = $_COOKIE['user'];
                            }
                            //$user = stripslashes($_REQUEST['username']);
							echo $user;
                            //echo $_SESSION['username'];
							//$_SESSION['user'] = $user;
							$usrSvc = new UserDataService();
                            $chkResult=$usrSvc->findByUsername($user);
							if ($chkResult !== NULL) {
                                //header("Location: ./loginFailed.php");
                            }
						?>! You have Logged in Successfully!
		</h2>
		<br>
		<a href = "sensor.php" class = "boxed-btn">Continue</a>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout_foot.php';?>