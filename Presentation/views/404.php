<!--
Stephan Moncavage
CST-451
Capstone Project
02 May 2022
css Based on code by: Imran Hossain from https://imransdesign.com/
-->
<?php
header("Location: https://cst451-capstone.herokuapp.com/Presentation/views/index.php");
die();
?>
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

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh adn Organic</p>
					<h1>404 - Not Found</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->
<!-- error section -->
<div class="full-height-section error-section">
	<div class="full-height-tablecell">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="error-text">
						<i class="far fa-sad-cry"></i>
						<h1>Oops! Not Found.</h1>
						<p>The page you requested for is not found.</p>
						<a href="index.html" class="boxed-btn">Back to Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end error section -->


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
