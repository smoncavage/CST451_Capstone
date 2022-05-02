<?php
    class vehicle{
        private $vehicle_id;
        private $vehicle_year;
        private $vehicle_make;
        private $vehicle_model;

        function __construct($vehicle_id, $vehicle_year, $vehicle_make, $vehicle_model){
            $this->vehicle_id=$vehicle_id;
            $this->vehicle_year=$vehicle_year;
            $this->vehicle_make=$vehicle_make;
            $this->vehicle_model=$vehicle_model;
        }


        public function getVehicleId(){
            return $this->vehicle_id;
        }

        public function getVehicleYear(){
            return $this->vehicle_year;
        }

        public function getVehicleMake(){
            return $this->vehicle_make;
        }

        public function getVehicleModel(){
            return $this->vehicle_model;
        }
    }
