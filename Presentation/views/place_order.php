<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 4
21 March 2021
Issue Message after Checkout
Some portions based on code found on: https://codeofaninja.com/2015/08/simple-php-mysql-shopping-cart-tutorial.html
-->
<?php
// include classes
include_once "db.php";
include_once "objects/cart_item.php";

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

echo "<div class='col-md-12'>";
// tell the user order has been placed
echo "<div class='alert alert-success'>";
echo "<strong>Your order has been placed!</strong> Thank you very much!";
echo "</div>";
echo "</div>";

// include page footer HTML
include_once 'layout_foot.php';