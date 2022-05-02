<?php

class package{
    private $package_id;
    private $package_name;
    private $wash_level;
    private $wax_level;
    private $shine_level;

    function __construct($package_id, $package_name, $wash_level, $wax_level, $shine_level){
        $this->package_id=$package_id;
        $this->package_name=$package_name;
        $this->wash_level=$wash_level;
        $this->wax_level=$wax_level;
        $this->shine_level= $shine_level;
    }

    public function getPackageId(){
        return $this->package_id;
    }

    public function getPackageName(){
        return $this->package_name;
    }

    public function getShineLevel(){
        return $this->shine_level;
    }

    public function getWashLevel(){
        return $this->wash_level;
    }

    public function getWaxLevel(){
        return $this->wax_level;
    }
}