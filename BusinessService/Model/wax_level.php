<?php

class wax_level{

    private $wax_level_id;
    private $wax_level_name;
    private $wax_level_price;

    public function __construct($wax_level_id, $wax_level_name, $wax_level_price){
        $this->wax_level_id=$wax_level_id;
        $this->wax_level_name= $wax_level_name;
        $this->wax_level_price=$this->wax_level_price;
    }

    public function getWaxLevelId(){
        return $this->wax_level_id;
    }

    public function getWaxLevelName(){
        return $this->wax_level_name;
    }

    public function getWaxLevelPrice(){
        return $this->wax_level_price;
    }
}