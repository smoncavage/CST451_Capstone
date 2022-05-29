<!--
Stephan Moncavage
CST-451
Capstone
06 May 2022
-->

<?php
include '../../Database/ProductDataService.php';
class ProductBusinessService{
    private $service;
    private $products;
    function searchAllProducts(){
        $this->service = new ProductDataService();
        $this->products = $this->service->findAllProducts();
        return $this->products;
    }
    function searchByName($pattern){
        $this->service = new ProductDataService();
        $this->products = $this->service->findByProductName($pattern);
        return $this->products;
    }

    function searchByPrice($pattern){
        $this->service = new ProductDataService();
        $this->products = $this->service->findByProductPrice($pattern);
        return $this->products;
    }

    function searchByID($pattern){
        $this->service = new ProductDataService();
        $this->products = $this->service->findByProductID($pattern);
        return $this->products;
    }

}
?>

