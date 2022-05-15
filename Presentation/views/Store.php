<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2021
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

<?php
// include('auth_session.php');
// sessCheck();
// if($_SESSION["valid"] != 1){
//     header("Location: ./login/login.php");
// }
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include '../views/layout_head.php';
include('./_displayAllProducts.php');
//include('../../autoloader.php');
//displayAllProducts();
?>

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

<body class = "body" style="text-align:center">
<div style="text-align:center" class="container" id="main-content">
    <br/>
    <br/>
    <br/>
	<br/>
    <br/>
	<div style="text-align:center" class="container">
          <div style="text-align:center" class="col-md-10 col-md-offset-1">
          <h1>Product Page</h1>
                <table style="text-align:center" class="table table-striped table-condensed table-bordered table-rounded">
                        <thead style="text-align:center">
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($results)){
                            for($i = 0; $i < count($results->data); $i++) ?>
                    		<tr>
                            <td><?php echo $results->data[$i]['Product ID']; ?></td>
                            <td><?php echo $results->data[$i]['Product Name']; ?></td>
                            <td><?php echo $results->data[$i]['Product Description']; ?></td>
                            <td><?php echo $results->data[$i]['Price']; ?></td>
                            <td><?php echo $results->data[$i]['Image']; ?></td>
                    		</tr>
            				<?php }//endfor; ?>
                        </tbody>
                </table>
        </div>
   </div>
</div>


<h2 style="color:red">Products Coming Soon!</h2>
</body>

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