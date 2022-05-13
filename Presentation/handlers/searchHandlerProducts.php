<!--
Stephan Moncavage
CST-451
Capstone Project
11 May 2022
-->
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include '../views/layout_head.php';
//sessCheck();
/* if($_SESSION["valid"] != 1){
	header("Location: ../views/login.php");
} */
?>
<?php //include('../../autoloader.php');; ?>
<body class = "body">

<form class = "form3" method = "post" >  
 
<?php
//include "myfuncs.php";

function getAllProducts(){
    $db = new Database();
	$conn = $db->dbConnect();
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	$query = " SELECT * FROM products ";
	$result = mysqli_query($conn, $query);
	if(!$result){
		die("Could not retrieve data: " . mysqli_error($conn));
	}
	$products = [];
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){
		$products[$index] = array(
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
	return $products;
}

function getUsersByFirstName($search){
    $db = new Database();
    $conn = $db->dbConnect();
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	if($search == " "){
		getAllUsers();
	}else{
		$query = " SELECT * FROM users WHERE 'FIRST_NAME' LIKE '%$search%'";
	}
	$result = mysqli_query($conn, $query);
	if(!$result){
		die("Could not retrieve data: " . mysqli_error($conn));
		return null;
	}
	$users = [];
	$index = 0;
	while($row = mysqli_fetch_assoc($result)){
		$users[$index] = array(
			$row["ID"], $row["FIRST_NAME"], $row["LASTNAME"], $row["USERNAME"]
		);
		++$index;	
		return $users;
	}	
	mysqli_close($conn);
	
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$searchPattern = $_REQUEST["searchPattern"];
	echo "Searching by: " . $searchPattern . "<br>";
	$user = getUsersByFirstName($searchPattern);
	//echo implode(",", $user);
	//$rslt = [];
	//$index = count($user);
	if($user == null){
		echo "<br> No results found. <br>";
	}else{
		foreach($user as $usr){
		//for($i = 0; $i <= count($user); $i++){
			//for($j = 0; $j <= count($row); $j++){
			echo "<br> User Id: " . $usr[0] . " First Name: " . $usr[1] . " Last Name: " . $usr[2] . " Username: " . $usr[3] . "<br>";
			//}
		}
		//echo "<ul><li>" . implode("</li><li>", $user) . "</li></ul>";
		echo "<br>";
		//print_r($user);
	}
	
}
?>

