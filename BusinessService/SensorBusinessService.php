<!--
Stephan Moncavage
CST-451
Capstone Project
06 May 2022
Business Layer / Handler Functionality for Sensor Data
-->

<?php
include '../../Database/SensorDataService.php';
class SensorBusinessService{
    //Send all Sensor Data to View Layer
    function getAllSensorData(){
        $sensors = Array();
        $service = new SensorDataService();
        $sensors = $service->getAllSensorsData();
        return $sensors;
    }
    //Send latest Weather Data to View Layer
    function getLatestWeatherData($sensors){
        $service = new SensorDataService();
        $service->getLatestWeatherForecast($sensors);
    }
    //Send latest Solenoid Status Data to View Layer
    function getSolenoidRelayStatus(){
        $service = new SensorDataService();
        $service->getRelayStatus();
    }
    //Send search result Data to View Layer
    //Future Functionality
    function searchByTemp($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findByTemp($pattern);
        return $persons;
    }
    //Send search result Data to View Layer
    //Future Functionality
    function searchByLat($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findByLat($pattern);
        return $persons;
    }
    //Send search result Data to View Layer
    //Future Functionality
    function searchByID($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findByID($pattern);
        return $persons;
    }
    //Send search result Data to View Layer
    //Future Functionality
    function searchByLong($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findByLong($pattern);
        return $persons;
    }
    //Send search result Data to View Layer
    //Future Functionality
    function searchBySat($pattern){
        $persons = Array();
        $service = new SensorDataService();
        $persons = $service->findBySat($pattern);
        return $persons;
    }
    //Send search result Data to View Layer
    //Future Functionality
    function searchByAddressID($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByAddressID($pattern);
        return $persons;
    }
    //Send search result Data to View Layer
    //Future Functionality
    function searchByCreditID($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByCreditID($pattern);
        return $persons;
    }
    //Send Conversion result Data to View Layer
    function convertLat($lat){
        $service = new SensorDataService();
        $latitude = $service->convertLatitude($lat);
        return $latitude;
    }
    //Send Conversion result Data to View Layer
    function convertLon($lon){
        $service = new SensorDataService();
        $longitude = $service->convertLongitude($lon);
        return $longitude;
    }
}
?>
