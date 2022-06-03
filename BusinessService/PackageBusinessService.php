<!--
Stephan Moncavage
CST-451
Capstone Project
01 June 2022
Business Layer / Handler Functionality for Package Model Data
Future Functionality
-->
<?php

class PackageBusinessService
{
    //Send all packages data to View Layer
    //Future Functionality
    function getPackage($packageId){
        $service = new PackageDataService();
        return $service->getPackage($packageId);
    }
    //Create new package Data and send to View Layer
    //Future CRUD Functionality
    function createPackage($packageName, $washLevel, $waxLevel, $shineLevel){
        $service = new PackageDataService();
        return $service->createPackage($packageName, $washLevel, $waxLevel, $shineLevel);
    }
    //Update new package Data and send to View Layer
    //Future CRUD Functionality
    function updatePackage($packageId, $packageName, $washLevel, $waxLevel, $shineLevel){
        $service = new PackageDataService();
        return $service->updatePackage($packageId, $packageName, $washLevel, $waxLevel, $shineLevel);
    }
    //Delete new package Data and send to View Layer
    //Future CRUD Functionality
    function deletePackage($packageId){
        $service = new PackageDataService();
        return $service->deletePackage($packageId);
    }

}