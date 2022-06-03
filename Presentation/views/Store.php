<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2021
-->

<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once('../../BusinessService/ProductBusinessService.php');
include '../../Logger.php';
$logger = new MyLogger();
$log=$logger->getLogger();
$log->addRecord(1,"Entered Store.php page. ");
if(isset($_REQUEST['user'])){
    include '../views/layout_head.php';
    $log->addRecord(1,"Store Page Load Layout Header File. ");
}
else {
    header("Location: ./login.php");
    $log->addRecord(1,"Store page Re-Direct to Login.php - Session Variable Not Set. ");
}
?>

<body class = "body" style="text-align:center">
<div style="text-align:center" class="container" id="main-content">
    <br/>
    <br/>
    <br/>
	<br/>
    <br/>
	<div style="text-align:center" class="container">
          <div style="text-align:center" >
          <h1>Product Page</h1>
              <?php
                $service = new ProductBusinessService();
                $service->searchAllProducts();
              ?>
        </div>
   </div>
</div>


<div>
    <br/>
    <a href = "logout.php" class = "boxed-btn"> Logout </a>
    <br/>
</div>
<div>
    <br/>
</div>

</body>

<?php include '../views/layout_foot.php'; ?>
