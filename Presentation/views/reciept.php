<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 5
27 March 2021
Receipt Creation Page
-->
<?php
include('../../../autoloader.php');

$page_title="Checkout";

include 'layout_head.php';
class reciept{
	public function createReciept($numofitems, $total){
		echo "Your order has been placed for a total of ".$total."! Please allow 3-5 business days for your 
             ".$numofitems." items to be processed and shipped.</br></br></br>";
		
	}
	
	public function emailReciept($emailaddress){
		
	}
}
include 'layout_foot.php';
?>