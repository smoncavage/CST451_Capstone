
<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php
require_once 'myfuncs.php';
include_once '../../autoloader.php';
function getAllUsers(){
	$conn = dbConnect(); 
	try{
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			throw new Exception("SQL Query Failed - Could not connect to DB: " . mysqli_error($conn), 302);
			exit();
		}
	}catch (Exception $e){
		$datetime = new DateTime();
		$datetime->setTimezone(new DateTimeZone('UTC'));
		$logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;
		
		//log to default error_log destination
		error_log($logentry);
	}	
	try{	
		$query = " SELECT ID, FIRST_NAME, LASTNAME FROM users ";
		$result = mysqli_query($conn, $query);
		if(!$result){
			die("Could not retrieve data: " . mysqli_error($conn));
			throw new Exception("SQL Query Failed - Could not retreieve data: " . mysqli_error($conn), 302);
		}
	}catch (Exception $e){
		$datetime = new DateTime();
		$datetime->setTimezone(new DateTimeZone('UTC'));
		$logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;
		
		//log to default error_log destination
		error_log($logentry);
	}
	$users = [];
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){
		$users[$index] = array(
			$row["ID"], $row["FIRST_NAME"], $row["LASTNAME"]
		);
		++$index;	
	}
	/*
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$users[$index] = array(
			$row["ID"], $row["FIRSTNAME"], $row["LASTNAME"]
		);
		++$index;
		*/
	//mysqli_free_result($result);
	mysqli_close($conn);
	return $users;
}

function insertUsers(){
	$conn = dbConnect();
	//Multi-Dimentional Array for Users
	//SQL Table - ID, FIRST_NAME, LASTNAME, USERNAME, pass, EMAIL, ADDRESS1, ADDRESS2, CITY, STATE, ZIP, COUNTRY
	$usrArray = Array(
		Array("0", "admin", "admin", "admin", "admin", "admin@admin.com", "124 Admin Way", "", "Buloxi", "MS", "12345", "US"),
		Array("1", "superadmin", "superadmin", "super", "super", "superadmin@admin.com", "124 Admin Way", "", "Buloxi", "MS", "12345", "US"),
		Array("2", "user", "user", "user", "user", "user@user.com", "124 User Way", "", "Kent", "WI", "12345", "US"),
		Array("3", "John", "Doe", "jdoe", "password", "john@aol.com", "9874 Florist Dr", "", "Buford", "AL", "64583", "US"),
		Array("4", "Jennifer", "Star", "Jstarter", "Jendoesbest", "hoity@toity.com", "8080 Sunset Blvd", "", "Los Angeles", "CA", "98741", "US"),
	);
	
	for($i = 0; $i <= count($usrArray);  $i++){
	$qry = "INSERT INTO user VALUES '$usrArray[$i]'";
	$result = mysqli_query($conn, $qry) or die(mysqli_error($conn));
	}
}


?>