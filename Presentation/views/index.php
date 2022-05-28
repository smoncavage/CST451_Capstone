<!--
Stephan Moncavage
CST-451
Capstone Project
02 May 2022
css Based on code by: Imran Hossain from https://imransdesign.com/
-->


<?php

include './layout_head.php';
error_reporting(E_ALL);
ini_set('display_errors',1);
//include_once '../../Utility/auth_session.php';
include '../../Logger.php';
$logger = new MyLogger();
$log=$logger->getLogger();
$log->addRecord(1,"Entered Index.php page. ");
?>

<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <p class="subtitle">Please Login or Register to Continue.</p>
                        <h1>Welcome to Automated Garden Watering!</h1>
                        <div class="hero-btns">
                            <a href="./login.php" class="boxed-btn">Log In</a>
                            <a href="./register.html" class="bordered-btn">Register With Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<?php
include 'layout_foot.php';
?>

