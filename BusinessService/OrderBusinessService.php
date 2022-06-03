<!--
Stephan Moncavage
CST-451
Capstone Project
01 June 2022
Business Layer / Handler Functionality for Ordering Data
Future Functionality
-->

<?php
include('../Database/db.php');
class ProductBusinessService{
    //Send all Search Data to View Layer
    function searchByDate($pattern){
        $service = new OrderDataService();
        return $service->findByOrderDate($pattern);
    }
    //Send all Search Data to View Layer
    function searchByID($pattern){
        $service = new OrderDataService();
        return $service->findByOrderID($pattern);
    }

}
?>

