<?php

class PackageBusinessService
{
    function getPackage($packageId){
        $service = new PackageDataService();
        return $service->getPackage($packageId);
    }
    function createPackage($packageName, $washLevel, $waxLevel, $shineLevel){
        $service = new PackageDataService();
        return $service->createPackage($packageName, $washLevel, $waxLevel, $shineLevel);
    }
    function updatePackage($packageId, $packageName, $washLevel, $waxLevel, $shineLevel){
        $service = new PackageDataService();
        return $service->updatePackage($packageId, $packageName, $washLevel, $waxLevel, $shineLevel);
    }
    function deletePackage($packageId){
        $service = new PackageDataService();
        return $service->deletePackage($packageId);
    }

}