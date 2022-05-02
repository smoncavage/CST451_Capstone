<?php

class PackageDataService
{
    function getPackage($packageId){
        $db = new db();
        $query = "SELECT * FROM kirnyw4ar361d8qd.PACKAGE WHERE PACKAGE_ID = ?";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $packageId);
        $stmt->execute();
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
        $db = new db();
        $query = "INSERT INTO kirnyw4ar361d8qd.PACKAGE (PACKAGE_NAME, WASH_LEVEL, WAX_LEVEL, SHINE_LEVEL) VALUES (?,?,?,?)";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siii", $packageName, $washLevel, $waxLevel, $shineLevel);

        if($stmt->ececute()){
            return true;
        }else{
            echo "Error".$query."<br>".mysqli_error($conn);
            return false;
        }

    }

    function updatePackage($packageId, $packageName, $washLevel, $waxLevel, $shineLevel){
        $db = new db();
        $query = "UPDATE kirnyw4ar361d8qd.PACKAGE SET PACKAGE_ID = ?, PACKAGE_NAME = ?, WASH_LEVEL=?, WAX_LEVEL=?, SHINE_LEVEL=?)";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isiii", $packageId, $packageName, $washLevel, $waxLevel, $shineLevel);

        if($stmt->ececute()){
            return true;
        }else{
            echo "Error".$query."<br>".mysqli_error($conn);
            return false;
        }

    }

    function deletePackage($packageId){
        $db = new db();
        $query = "DELETE FROM kirnyw4ar361d8qd.PACKAGE WHERE PACKAGE_ID = ?";
        $conn = $db->getConnection();
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $packageId);

        if($stmt->ececute()){
            return true;
        }else{
            echo "Error".$query."<br>".mysqli_error($conn);
            return false;
        }

    }
}