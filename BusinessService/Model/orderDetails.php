<?php

class OrderDetails{
    private $detail_id;
    private $order_id;
    private $prod_id;
    private $quantity;
    private $currency_price;
    private $discount_code;
    private $total_price;
    
    function __construct($detail_id, $order_id, $prod_id, $quantity, $currency_price, $discount, $total){
        $this->detail_id=$detail_id;
        $this->order_id=$order_id;
        $this->prod_id=$prod_id;
        $this->quantity=$quantity;
        $this->currency_price=$currency_price;
        $this->discount_code=$discount;
        $this->total_price=$total;
    }
    
    public function getDetail_id(){
        return $this->detail_id;
    }
    
    public function getOrder_id(){
        return $this->order_id;
    }
    
    public function getProduct_id(){
        return $this->prod_id;
    }
    
    public function getQuantity(){
        return $this->quantity;
    }
    
    public function getCurrency_Price(){
        return $this->currency_price;
    }
    
    public function getDiscount_Code(){
        return $this->discount_code;
    }
    
    public function getTotal_Price(){
        return $this->total_price;
    }
}