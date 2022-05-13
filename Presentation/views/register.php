<!--
Stephan Moncavage
CST-451
Capstone Project
08 May 2022
PHP Form handler for HTML Registration Module
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title -->
    <title>GCU-CST451</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="../css/assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../css/assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="../css/assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="../css/assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../css/assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="../css/assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../css/assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="../css/assets/css/responsive.css">

</head>


<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<?php include './layout_head.php'; ?>

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <label><input type="text" placeholder="Keywords"></label>
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->

<?php
include_once'../../../autoloader.php';
include './layout_head.php';
include '../../Database/db.php';
//include '../navigation.php';
$db = new Database();
$conn=$db->dbConnect();
$firstname = $lastname = $username = $pass = $email = $address1 = $city = $state = $zipcode = $country = "";
$address2 = $_REQUEST["address2"];
$role = $_REQUEST["role"];
$firstnameErr = $lastnameErr = $usernameErr = $passErr = $emailErr = $addressErr = $cityErr = $stateErr = $zipcodeErr = $countryErr = NULL;

//Test Input Values from HTML Form. Found on https://www.w3schools.com/php/php_form_required.asp
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$firstname = $_REQUEST["firstname"];
	$lastname = $_REQUEST["lastname"];
	$username = $_REQUEST["username"];
	$pass1 = $_REQUEST["pass1"];
	$pass2 = $_REQUEST["pass2"];
	$email = $_REQUEST["email"];
	$address1 = $_REQUEST["address1"];
	$city = $_REQUEST["city"];
	$state = $_REQUEST["state"];
	$zipcode = $_REQUEST["zipcode"];
	$country = $_REQUEST["country"];
	
  if (empty($firstname)) {
    $firstnameErr = "First Name is required. ";
  } else {
    $firstname = test_input($_REQUEST["firstname"]);
    // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed. ";
    }
  }
  if (empty($lastname)) {
    $lastnameErr = "Last Name is required. ";
  } else {
    $lastname = test_input($_REQUEST["lastname"]);
    // check if last name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed. ";
    }
  }
  if (empty($username)) {
    $usernameErr = "User Name is required. ";
  }else {
    $username = test_input($_REQUEST["username"]);
    // check if username only contains letters, numbers, and whitespace
	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$username)) {
      $usernameErr = "Only letters, numbers, and white space allowed. ";
    }
  }
  if (empty($pass1)) {
    $passErr = "Password is required. ";
  }
  if ($pass1 != $pass2) {
      $passErr = "Passwords Must Match. ";
    }else {
    $pass = test_input($_REQUEST["pass1"]);
	if (!preg_match("/^[a-zA-Z0-9!@#$%^&*()]*$/", $pass)){
    // check if username only contains letters, numbers, and whitespace
		$passErr = "Only letters, numbers, and special characters " . " '!@#$%^&*()' " . "allowed. ";
	}
  }
  if (empty($email)) {
    $emailErr = "Email is required. ";
  } else {
    $email = test_input($_REQUEST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format. ";
    }
  }
  if (empty($address1)) {
    $addressErr = "Address is required. ";
  }
  if (empty($city)) {
    $cityErr = "City is required. ";
  }
  if ($state == 'Not Selected') {
    $stateErr = "State is required. ";
  }
  if (empty($zipcode)) {
    $zipcodeErr = "Zipcode is required. ";
  }else {
    $zipcode = test_input($_REQUEST["zipcode"]);
    // check if zipcode only contains numbers
	if (!preg_match("/^[0-9 ]*$/",$zipcode)) {
      $zipcodeErr = "Only 5 numbers are allowed for Zip Code. ";
    }
  }
  if ($country == 'Not Selected') {
    $countryErr = "Country is required. ";
  }
  
}

//Test Input Function found on https://www.w3schools.com/php/php_form_required.asp
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Secure the Password Added on 7/26/2020
$password = password_hash($pass, PASSWORD_DEFAULT);

//Create MSQLI Statement for User Insertion
$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD, EMAIL)
VALUES ('$firstname','$lastname','$username', '$password', '$email')";

try{
	//Validate Statement and execute
	if($firstname && $lastname && $username && $pass && $email != NULL){
		if ($conn($sql) == TRUE) {
			echo "Thank you for registering with us";
			//check errors
			if($firstnameErr && $lastnameErr && $usernameErr && $passErr && $emailErr && $addressErr && $cityErr && $stateErr && $zipcodeErr && $countryErr == NULL){	
				echo "Information is in correct Format.";
			}
			throw new Exception("New User Registered: ", 202);
		}
	}else {
		//Error List
		echo "Error: ";
		echo $firstnameErr . " ";	
		echo $lastnameErr . " ";	
		echo $usernameErr . " ";	
		echo $passErr . " ";
		//Database Connection OR Insertion errors used in Development
			
		echo " Error: " . $sql . "" . $conn->error ;
		echo "Error: " . $sql . "" . mysqli_error($conn);	
		throw new Exception("User Registration Failed: " . ' ' . mysqli_error($conn), 200);

		//header("Location: loginFailed.php/");

		return "../loginFailed.php";
        //die();
        ?>
		<a href = './register.html'>
        <?php echo "Return "?></a>
        <?php echo " to Registration Page, or use Browser 'Back' Button to enter missing information.";
	}
	}catch (Exception $e){
		$datetime = new DateTime();
		$datetime->setTimezone(new DateTimeZone('UTC'));
		$logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;
			
		//log to default error_log destination
		error_log($logentry);
	}
$conn->close;
?>

<link rel="stylesheet" href="../css/style.css"/>
Click <a href = "./index.php"> here </a> to return to the Main page, or
	<a href = "./login.php"> here </a> to go to the Login page.

<!-- jquery -->
<script src="../css/assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="../css/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="../css/assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="../css/assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="../css/assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="../css/assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="../css/assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="../css/assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="../css/assets/js/sticker.js"></script>
<!-- main js -->
<script src="../css/assets/js/main.js"></script>

<?php include './layout_foot.php'; ?>
</html>