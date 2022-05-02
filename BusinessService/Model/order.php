<?php

class Order{
    private $order_id;
    private $date;
    private $address_id;
    private $user_id;
    
    function __construct($order_id, $date, $address_id, $user_id){
        $this->order_id=$order_id;
        $this->date=$date;
        $this->address_id=$address_id;
        $this->user_id=$user_id;
    }
    
    public function getOrder_id(){
        return $this->order_id;
    }
    
    public function getOrder_Date(){
        return $this->date;
    }
    
    public function getAddress_id(){
        return $this->address_id_id;
    }
    
    public function getUser_id(){
        return $this->user_id;
    }
}