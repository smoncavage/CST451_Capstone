<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php
include './layout_head.php';
error_reporting(E_ALL);
ini_set('display_errors',1);
?>
<body class = "body">
<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <?php
                        //echo $_SESSION['username'];
                        //echo $_SESSION['pass'];
                        //echo $_SESSION['valid'];
                        if($_SESSION['username'] == NULL){
                            $message = "Username is Missing, ";
                        }elseif($_SESSION['pass'] == NULL){
                            $message = "Password is missing, ";
                        }elseif($_SESSION['valid'] != 1){
                            $message = "Username or Password was not found, ";
                        }else{
                            $message = "session has encountered an error, ";
                        }
                        ?>
                        <div class="form">
                            <h2>We are sorry about this but your, <?php echo $message ?> please try again or create a new account!</h2>
                            <br>
                            <a href = "./login.php" class="boxed-btn">Return</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->
</body>
<?php include 'layout_foot.php'; ?>
