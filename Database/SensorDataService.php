/*
Stephan Moncavage
CST-451
Capstone Project
09 May 2022
Sensor Data Connection Service to Pull Data from Database
*/
<?php
include './db.php';
include '../BusinessService/Model/Sensor.php';
class SensorDataService {

    private $sens;

    function getAllSensorData(){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "Select * from sensors";
        if(isset($conn)) {
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $results = $stmt->get_results();

            if ($results->num_rows == 0) {
                return null;
            } else {
                $sensors = array();
                while ($sensor = $results->fetch_assoc()) {
                    array_push($sensors, $sensor);
                }
                return new Sensor($sensors[0]["entryid"], $sensors[1]["DTStamp"], $sensors[2]["Temperature"], $sensors[3]["Humidity"], $sensors[4]["Pressure"], $sensors[5]["Altitude"], $sensors[6]["GPSTimeStamp"], $sensors[7]["GPSLat"], $sensors[8]["GPSLong"], $sensors[9]["GPSAltitude"], $sensors[10]["GPSNumSat"]);
            }
        }
    }
    function getSensorById($entryId)
    {
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "Select * from sensors where entryid like '%$entryId%'";
        if(isset($conn)) {
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $entryId);
            $stmt->execute();
            $results = $stmt->get_results();

            if ($results->num_rows == 0) {
                return null;
            } else {
                $sensors = array();
                while ($sensor = $results->fetch_assoc()) {
                    array_push($sensors, $sensor);
                }
                return new Sensor($sensors[0]["entryid"], $sensors[1]["DTStamp"], $sensors[2]["Temperature"], $sensors[3]["Humidity"], $sensors[4]["Pressure"], $sensors[5]["Altitude"], $sensors[6]["GPSTimeStamp"], $sensors[7]["GPSLat"], $sensors[8]["GPSLong"], $sensors[9]["GPSAltitude"], $sensors[10]["GPSNumSat"]);
            }
        }
    }

    public function updateSensor($entryid, $dtStamp, $temp, $hum, $press, $alt, $gpsdtStamp, $gpsLat, $gpsLong, $gpsAlt, $gpsSat):string
    {
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "UPDATE sensors SET entryid = ?, DTStamp = ?, Temperature = ?, Humidity = ?, Pressure = ?, Altitude = ?, GPSTimeStamp = ?, GPSLat = ?, GPSLong = ?, GPSAltitude = ?, GPSNumSat = ?";
        if (isset($conn)) {
            $stmt = $conn->prepare($query);
            $stmt->bind_param('idddddsssss', $entryid, $dtStamp, $temp, $hum, $press, $alt, $gpsdtStamp, $gpsLat, $gpsLong, $gpsAlt, $gpsSat);
            if($stmt->execute()){
                return true;
            }else{
                echo "Error".$query."<br>".mysqli_error($conn);
                return false;
            }
        }
        return "updated";
    }

    public function deleteSensor($entryId): string
    {
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "DELETE FROM sensors WHERE entryid = ?";
        if(isset($conn)){
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $entryId);

            if($stmt->execute()){
                return true;
            }else{
                echo "Error".$query."<br>".mysqli_error($conn);
                return false;
            }
        }
        return "Deleted";
    }

}