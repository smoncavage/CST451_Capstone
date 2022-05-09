<!--
Stephan Moncavage
CST-236
Milestone 2
06 March 2021
-->
<?php
include('../../autoloader.php');
include './db.php';
class ProductDataService{
    function findByProductName($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM products Where Product_Name like '%$search%'";
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
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM products Where Product_Price like '%$search%'";
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
        $db = new Database();
        $conn = $db->dbConnect();
        $serch=intval($search);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM products Where Product_ID like '%$serch%'";
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

