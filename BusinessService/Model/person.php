<?php
class Person{
    private $id;
    private $first_name;
    private $last_name;
    private $username;
    private $password;
    private $role_id;
    private $address_id;
    private $credit_id;
    
    function __construct($id, $first_name, $last_name, $username, $password, $role_id, $address_id, $credit_id){
        $this->id=$id;
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->username=$username;
        $this->role_id=$role_id;
        $this->address_id=$address_id;
        $this->credit_id=$credit_id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getFirst_Name(){
        return $this->first_name;
    }
    
    public function getLast_Name(){
        return $this->last_name;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getRole_ID(){
        return $this->role_id;
    }
    
    public function getAddress_ID(){
        return $this->address_id;
    }
    
    public function getCredit_ID(){
        return $this->credit_id;
    }
}