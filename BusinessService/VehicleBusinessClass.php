<?php

class VehicleBusinessClass
{

    function getVehicleById($userId){
        $service = new VehicleDataService();
        return $service->getVehicleById($userId);
    }

    function updateVehicle($vehicleId, $make, $model, $year){
        $service = new VehicleDataService();
        return $service->updateVehicle($vehicleId, $year, $make, $model);
    }

    function deleteVehicle($vehicleId){
        $service = new VehicleDataService();
        return $service->deleteVehicle($vehicleId);
    }

}