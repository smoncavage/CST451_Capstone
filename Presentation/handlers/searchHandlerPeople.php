<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include '../views/layout_head.php';
/* sessCheck();
if($_SESSION["valid"] != 1){
	header("Location: ./login.php");
} */
?>
<?php include('../../../autoloader.php');; ?>
<body class = "body">

<form class = "form3" method = "post" >  
 
<?php
function getAllUsers(){
    $conn = dbConnect();
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $query = " SELECT * FROM ecommerce.users ";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Could not retrieve data: " . mysqli_error($conn));
    }
    $users = [];
    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $users[$index] = array(
            $row["ID"], $row["First_Name"], $row["Last_Name"]
        );
        ++$index;
    }
    mysqli_close($conn);
    return $users;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $searchPatternID = $_REQUEST["searchPatternID"];
    $searchPatternFirst=$_REQUEST["searchPatternFirst"];
    $searchPatternLast=$_REQUEST["searchPatternLast"];
    if($searchPatternID){
        echo "Searching by ID: " . $searchPatternID . "<br>";
        searchByID($searchPatternID);
        
    }
    elseif($searchPatternFirst){
        echo "Searching by First Name: " . $searchPatternFirst . "<br>";
        searchByFirst($searchPatternFirst);
    }
    elseif($searchPatternLast){
        echo "Searching by Last Name: " . $searchPatternLast . "<br>";
        searchByLast($searchPatternLast);
    }
    else{
        echo "No Results Found.";
    }
}
?>
<br>
<a href = "../views/search.html">Go Back</a>
</form>
</body>
<?php include '../views/layout_foot.php'; ?>
</html>
