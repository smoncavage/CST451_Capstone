<?php

class Order{
    private $order_id;
    private $date;
    private $address_id;
    private $user_id;
    private $order;
    
    function __construct($order_id, $date, $address_id, $user_id){
        $this->order_id=$order_id;
        $this->date=$date;
        $this->address_id=$address_id;
        $this->user_id=$user_id;
        $this->order = array(['orderID'][$this->order_id],['date'][$this->date],['addressID'][$this->address_id], ['userID'][$this->user_id]);
        return $this->order;
    }

    public function getOrder_id(){

        return $this->order['oderID'][$this->order_id];
    }
    
    public function getOrder_Date(){
        return $this->order['date'][$this->date];
    }
    
    public function getAddress_id(){
        return $this->order['addressID'][$this->address_id];
    }
    
    public function getUser_id(){
        return $this->order['userID'][$this->user_id];
    }
}