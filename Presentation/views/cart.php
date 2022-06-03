<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2022
Cart Creation and Manipulation Page
-->

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include '../../Logger.php';
$logger = new MyLogger();
$log=$logger->getLogger();
$log->addRecord(1,"Entered Cart.php page. ");
if(isset($_REQUEST['user'])){
    include '../views/layout_head.php';
    $log->addRecord(1,"Cart Page Load Layout Header File. ");
}
else {
    header("Location: ./login.php");
    $log->addRecord(1,"Cart page Re-Direct to Login.php - Session Variable Not Set. ");
}
?>

<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <?php
                        //include('../../Utility/auth_session.php');
                        //include('../../../autoloader.php');
                        include '../../Database/db.php';
                        //include_once 'cart_item.php';

                        $page_title="Cart";
						$products = [];
                        $action = isset($_GET['action']) ? $_GET['action'] : "";

                        echo "<div class='col-md-12'>";
                        if($action=='removed'){
                            echo "<br/><br/><br/><br/><br/><br/><br/><div class='alert alert-info'>";
                            $alert = "Product was removed from your cart!";
                            echo $alert;
                            $log->addRecord(1,$alert);
                            echo "</div>";
                        }

                        else if($action=='quantity_updated'){
                            echo "<br/><br/><br/><br/><br/><br/><br/><div class='alert alert-info'>";
                            $alert = "Product quantity was updated!";
                            $log->addRecord(1,$alert);
                            echo "</div>";
                        }

                        else if($action=='exists'){
                            echo "<br/><br/><br/><br/><br/><br/><br/><div class='alert alert-info'>";
                            $alert = "Product already exists in your cart!";
                            echo $alert;
                            $log->addRecord(1,$alert);
                            echo "</div>";
                        }

                        else if($action=='cart_emptied'){
                            echo "<br/><br/><br/><br/><br/><br/><br/><div class='alert alert-info'>";
                            $alert = "Cart was emptied.";
                            echo $alert;
                            $log->addRecord(1,$alert);
                            echo "</div>";
                        }

                        else if($action=='updated'){
                            echo "<br/><br/><br/><br/><br/><br/><br/><div class='alert alert-info'>";
                            $alert = "Quantity was updated.";
                            echo $alert;
                            $log->addRecord(1,$alert);
                            echo "</div>";
                        }

                        else if($action=='unable_to_update'){
                            echo "<br/><br/><br/><br/><br/><br/><br/><div class='alert alert-danger'>";
                            $alert = "Unable to update quantity.";
                            echo $alert;
                            $log->addRecord(1,$alert);
                            echo "</div>";
                        }
						else if($action=='add'){
                            echo "<br/><br/><br/><br/><br/><br/><br/><div class='alert alert-info'>";
                            $alert = "Product was Added to your Cart.";
                            echo $alert;
                            $log->addRecord(1,$alert);
                            echo "</div>";
							$id=$_GET['id'];
                        }
						else{
                            echo "<div class='col-md-12'>";
                            echo "<br/><br/><br/><br/><br/><br/><br/><div class='alert alert-danger'>";
                            $alert =  "No products found in your cart!";
                            echo $alert;
                            $log->addRecord(1,$alert);
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";


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
                            <h3> Shopping Cart </h3>
                            <div style="clear:both"></div>
                            <h3>Order Details</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    if($action=='add'){
                                        $db=new Database();
										$conn=$db->dbConnect();
										$query = "SELECT * FROM products WHERE Product_ID LIKE '".$id ."'";
										$result = mysqli_query($conn, $query);
										
										$index = 0;	
										while($row = mysqli_fetch_array($result)){
											$products[$index] = array(
												$row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Product_Price"], $row["Product_Picture"]
											);
										++$index;
										}
										for($x=0; $x < count($products);$x++){
											echo "<tr>";
												echo "<td>" . $products[$x][1] . "</td>";
                                                $cartqty = $_REQUEST['cart-quantity'];
												echo "<td>" . $cartqty. "</td>";
												echo "<td>$ " . number_format($products[$x][3],2). "</td>";
												echo "<td>$ " . number_format($_REQUEST['cart-quantity'] * $products[$x][3], 2). "</td>";
												echo "<td><a href='../views/cart.php?action=delete&id=". $products[$x][0] ."'><span class='text-danger'>Remove</span></a></td>";
											echo "</tr>";
												$total =  number_format($cartqty * $products[$x][3], 2);
											echo "</tr>";
												echo" <td colspan='3' style='text-align='right''>Total</td>";
												echo "<td>$ ". number_format($total, 2) . "</td>";
												echo "<td></td>";
											echo "</tr>";
										}
									}
									?>
                                </table>
                                <a href = "logout.php" class = "boxed-btn"> Logout </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<!-- cart banner section -->
	<section class="cart-banner pt-100 pb-100">
    </section>
<!-- end cart banner section -->

<?php include 'layout_foot.php'; ?>

