<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2022
Issue Message after Checkout
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

<?php include '../views/layout_head.php'; ?>

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
// include classes
include_once "../../Database/db.php";
include_once "./cart_item.php";

$db = dbConnect();

// initialize objects
$cart_item = new CartItem($db);

// remove all cart item by user, from database
$cart_item->user_id=1; // we default to '1' because we do not have logged in user
$cart_item->deleteByUser();

// set page title
$page_title="Thank You!";

// include page header HTML
include_once 'layout_head.php';
?>
<div class='col-md-12'>";
<!-- tell the user order has been placed -->
<div class='alert alert-success'>
<strong>Your order has been placed!</strong> Thank you very much!
</div>
</div>

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

<?php include '../views/layout_foot.php'; ?>
</html>