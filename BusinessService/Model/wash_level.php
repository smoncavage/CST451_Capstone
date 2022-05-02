<?php

class wash_level{
    private $wash_level_id;
    private $wash_level_name;
    private $wash_level_price;

    public function __construct($wash_level_id, $wash_level_name, $wash_level_price){
        $this->wash_level_id=$wash_level_id;
        $this->wash_level_name= $wash_level_name;
        $this->wash_level_price=$wash_level_price;
    }

    public function getWashLevelId(){
        return $this->wash_level_id;
    }

    public function getWashLevelName(){
        return $this->wash_level_name;
    }

    public function getWashLevelPrice(){
        return $this->wash_level_price;
    }
}