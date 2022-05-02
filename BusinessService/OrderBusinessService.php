!--
Stephan Moncavage
CST-236
Milestone 6
04 April 2021
-->

<?php
include('../../autoloader.php');
class ProductBusinessService{
    function searchByDate($pattern){
        $service = new OrderDataService();
        return $service->findByOrderDate($pattern);
    }

    function searchByID($pattern){
        $service = new OrderDataService();
        return $service->findByOrderID($pattern);
    }

}
?>

