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
session_start();
?>
<?php

include '../../Database/UserDataService.php';
require_once '../../Utility/myfuncs.php';
if(!isset($_SESSION['username'])){
    header("Location: ./loginFailed.php");
}
else {
    include '../views/layout_head.php';
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
                            if(isset($_SESSION['username'])){
                                $user = $_SESSION['username'];
                            }
                            //$user = stripslashes($_REQUEST['username']);
							echo $user;
                            //echo $_SESSION['username'];
							$_SESSION['username'] = $user;
							//$usrSvc = new UserDataService();
                            //$chkResult=$usrSvc->findByUsername($user);
							//if ($chkResult !== NULL) {
                            //    echo $chkResult[3];

						?>! You have Logged in Successfully!</h2>
		
		<!--<table class = "table">
                       
		<tr>
		<th>User ID</th>
		<th>User First Name</th>
		<th>User Last Name</th>
		<th>Username</th>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>Zip Code</th>
		<th>Country</th>
		<th>Role</th>
		</tr>
		<?php
		//$i=0;
		//while($row = mysqli_fetch_array($chkResult)) {
		?>
		<tr>
		<td><?php //echo $row['ID']; ?></td>
		<td><?php //echo $row["FIRST_NAME"]; ?></td>
		<td><?php //echo $row["LASTNAME"]; ?></td>
		<td><?php //echo $row["USERNAME"]; ?></td>
		<td><?php //echo $row["ADDRESS1"]; ?></td>
		<td><?php //echo $row["CITY"]; ?></td>
		<td><?php //echo $row["STATE"]; ?></td>
		<td><?php //echo $row["ZIP"]; ?></td>
		<td><?php //echo $row["COUNTRY"]; ?></td>
		<td><?php //echo $row["ROLE"]; ?></td>
		</tr> -->
		<?php
		//$i++;
		//}
		?>
		</table>
		<?php
		//}
		//else{
		//	echo "No result found";
		//}
		?>				
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
