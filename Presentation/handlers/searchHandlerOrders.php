<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 6
04 April 2021
-->
<link rel = "stylesheet" href = "../../css/style.css" type="text/css"/>
<?php
//include auth_session.php file on all user panel pages
include("./../../Utility/auth_session.php");
include '../views/layout_head.php';
/* sessCheck();
if($_SESSION["valid"] != 1){
	header("Location: ./login.php");
} */
?>
<?php include('./../../autoloader.php'); ?>
<body class = "body">

<form class = "form3" method = "post" >  
 
<?php
function getAllOrders(){
    $conn = getConnection();
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $query = " SELECT * FROM orders ";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Could not retrieve data: " . mysqli_error($conn));
    }
    $orders = [];
    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $orders[$index] = array(
            $row["ID"], $row["First_Name"], $row["Last_Name"]
        );
        ++$index;
    }
    mysqli_close($conn);
    return $orders;
}

function getOrdersbyDate($date){
    $db=new Database();
    $conn = $db->dbConnect();
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $query = " SELECT * FROM orders WHERE Date LIKE ".$date;
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Could not retrieve data: " . mysqli_error($conn));
    }
    $orders = [];
    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $orders[$index] = array(
            $row["ID"], $row["First_Name"], $row["Last_Name"]
        );
        ++$index;
    }
    mysqli_close($conn);
    return $orders;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $searchPatternOrder_ID = $_REQUEST["searchPatternID"];
    $searchPatternFirst=$_REQUEST["searchPatternDate"];
    if($searchPatternOrder_ID){
        echo "Searching by ID: " . $searchPatternOrder_ID . "<br>";
        searchByID($searchPatternOrder_ID);
        
    }
    elseif($searchPatternFirst){
        echo "Searching by Date: " . $searchPatternFirst . "<br>";
        findOrdersByDate($searchPatternFirst);
    } 
    else{
        echo "No Results Found.";
    }
}

?>
<br>
<a href = "./../views/search.html">Go Back</a>
</form>
</body>
<?php include '../views/layout_foot.php'; ?>

