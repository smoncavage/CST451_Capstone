<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
Some portions based on code found on: https://codeofaninja.com/2015/08/simple-php-mysql-shopping-cart-tutorial.html
-->
<?php

include('./../../autoloader.php');
include('./../../Database/db.php');

function deleteUser(){
    $db=new Database();
    $rowId = $_SESSION['rowID'];
    $conn = $db->dbConnect();
    $query = "DELETE FROM users WHERE id = '$rowId' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: ./Store.php");
    return $result;
}

function deleteProduct(){
    $db=new Database();
    $rowId = $_SESSION['rowID'];
    $conn = $db->dbConnect();
    $query = "DELETE FROM products WHERE Product_ID = '$rowId' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: ./Store.php");
    return $result;
}

function deleteProductFromCart(){
    // get the product id
    $product_id = isset($_GET['id']) ? $_GET['id'] : "";
    
    // include object
    include_once "objects/cart_item.php";
    
    // get database connection
    $db = new Database();
    $conn=$db->dbConnect();
    
    // initialize objects
    $cart_item = new CartItem($conn);
    
    // remove cart item from database
    $cart_item->user_id=1; // we default to '1' because we do not have logged-in user
    $cart_item->product_id=$product_id;
    $cart_item->delete();
    
    // redirect to product list and tell the user it was added to cart
    header('Location: cart.php?action=removed&id=' . $product_id);
}
?>
