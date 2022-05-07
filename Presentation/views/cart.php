<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2022
Cart Creation and Manipulation Page
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

<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <?php
                        include('../../Utility/auth_session.php');
                        include('../../../autoloader.php');
                        include '../../Database/db.php';
                        include_once 'cart_item.php';

                        $page_title="Cart";

                        $action = isset($_GET['action']) ? $_GET['action'] : "";

                        echo "<div class='col-md-12'>";
                        if($action=='removed'){
                            echo "<div class='alert alert-info'>";
                            echo "Product was removed from your cart!";
                            echo "</div>";
                        }

                        else if($action=='quantity_updated'){
                            echo "<div class='alert alert-info'>";
                            echo "Product quantity was updated!";
                            echo "</div>";
                        }

                        else if($action=='exists'){
                            echo "<div class='alert alert-info'>";
                            echo "Product already exists in your cart!";
                            echo "</div>";
                        }

                        else if($action=='cart_emptied'){
                            echo "<div class='alert alert-info'>";
                            echo "Cart was emptied.";
                            echo "</div>";
                        }

                        else if($action=='updated'){
                            echo "<div class='alert alert-info'>";
                            echo "Quantity was updated.";
                            echo "</div>";
                        }

                        else if($action=='unable_to_update'){
                            echo "<div class='alert alert-danger'>";
                            echo "Unable to update quantity.";
                            echo "</div>";
                        }
                        echo "</div>";

                        $cart_count=$_REQUEST['cartcount'];
                        // $cart_count variable is initialized in navigation.php
                        if($cart_count>0){

                            $cart_item->user_id="1";
                            $stmt=$cart_item->read();

                            $total=0;
                            $item_count=0;

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row);

                                $sub_total=$price*$quantity;

                                echo "<div class='cart-row'>";
                                echo "<div class='col-md-8'>";
                                // product name
                                echo "<div class='product-name m-b-10px'>";
                                echo "<h4>{$name}</h4>";
                                echo "</div>";

                                // update quantity
                                echo "<form class='update-quantity-form'>";
                                echo "<div class='product-id' style='display:none;'>{$id}</div>";
                                echo "<div class='input-group'>";
                                echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity' min='1' />";
                                echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-default update-quantity' type='submit'>Update</button>";
                                echo "</span>";
                                echo "</div>";
                                echo "</form>";

                                // delete from cart
                                echo "<a href='remove_from_cart.php?id={$id}' class='btn btn-default'>";
                                echo "Delete";
                                echo "</a>";
                                echo "</div>";

                                echo "<div class='col-md-4'>";
                                echo "<h4>$" . number_format($price, 2, '.', ',') . "</h4>";
                                echo "</div>";
                                echo "</div>";

                                $item_count += $quantity;
                                $total+=$sub_total;
                            }

                            echo "<div class='col-md-8'></div>";
                            echo "<div class='col-md-4'>";
                            echo "<div class='cart-row'>";
                            echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
                            echo "<h4>$" . number_format($total, 2, '.', ',') . "</h4>";
                            echo "<a href='checkout.php' class='btn btn-success m-b-10px'>";
                            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout";
                            echo "</a>";
                            echo "</div>";
                            echo "</div>";

                        }

                        else{
                            echo "<div class='col-md-12'>";
                            echo "<div class='alert alert-danger'>";
                            echo "No products found in your cart!";
                            echo "</div>";
                            echo "</div>";
                        }

                        if(isset($_POST["cart"]))
                        {
                            if(isset($_SESSION["cart"]))
                            {
                                $item_array_id = array_column($_SESSION["cart"], "Product_ID");
                                if(!in_array($_GET["id"], $item_array_id))
                                {
                                    $count = count($_SESSION["shopping_cart"]);
                                    $item_array = array(
                                        'Product_ID'		=>	$_GET["Product_ID"],
                                        'Product_Name'		=>	$_POST["Product_Name"],
                                        'Product_Price'		=>	$_POST["Product_Price"],
                                        'Product_Qty'		=>	$_POST["Product_Qty"]
                                    );
                                    $_SESSION["shopping_cart"][$count] = $item_array;
                                }
                                else
                                {
                                    echo '<script>alert("Item Already Added")</script>';
                                }
                            }
                            else
                            {
                                $item_array = array(
                                    'Product_ID'		=>	$_GET["Product_ID"],
                                    'Product_Name'		=>	$_POST["Product_Name"],
                                    'Product_Price'		=>	$_POST["Product_Price"],
                                    'Product_Qty'		=>	$_POST["Product_Qty"]
                                );
                                $_SESSION["shopping_cart"][0] = $item_array;
                            }
                        }

                        if(isset($_GET["action"]))
                        {
                            if($_GET["action"] == "delete")
                            {
                                foreach($_SESSION["cart"] as $keys => $values)
                                {
                                    if($values["Product_ID"] == $_GET["id"])
                                    {
                                        unset($_SESSION["cart"][$keys]);
                                        echo '<script>alert("Item Removed")</script>';
                                        echo '<script>window.location="Store.php"</script>';
                                    }
                                }
                            }
                        }

                        ?>
                        <body>
                        <br />
                        <div class="container">
                            <br />
                            <br />
                            <br />
                            <h3 align="center">Shoping Cart</h3><br />
                            <br /><br />
                            <?php
                            $db = new Database();
                            $conn = $db->dbConnect();
                            $query = "SELECT * FROM products ORDER BY id ASC";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                    <div class="col-md-4">
                                        <form method="post" action="add.php?action=add&id=<?php echo $row["id"]; ?>">
                                            <div style="border:3px solid #5eb95d; background-color:grey; border-radius:5px; padding:16px;" align="center">
                                                <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

                                                <h4 class="text-info"><?php echo $row["Product_Name"]; ?></h4>

                                                <h4 class="text-danger">$ <?php echo $row["Product_Price"]; ?></h4>

                                                <input type="text" name="quantity" value="1" class="form-control" />

                                                <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />

                                                <input type="hidden" name="hidden_price" value="<?php echo $row["Product_Price"]; ?>" />

                                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div style="clear:both"></div>
                            <br />
                            <h3>Order Details</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="40%">Item Name</th>
                                        <th width="10%">Quantity</th>
                                        <th width="20%">Price</th>
                                        <th width="15%">Total</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                    <?php
                                    if(!empty($_SESSION["cart"]))
                                    {
                                        $total = 0;
                                        foreach($_SESSION["cart"] as $keys => $values)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $values["Product_Name"]; ?></td>
                                                <td><?php echo $values["Product_Qty"]; ?></td>
                                                <td>$ <?php echo $values["Product_Price"]; ?></td>
                                                <td>$ <?php echo number_format($values["Product_Qty"] * $values["Product_Price"], 2);?></td>
                                                <td><a href="delete.php?action=delete&id=<?php echo $values["Product_ID"]; ?>"><span class="text-danger">Remove</span></a></td>
                                            </tr>
                                            <?php
                                            $total = $total + ($values["Product_Qty"] * $values["Product_Price"]);
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="3" align="right">Total</td>
                                            <td align="right">$ <?php echo number_format($total, 2); ?></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

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
