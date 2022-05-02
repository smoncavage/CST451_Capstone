<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 4
21 March 2021
Products Page
-->
<?php

class Product{
    private $product_id;
    private $product_name;
    private $product_description;
    private $product_price;
    private $product_pic;
    
    function __construct($prod_id, $prod_name, $prod_desc, $prod_price, $prod_pic){
        $this->product_id=$prod_id;
        $this->product_name=$prod_name;
        $this->product_description=$prod_desc;
        $this->product_price=$prod_price;
        $this->product_pic=$prod_pic;
    }
    
    public function getProduct_ID(){
        return $this->product_id;
    }
    
    public function getProduct_Name(){
        return $this->product_name;
    }
    
    public function getProduct_Description(){
        return $this->product_description;
    }
    
    public function getProduct_Price(){
        return $this->product_price;
    }
    
    public function getProduct_Picture(){
        return $this->product_pic;
    }
}