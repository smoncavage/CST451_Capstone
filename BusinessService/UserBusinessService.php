<!--
Stephan Moncavage
CST-451
Capstone Project
11 May 2022
-->
<?php
//include('../../autoloader.php');
include '../../Database/UserDataService.php';
class UserBusinessService{
    function getAllSensorData(){
        $sensors = Array();
        $service = new UserDataService();
        $sensors = $service->getAllSensorsData();
        return $sensors;
    }

    function searchByFirst($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByFirstName($pattern);
        return $persons;
    }
    
    function searchByLast($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByLastName($pattern);
        return $persons;
    }
    
    function searchByID($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByID($pattern);
        return $persons;
    }
    
    function searchByUsername($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByUsername($pattern);
        return $persons;
    }

    function searchByPassword($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByPassword($pattern);
        return $persons;
    }
    
    function searchByRole($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByRole($pattern);
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
}
?>
