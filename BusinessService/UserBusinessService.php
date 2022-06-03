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
    //Retrieve all Sensor Data from the Database
    function getAllSensorData(){
        $service = new UserDataService();
        $persons = $service->getAllUserData();
        return $persons;
    }
    //future Search Capability
    function searchByFirst($pattern){
        $service = new UserDataService();
        $persons = $service->findByFirstName($pattern);
        return $persons;
    }
    //future Search Capability
    function searchByLast($pattern){
        $service = new UserDataService();
        $persons = $service->findByLastName($pattern);
        return $persons;
    }
    //future Search Capability
    function searchByID($pattern){
        $service = new UserDataService();
        $persons = $service->findByID($pattern);
        return $persons;
    }
    //Search by Username from user Database
    function searchByUsername($pattern){
        $service = new UserDataService();
        $persons = $service->findByUsername($pattern);
        return $persons;
    }
    //Search for user by Password in Database
    function searchByPassword($pattern){
        $service = new UserDataService();
        $persons = $service->findByPassword($pattern);
        return $persons;
    }
    //future Search Capability
    function searchByRole($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByRole($pattern);
        return $persons;
    }
    //future Search Capability
    function searchByAddressID($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByAddressID($pattern);
        return $persons;
    }
    //future Search Capability
    function searchByCreditID($pattern){
        $persons = Array();
        $service = new UserDataService();
        $persons = $service->findByCreditID($pattern);
        return $persons;
    }
}
?>
