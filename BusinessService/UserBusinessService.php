!--
Stephan Moncavage
CST-236
Milestone 2
06 March 2021
-->

<?php
include('../../autoloader.php');
class UserBusinessService{
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
