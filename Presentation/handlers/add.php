<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 4
21 March 2021
Add.php update to include add to cart
Some portions based on code found on: https://codeofaninja.com/2015/08/simple-php-mysql-shopping-cart-tutorial.html
-->
<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
//session_start();

if(isset($_REQUEST['product-id'])){
    addProducttoCart($_REQUEST['hidden_name'], $_REQUEST['product-id']);
}
function addUser($user){
    $rowId = $_SESSION['rowID'];
    $db = new Database();
    $conn = $db->dbConnect();
    $query = "ADD ".$user. " FROM users WHERE id = '$rowId' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: ./login.php");
    return $result;
}

function addProduct($product, $rowId){
    $rowId = $_REQUEST['product-id'];
    $db = new Database();
    $conn = $db->dbConnect();
    $query = "ADD ".$product. " FROM products WHERE id = '$rowId' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: ./Store.php");
    return $result;
}
function addProductToCart(){
    $product_id = isset($_REQUEST['hidden_ID']) ? $_REQUEST['hidden_ID'] : "";
    $quantity = isset($_REQUEST['quantity']) ? $_REQUEST['quantity'] : 1;

    // make quantity a minimum of 1
    $quantity=$quantity<=0 ? 1 : $quantity;
    $cart_item = [];
    // set cart item values
    $cart_item->user_id; // we default to '1' because we do not have logged in user
    $cart_item->product_id=$product_id;
    $cart_item->quantity=$quantity;

    // check if the item is in the cart, if it is, do not add
    if($cart_item->exists()){
        // redirect to product list and tell the user it was added to cart
        header("Location: cart.php?action=exists");
    }

    // else, add the item to cart
    else{
        // add to cart
        if($cart_item->create()){
            // redirect to product list and tell the user it was added to cart
            header("Location: product.php?id={$product_id}&action=added");
        }else{
            header("Location: product.php?id={$product_id}&action=unable_to_add");
        }
    }

    $db = new Database();
    $conn = $db->dbConnect();
    $query = "ADD ". $cart_item . " TO cart WHERE id = '$product_id' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    header("Location: ./cart.php");
    return $result;
}
?>