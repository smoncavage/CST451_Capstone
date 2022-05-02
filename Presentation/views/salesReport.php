<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 6
04 April 2021
-->
<link rel = "stylesheet" href = "../../css/style.css" type="text/css"/>
<?php
include('auth_session.php');
include('../../../autoloader.php');
sessCheck();
if($_SESSION["valid"] != 1){
    header("Location: ./login/login.php");
}
?>
<?php 
include './layout_head.php';
include '../handlers/searchHandlerProducts.php';
getAllOrders();
?>