<!--
Stephan Moncavage
CST-451
Capstone Project
06 May 2022
-->

<?php
//include('../../autoloader.php');
include '../../Database/SensorDataService.php';
class SensorBusinessService{
    function getAllSensorData(){
        $service = new SensorDataService();
        $sensors = $service->getAllSensorsData();
        return $sensors;
    }
    function getLatestWeatherData($sensors){
        $service = new SensorDataService();
        $service->getLatestWeatherForecast($sensors);
    }

    function getSolenoidRelayStatus(){
        $service = new SensorDataService();
        $service->getRelayStatus();
    }

    function searchByTemp($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findByTemp($pattern);
        return $persons;
    }

    function searchByLat($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findByLat($pattern);
        return $persons;
    }

    function searchByID($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findByID($pattern);
        return $persons;
    }

    function searchByLong($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findByLong($pattern);
        return $persons;
    }

    function searchBySat($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findBySat($pattern);
        return $persons;
    }

    function searchByAddressID($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByAddressID($pattern);
        return $persons;
    }

    function searchByCreditID($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByCreditID($pattern);
        return $persons;
    }

    function convertLat($lat){
        $service = new SensorDataService();
        $latitude = $service->convertLatitude($lat);
        return $latitude;
    }

    function convertLon($lon){
        $service = new SensorDataService();
        $longitude = $service->convertLongitude($lon);
        return $longitude;
    }
}
?>
