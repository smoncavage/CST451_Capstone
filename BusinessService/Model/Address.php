<?php

class Address{
    private $address_id;
    private $street;
    private $street2;
    private $city;
    private $state;
    private $postal_code;
    private $default_id;
    private $address_type;
    
    function __construct($address_id, $street, $street2, $city, $state, $postalcode, $default, $type){
        $this->address_id=$address_id;
        $this->street=$street;
        $this->street2=$street2;
        $this->city=$city;
        $this->state=$state;
        $this->postal_code=$postalcode;
        $this->default_id=$default;
        $this->address_type=$type;
    }
    
    public function getAddressID(){
        return $this->address_id;
    }
    
    public function getStreet(){
        return $this->street;
    }
    
    public function getStreet2(){
        return $this->street2;
    }
    
    public function getCity(){
        return $this->city;
    }
    
    public function getState(){
        return $this->state;
    }
    
    public function getPostalCode(){
        return $this->postal_code;
    }
    
    public function getDefaultAddress(){
        return $this->default_id;
    }
    
    public function getAddressType(){
        return $this->address_type;
    }
}