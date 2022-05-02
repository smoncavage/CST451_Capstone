<!--
Stephan Moncavage
CST-236
Milestone 2
06 March 2021
-->
<?php
include('../../autoloader.php');
class ProductDataService{
    function findByProductName($search){
        $conn = dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.products Where First_Name like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }
        $products = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $products[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"] 
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($products);
    }
    
    function findByProductPrice($search){
        $conn = dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.products Where Last_Name like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$products = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $products[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"] 
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($products);
    }
    
    function findByProductID($search){
        $conn = dbConnect();
        $serch=intval($search);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.products Where ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$products = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $products[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"] 
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($products);
    }
}
?>

