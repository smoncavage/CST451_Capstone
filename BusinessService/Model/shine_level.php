<?php

class shine_level{
    private $shine_level_id;
    private $shine_level_name;
    private $shine_level_price;

    public function __construct($shine_level_id, $shine_level_name, $shine_level_price){
        $this->shine_level_id=$shine_level_id;
        $this->shine_level_name= $shine_level_name;
        $this->shine_level_price=$shine_level_price;
    }

    public function getShineLevelId(){
        return $this->shine_level_id;
    }

    public function getShineLevelName(){
        return $this->shine_level_name;
    }

    public function getShineLevelPrice(){
        return $this->shine_level_price;
    }
}