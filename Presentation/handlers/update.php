<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
Some portions based on code found on: https://codeofaninja.com/2015/08/simple-php-mysql-shopping-cart-tutorial.html
-->
<?php
include('auth_session.php');
sessCheck();
if($_SESSION['valid'] != 1){
	header("Location: ./login.php");
}
?>
<?php include 'layout_head.php';?>
<?php
session_start();
include('../../../autoloader.php');

$rowId = $_SESSION['rowID'];
$db = new Database();
$conn = $db->dbConnect();
$query = "SELECT * FROM users WHERE id = '$rowId' ";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_fetch_array($result);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$prodID = $_SESSION["rowid"];
	$prodName = $_REQUEST["name"];
	$prodDesc = $_REQUEST["description"];
	$prodPrice = $_REQUEST["price"];
	$prodPic = $_REQUEST["picture"];
	$query = "UPDATE products SET `Product_Name` = '$prodName', `Product_Description` = '$prodDesc', 
	'Product_Price' = '$prodPrice', 'Product_Picture' = $prodPic, WHERE Product_ID = '$prodID'";
	$result = mysqli_query($conn,$query);
	if ($conn->query($query) == TRUE) {
	}else{
		die("SQL Query failed: " . mysqli_error($conn));
	}
}

// get the product id
$product_id = isset($_GET['id']) ? $_GET['id'] : 1;
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";

// make quantity a minimum of 1
$quantity=$quantity<=0 ? 1 : $quantity;



// include object
include_once "objects/cart_item.php";

// get database connection
$db = new Database(); 
$conn = $db->dbConnect();

// initialize objects
$cart_item = new CartItem($db);

// set cart item values
$cart_item->user_id=1; // we default to '1' because we do not have logged in user
$cart_item->product_id=$product_id;
$cart_item->quantity=$quantity;

// add to cart
if($cart_item->update()){
    // redirect to product list and tell the user it was added to cart
    header("Location: cart.php?action=updated");
}else{
    header("Location: cart.php?action=unable_to_update");
}
?>
<form method="post" action="cart.php" enctype="multipart/form-data">
		Product Name: <input type="text" name="Product"><?php echo $_REQUEST['Product_Name']; ?>
		<br>
		Product Description: 
		<textarea name="product" rows="15" cols="60" name = "Description"><?php echo $_REQUEST['Product_Description']; ?></textarea>
		<br>
		<input TYPE="submit" name="upload" value="Submit"/>
</form>
	
<a href="./logout.php"> <input type = "submit" name = "logout" value = "Logout"/></a>
</body>
<?php include 'layout_foot.php'; ?>
</html>