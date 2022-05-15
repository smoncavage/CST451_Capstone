<!--/*
Stephan Moncavage
CST-451
Capstone Project
09 May 2022
Sensor Data Connection Service to Pull Data from Database
*/-->
<?php
include 'db.php';
//include '../BusinessService/Model/Sensor.php';
//include '../Presentation/views/_displayAllSensorData.php';
//include '../BusinessService/SensorBusinessService.php';

class SensorDataService {

    function getAllSensorsData(){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "Select * from sensors ORDER BY entryid DESC LIMIT 10";
        $result = mysqli_query($conn, $query);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }
        $sensors = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $sensors[$index] = array(
                $row["entryid"], $row["DTStamp"], $row["Temperature"], $row["Humidity"], $row["Pressure"], $row["Altitude"], $row["GPSTimeStamp"],
                $row["GPSLat"], $row["GPSLong"], $row["GPSAltitude"], $row["GPSNumSat"]
            );
            ++$index;
        }
        if(!$sensors){
            echo "No Results Found.";
        }
        else{
            echo "<table table id = \"sensors\" style=\"text-align:center\" class=\"table table-striped table-condensed table-bordered table-rounded\">";
            echo "<tr>";
            echo "<th> ID </th>";
            echo "<th> Time Stamp </th>";
            echo "<th> Temperature </th>";
            echo "<th> Humidity </th>";
            echo "<th> Pressure </th>";
            echo "<th> Altitude </th>";
            echo "<th> GPS Time Stamp </th>";
            echo "<th> GPS Latitude </th>";
            echo "<th> GPS Longitude </th>";
            echo "<th> GPS Altitude </th>";
            echo "<th> GPS Connected Satellites </th>";
            echo "</tr>";
            for($x=0; $x< count($sensors);$x++){
                echo "<tr>";
                echo "<td>" . $sensors[$x][0] . " </td>" . "<td>" . $sensors[$x][1] . " </td>" . "<td>" . $sensors[$x][2] . " </td>" .
                    "<td>" . $sensors[$x][3] . " </td>" . "<td>" . $sensors[$x][4] . " </td>" . "<td>" . $sensors[$x][5] . " </td>" .
                    "<td>" . $sensors[$x][6] . " </td>" . "<td>" . $sensors[$x][7] . " </td>" . "<td>" . $sensors[$x][8] . " </td>" .
                "<td>" . $sensors[$x][9] . " </td>" . "<td>" . $sensors[$x][10] . " </td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        mysqli_close($conn);
        //displayAllUsers($users);
        return $sensors;
    }

    function findByLastName($search){
        $conn = dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM ecommerce.users Where Last_Name like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$users = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $users[$index] = array(
                $row["ID"], $row["First_Name"], $row["Last_Name"]
            );
            ++$index;
        }
        mysqli_close($conn);
    }
    function getSensorById($entryId)
    {
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "Select * from sensor where 'entryid' like '%$entryId%'";
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
        $query = "UPDATE sensor SET Sensor_ID = ?, 'DTStamp' = ?, Temperature = ?, Humidity = ?, Pressure = ?, Altitude = ?, GPSTimeStamp = ?, GPSLat = ?, GPSLong = ?, GPSAltitude = ?, GPSSatNum = ?";
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
        $query = "DELETE FROM sensor WHERE 'entryid' = ?";
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