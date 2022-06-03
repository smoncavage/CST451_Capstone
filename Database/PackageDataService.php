<?php

class PackageDataService
{
    function getPackage($packageId){
        $db = new db();
        $query = "SELECT * FROM PACKAGE WHERE PACKAGE_ID like ".$packageId;
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $packageId);
        $stmt->execute();
        if(!$stmt->execute()){
            echo "Error".$query."<br>".$stmt->errorInfo();
        }
        $results = $stmt->get_result();

        if($results->num_rows == 0){
            return null;
        }else {
            $packages = Array();
            while ($package = $results->fetch_assoc()){
                array_push($packages, $package);
            }
            return new package($packages[0]['PACKAGE_ID'],$packages[1]['PACKAGE_NAME'],$packages[2]['WASH_LEVEL'],
                $packages[3]['WAX_LEVEL'],$packages[4]['SHINE_LEVEL']);
        }
    }

    function createPackage($packageName, $washLevel, $waxLevel, $shineLevel){
        $db = new Database();
        $query = "INSERT INTO PACKAGE (PACKAGE_NAME, WASH_LEVEL, WAX_LEVEL, SHINE_LEVEL) VALUES (?,?,?,?)";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bindValue("siii", $packageName, $washLevel, $waxLevel, $shineLevel);

        if($stmt->execute()){
            return true;
        }else{
            echo "Error".$query."<br>".$stmt->errorInfo();
            return false;
        }

    }

    function updatePackage($packageId, $packageName, $washLevel, $waxLevel, $shineLevel){
        $db = new Database();
        $query = "UPDATE PACKAGE SET PACKAGE_NAME = ?, WASH_LEVEL=?, WAX_LEVEL=?, SHINE_LEVEL=? WHERE PACKAGE_ID like ". $packageId;
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bindValue("isiii", $packageId, $packageName, $washLevel, $waxLevel, $shineLevel);

        if($stmt->execute()){
            return true;
        }else{
            echo "Error".$query."<br>".$stmt->errorInfo();
            return false;
        }

    }

    function deletePackage($packageId){
        $db = new Database();
        $query = "DELETE FROM PACKAGE WHERE PACKAGE_ID = ?";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bindValue("i", $packageId);

        if($stmt->execute()){
            return true;
        }else{
            echo "Error".$query."<br>".$stmt->errorInfo();
            return false;
        }

    }
}