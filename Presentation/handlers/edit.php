<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 3
14 March 2021
-->
<?php
session_start();

include('../../../autoloader.php');

function editUser($user){
	try{
		$rowId = $_SESSION['rowID'];
		$conn = dbConnect();
		$query = "Update ".$user. " FROM users WHERE id = '$rowId' ";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		throw new Exception("User Database Updated: ", 202);
		header("Location: ./Store.php");
	}catch (Exception $e){
		$datetime = new DateTime();
		$datetime->setTimezone(new DateTimeZone('UTC'));
		$logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;
			
		//log to default error_log destination
		error_log($logentry);
	}
    return $result;
}

function editProduct($product){
	try{
    $rowId = $_SESSION['rowID'];
    $conn = dbConnect();
    $query = "UPDATE ".$product. " FROM products WHERE id = '$rowId' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	throw new Exception("Product Database Updated: ", 202);
    header("Location: ./Store.php");
	}catch (Exception $e){
		$datetime = new DateTime();
		$datetime->setTimezone(new DateTimeZone('UTC'));
		$logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;
			
		//log to default error_log destination
		error_log($logentry);
	}
    return $result;
}

function editQuantity ($product){
    
}


?>