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

?>
<?php
include './layout_head.php';
include '../../Database/UserDataService.php';
?>
<body class = "body">
    <div class="form">
		<!-- <a href="../../Utility/whoAmI.php">Who Am I</a> -->
		<h2>Thank You <?php
                            $user = $_SESSION['username'];
                            //$user = stripslashes($_REQUEST["username"]);
							echo $user;
							$_SESSION['username'] = $user;
							$usrSvc = new UserDataService();
                            $chkResult=$usrSvc->findByUsername($user);
							if ($chkResult !== NULL) {
                                echo $chkResult[3];
						?>! You have Logged in Successfully!</h2>
		
	<!--	<table class = "table">
                       
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
		//while($row = mysqli_fetch_array($result)) {
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
		</tr>
		<?php
		//$i++;
		//}
		?>
		</table> -->
		<?php
		}
		else{
			echo "No result found";
		}
		?>				
		<br>
		<a href = "sensor.php">Continue</a>
    </div>
</body>
<?php include 'layout_foot.php';?>
