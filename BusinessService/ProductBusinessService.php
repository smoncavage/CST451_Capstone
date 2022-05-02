!--
Stephan Moncavage
CST-236
Milestone 2
06 March 2021
-->

<?php
include('../../autoloader.php');
class ProductBusinessService{
    function searchByName($pattern){
        $service = new ProductDataService();
        return $service->findByProductName($pattern);
    }

    function searchByPrice($pattern){
        $service = new ProductDataService();
        return $service->findByPrice($pattern);
    }

    function searchByID($pattern){
        $service = new ProductDataService();
        return $service->findByProductID($pattern);
    }

}
?>

