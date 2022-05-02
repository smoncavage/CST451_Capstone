<!--
Stephan Moncavage
CST-236
Milestone 2
06 March 2021
-->
<?php

include('../../autoloader.php');

function displayAllProducts($products){    
    if(!$products){
        echo "No Results Found.";   
    }
    else{
        echo "<table>";
        echo "<tr>";
        echo "<th> ID </th>";
        echo "<th> Product Name </th>";
        echo "<th> Product Description </th>";
        echo "<th> Price </th>";
        echo "</tr>";
        for($x=0; $x< count($products);$x++){
            echo "<tr>";
            echo "<td>" .$products[$x][0]. " </td>" . "<td>" . $products[$x][1] . " </td>" . "<td>" . $products[$x][2] . " </td>"."<td>".$products[$x][3];
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>
