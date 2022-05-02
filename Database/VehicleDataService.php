<?php

class VehicleDataService
{

    function getVehicleById($userId){
        $db = new db();
        $query = "Select * from kirnyw4ar361d8qd.USER_VEHICLE where VEHICLE_ID = ?";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $results = $stmt->get_results();

        if($results->num_rows == 0){
            return null;
        }else{
            $vehicles = Array();
            while ($vehicle = $results->fetch_assoc()){
                array_push($vehicles, $vehicle);
            }
            return new Vehicle($vehicles[0]["VEHICLE_ID"],$vehicles[1]["VEHICLE_YEAR"],$vehicles[2]["VEHICLE_MAKE"],$vehicles[3]["VEHICLE_MODEL"]);

        }

    }

    function updateVehicle($vehicleId, $year, $make, $model){
        $db = new db();
        $query = "UPDATE kirnyw4ar361d8qd.USER_VEHICLE SET VEHICLE_ID = ?, VEHICLE_YEAR = ?, VEHICLE_MAKE = ?, VEHICLE_MODEL = ?";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iiss', $vehicleId, $year, $make, $model);

        if($stmt->execute()){
            return true;
        }else{
            echo "Error".$query."<br>".mysqli_error($conn);
            return false;
        }

    }

    function deleteVehicle($vehicleId){
        $db = new db();
        $query = "DELETE FROM kirnyw4ar361d8qd.user_vehicle WHERE VEHICLE_ID = ?";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $vehicleId);

        if($stmt->execute()){
            return true;
        }else{
            echo "Error".$query."<br>".mysqli_error($conn);
            return false;
        }
    }

}