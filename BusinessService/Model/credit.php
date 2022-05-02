<?php

class Credit{
    private $credit_id;
    private $card_type;
    private $card_num;
    private $card_date;
    private $card_name;
    private $card_zip;
    private $card_saved;
    
    function __consruct($credit_id, $credit_type, $credit_num, $credit_date, $credit_name, $credit_zip, $credit_saved){
        $this->credit_id=$credit_id;
        $this->card_type=$credit_type;
        $this->card_num=$credit_num;
        $this->card_date=$credit_date;
        $this->card_name=$credit_name;
        $this->card_zip=$credit_zip;
        $this->card_saved=$credit_saved;
    }
    
    public function getCard_ID(){
        return $this->credit_id;
    }
    
    public function getCard_Type(){
        return $this->credit_type;
    }
    
    public function getCard_Number(){
        return $this->credit_num;
    }
    
    public function getCard_Date(){
        return $this->credit_date;
    }
    
    public function getCard_Name(){
        return $this->credit_name;
    }
    
    public function getCard_Zipcode(){
        return $this->credit_zip;
    }
    
    public function getCard_Saved(){
        return $this->credit_saved;
    }
}