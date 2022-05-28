<!--
Stephan Moncavage
CST-451
Capstone Project
08 May 2022
PHP Form handler for HTML Registration Module
-->
<?php include './layout_head.php'; ?>

<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">



<?php
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
$sql = "INSERT INTO user (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD, EMAIL)
VALUES ('$firstname','$lastname','$username', '$password', '$email')";

try {
    //Validate Statement and execute
    if ($firstname && $lastname && $username && $pass && $email != NULL) {
        if (!mysqli_connect_errno()) {
            echo "Thank you for registering with us ";
            //check errors
            if ($firstnameErr && $lastnameErr && $usernameErr && $passErr && $emailErr && $addressErr && $cityErr && $stateErr && $zipcodeErr && $countryErr == NULL) {
                echo "Information is in correct Format.";
            }
            throw new Exception("New User Registered: ", 202);
        }
    } else {
        //Error List
        echo "Error: ";
        echo $firstnameErr . " ";
        echo $lastnameErr . " ";
        echo $usernameErr . " ";
        echo $passErr . " ";
        //Database Connection OR Insertion errors used in Development

        echo " Error: " . $sql . "" . $conn->error;
        echo "Error: " . $sql . "" . mysqli_error($conn);
        throw new Exception("User Registration Failed: " . ' ' . mysqli_error($conn), 200);

        //header("Location: loginFailed.php/");
    }
		//return "./loginFailed.php";
        //die();
        ?>
		<a href = './register.html'>
        <?php echo "Return "?></a>
        <?php echo " to Registration Page, or use Browser 'Back' Button to enter missing information.";
	}catch (Exception $e){
		$datetime = new DateTime();
		$datetime->setTimezone(new DateTimeZone('UTC'));
		$logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;
			
		//log to default error_log destination
		error_log($logentry);
	}
$conn->close;
?>
Click <a href = "./index.php" class ="boxed-btn"> here </a> to return to the Main page, or
	<a href = "./login.php" class = "boxed-btn"> here </a> to go to the Login page.

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<?php include './layout_foot.php'; ?>
