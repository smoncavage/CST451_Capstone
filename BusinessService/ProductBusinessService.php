<!--
Stephan Moncavage
CST-451
Capstone
06 May 2022
-->

<?php
//include('../../autoloader.php');
class ProductBusinessService{
    function searchByName($pattern){
        $service = new ProductDataService();
        $service->findByProductName($pattern);
    }

    function searchByPrice($pattern){
        $service = new ProductDataService();
        $service->findByProductPrice($pattern);
    }

    function searchByID($pattern){
        $service = new ProductDataService();
        $service->findByProductID($pattern);
    }

}
?>

