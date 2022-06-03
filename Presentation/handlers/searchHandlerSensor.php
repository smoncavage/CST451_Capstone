
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
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
<div class="container">
<?php
include '../views/layout_head.php';
error_reporting(E_ALL);
ini_set('display_errors',1);


include('../../BusinessService/SensorBusinessService.php');

//$searchPhrase = $_POST['searchSensor'];

$busserv = new SensorBusinessService();



?>

    <h2>Search Results</h2>
    <p>Results are as follows: <p>

<?php
$sensors = $busserv->getAllSensorData();
if($sensors){
    //include('_displaySensorSearchResults.php');
}
else{
    echo "No Sensors found with current search. Please try something else. </br>";
}
?>
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
