<!--
Stephan Moncavage
CST-236
Milestone 6
04 April 2021
-->
<?php
include('./../autoloader.php');
class OrderDataService{
    function findByOrderDate($search){
        $conn = getConnection();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.products Where First_Name like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }
        $orders = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $orders[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"] 
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($orders);
    }
    
    function findByOrderID($search){
        $conn = getConnection();
        $serch=intval($search);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.products Where ID like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$orders = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $orders[$index] = array(
                $row["Product_ID"], $row["Product_Name"], $row["Product_Description"], $row["Price"] 
            );
            ++$index;
        }
        mysqli_close($conn);
        displayAllUsers($orders);
    }
}
?>

