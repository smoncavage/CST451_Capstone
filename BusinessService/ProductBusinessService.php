<!--
Stephan Moncavage
CST-451
Capstone
06 May 2022
-->

<?php
include '../../Database/ProductDataService.php';
class ProductBusinessService{
    function searchAllProducts(){
        $service = new ProductDataService();
        $products = $service->findAllProducts();
        return $products;
    }
    function searchByName($pattern){
        $service = new ProductDataService();
        $products = $service->findByProductName($pattern);
        return $products;
    }

    function searchByPrice($pattern){
        $service = new ProductDataService();
        $products = $service->findByProductPrice($pattern);
        return $products;
    }

    function searchByID($pattern){
        $service = new ProductDataService();
        $products = $service->findByProductID($pattern);
        return $products;
    }

}
?>

