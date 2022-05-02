<!--
Stephan Moncavage
CST-236
Milestone 2
06 March 2021
-->
<?php
include('../../../autoloader.php');
function displayAllUsers($users){
    if(!$users){
        echo "No Results Found.";   
    }
    else{
        echo "<table>";
        echo "<tr>";
        echo "<th> ID </th>";
        echo "<th> First Name </th>";
        echo "<th> Last Name </th>";
        echo "</tr>";
        for($x=0; $x< count($users);$x++){
            echo "<tr>";
            echo "<td>" .$users[$x][0]. " </td>" . "<td>" . $users[$x][1] . " </td>" . "<td>" . $users[$x][2] . " </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>