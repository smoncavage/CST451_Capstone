<!--
Stephan Moncavage
CST-451
Capstone Project
7 May 2022
-->
<?php
include './layout_head.php';
error_reporting(E_ALL);
ini_set('display_errors',1);
include '../../Logger.php';
$logger = new MyLogger();
$log=$logger->getLogger();
$log->addRecord(1,"Entered Login.php page. ");
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
                            <label>
                                <input id = 'username' class = "login-input" type="text"  name = "username" placeholder = "Username" />
                            </label>
                            <label>
                                <input id = 'pass' class = "login-input" type="password"  name = "pass" placeholder ="Password"  />
                            </label>
                            <a href = "./loginResponse.php" ><input class = "login-button" type ="submit" value ="Login" name ="login"/></a>
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
<?php
include '../../BusinessService/UserBusinessService.php';
//Used for Session cookie data for login timing and check
session_unset();
if(session_id() === null) {
    session_start();
    session_set_cookie_params(time()+36000, "/", "", TRUE, FALSE);
    setcookie('user','');
    setcookie('pass', '');
    setcookie('startSess', '');
}
date_default_timezone_set("America/New_York");

// When form submitted, check and create user session.
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = stripslashes($_REQUEST["username"]);
    //echo $username;
    $_SESSION['username'] = $username;
    //echo $_SESSION['username'];
    $pass = stripslashes($_REQUEST["pass"]);
    $_SESSION['pass'] = $pass;
    $_SESSION['login_user'] = $username;
    $_SESSION['login_time'] = time();
    $usrSvc = new UserBusinessService();
    $valid = $usrSvc->searchByUsername($username);
    echo $valid[0][3] ."<br/>";
    $validpass = $usrSvc->searchByPassword($pass);
    echo $validpass[0][3];
    $datetime = new DateTime();
    $time=$datetime->setTimezone(new DateTimeZone('UTC'));

    try{
        //Ensure that the login is valid to open Sensor/Store/Cart pages
        if($valid == $validpass && $valid != null){
            $_SESSION["valid"] = 1;
            $logentry = $datetime->format('Y/m/d H:i:s') . $username . ': Logged In';
            $log->addRecord(1, $logentry);
            //Add the userdata to the cookies for verification
            setcookie('user',$username);
            setcookie('pass', 'valid');
            setcookie('startSess', $time->format('H:i:s'));
            echo "SESSION USER SET TO ". $_SESSION['username'];
            $_SESSION['valid']=1;
            header("Location:./loginResponse.php");
            throw new Exception("User passed Login: ", 202);
        }else{
            $logentry = $datetime->format('Y/m/d H:i:s') . $username . ': Login Attempt Failed';
            $log->addRecord(1, $logentry);
            header("Location:./loginFailed.php");
            throw new Exception("User Failed Login: ", 401);
        }
    }catch (Exception $e){
        //log to default error_log destination
        $logentry = $datetime->format('Y/m/d H:i:s') . ' ' . $e;
        $log->addRecord(1, $logentry);
        //System Log File for exception capture
        error_log($logentry);
        echo $datetime->format('Y/m/d H:i:s'). ' ' . $e;
    }
}
?>

<?php include './layout_foot.php'; ?>
