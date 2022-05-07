<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
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
                        <input type="text" placeholder="Keywords">
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->
<?php
include_once('./../../../autoloader.php');
//session_start();
//startSess();
//$conn = dbConnect();

date_default_timezone_set("America/New_York");

// When form submitted, check and create user session.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = stripslashes($_REQUEST["username"]);
    $_SESSION['username'] = $username;
    $pass = stripslashes($_REQUEST["pass"]);
    $_SESSION['pass'] = $pass;
    $_SESSION['login_user'] = $username;
    $_SESSION['login_time'] = time();
    saveUserId($username);
    $valid = checkUser();

    echo $_SESSION["valid"];
    try{
        $_SESSION["valid"] = $valid;
        if(session_id() !== NULL){
            header("Location:../store.php");
            throw new Exception("User passed Login: ", 202);
        }else{
            header("Location:./loginFailed.php");
            throw new Exception("User Failed Login: ", 202);
        }
    }catch (Exception $e){
        $datetime = new DateTime();
        $datetime->setTimezone(new DateTimeZone('UTC'));
        $logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;

        //log to default error_log destination
        error_log($logentry);
    }
    //$row = $result-fetch_assoc();
}
?>
<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <form class = "form" method = "post">
                            <h1 class="login-title"><b>Login</b></h1>
                            <label>
                                <input class = "login-input" type="text"  name = "username" placeholder = "Username" />
                            </label>
                            <label>
                                <input class = "login-input" type="password"  name = "pass" placeholder ="Password"  />
                            </label>
                            <a href = "./login.php" ><input class = "login-button" type ="submit" value ="Login" name ="login"/></a>
                            <br>
                            <br>
                            <a href = "./index.php" class = "boxed-btn">Cancel</a>
                            <br>
                            <br>
                            <a href = "./register.html" class = "boxed-btn"> New Registration</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

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