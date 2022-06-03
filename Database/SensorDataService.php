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
include_once '../environmentVariables.php';
class SensorDataService {
    //Retrieve all latest sensor data
    function getAllSensorsData(){
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "Select * from sensor ORDER BY entryid DESC Limit 1";
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
                $row["entryid"], $row["DTStamp"], $row["Temperature"], $row["Humidity"], $row["Pressure"],
                $row["Altitude"], $row["GPSTimeStamp"], $row["GPSLat"], $row["GPSLong"], $row["GPSAltitude"], $row["GPSNumSat"]
            );
            ++$index;
        }
        if(!$sensors){
            echo "No Results Found.";
        }
        else{
            for($x=0; $x< count($sensors);$x++){
                $lat=$this->convertLatitude($sensors[$x][7]/1000);
                $lon=$this->convertLongitude($sensors[$x][8]/1000);
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> ID </b></div>                     <div class = 'col' style = 'text-align:right'>". $sensors[$x][0] ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> Time Stamp </b></div>             <div class = 'col' style = 'text-align:right'>". $sensors[$x][1] ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> Temperature </b></div>            <div class = 'col' style = 'text-align:right'>". $sensors[$x][2] ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> Humidity </b></div>               <div class = 'col' style = 'text-align:right'>". $sensors[$x][3] ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> Pressure </b></div>               <div class = 'col' style = 'text-align:right'>". $sensors[$x][4] ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> Altitude </b></div>               <div class = 'col' style = 'text-align:right'>". $sensors[$x][5] ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> GPS Time Stamp </b></div>         <div class = 'col' style = 'text-align:right'>". $sensors[$x][6] ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> GPS Latitude </b></div>           <div class = 'col' style = 'text-align:right'>". $lat ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> GPS Longitude </b></div>          <div class = 'col' style = 'text-align:right'>". $lon ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> GPS Altitude </b></div>           <div class = 'col' style = 'text-align:right'>". $sensors[$x][9] ."</div> </div>";
                echo "<div class = 'row'> <div class='col'><b style = 'text-align:left'> Connected Sattelites </b></div>   <div class = 'col' style = 'text-align:right'>". $sensors[$x][10] ."</div> </div>";
            }
            echo "</table>";
        }
        mysqli_close($conn);
        return $sensors;
    }
    //Retrieve the latest weather forecasting from the Open Weather API
    function getLatestWeatherForecast($localSensorArray){
        $apiKey = getenv('WEATHER_API_KEY');
        $lat = strval($this->convertLatitude($localSensorArray[0][7]/1000));
        $lon = strval($this->convertLongitude($localSensorArray[0][8]/1000));
        $fetchCount = 24;
        $jsonContent = file_get_contents("https://pro.openweathermap.org/geo/1.0/reverse?lat=".$lat."&lon=".$lon."&appid=".$apiKey);
        $geoData = json_decode($jsonContent, true);

        echo "<h3 style=\"text-align: center\">Weather Forecast for : ". $geoData[0]['name'] . ", " . $geoData[0]['state'] . "</h3> <br/>" ;
        echo "<table id = \"forecast\" style=\"text-align:center\" >";
        $jsonDataContents = file_get_contents("https://pro.openweathermap.org/data/2.5/forecast/hourly?lat=" . $lat . "&lon=" . $lon . "&appid=" . $apiKey . "&cnt=".$fetchCount."&units=imperial");
        $data = json_decode($jsonDataContents, true);

        foreach ($data['list'] as $value) {
            echo "<td class='row-cols-lg-12'><div class = 'cols-lg-8' style='width: 175px'><div class = 'container' style = 'font-family: Lucida Console'>";
            $localTime = $this->convertUTCLocal($value['dt_txt']);
            echo "<h5><b>" . $localTime . "</b></h5>";
            echo "<img src='http://openweathermap.org/img/wn/" . $value['weather'][0]['icon'] . "@2x.png'></img><br/>";
            echo "<div style = 'text-transform: uppercase'><b> " . $value['weather'][0]['description'] . "</b></div>";
            echo $value['main']['temp'] . "<span>&#176;</span> F " . "<br/>";
            echo $value['main']['humidity'] . " % " . "<br/>";
            echo $value['main']['pressure'] . " hPa" . "<br/>";
            //echo $value['wind']['deg'] . " DEG " . "<br/>";
            //echo "Wind - " .$this->convertWindDegtoCardinal($value['wind']['deg']). "<br/>";
            echo $value['wind']['speed'] . " MPH - " . $this->convertWindDegtoCardinal($value['wind']['deg'])."<br/>";
            if (isset($value['rain']['1h'])) {
                echo $value['rain']['1h'] . " inches ";
            }
            else {
                echo 'No Precip';
            }
            echo "</td></div>";
        }
        echo "</table><br/>";
    }

    //Convert into Cardinal Direction from Compass Degrees (360 deg)
    //N = 339:23, NE = 24:68, E = 69:113, SE = 114:158, S = 159:203, SW = 204:248, W = 249:293, NW = 294:338
    function convertWindDegtoCardinal($compass)
    {
        $dir = ['N', 'NE', 'E', 'SE', 'S', 'SW', 'W', 'NW'];
        $direction = ($compass + 22.5)/45;
        if($direction>8){
            $cardinal = 'N';
        }else {
            $cardinal = $dir[$direction];
        }
        return $cardinal;
    }
    //Convert the Latitudnal position from Degress Minutes Seconds (DDMMS.SS) into Decimal Degree (D.DD) Value from proper mapping of position
    function convertLatitude($lat){
        //echo " String Value: " . $lat;
        //echo " Float Value: " . floatval($lat)*10;
        $cnvrtLatD = floor(floatval($lat)*10);
        //echo " Deg: " . $cnvrtLatD;
        $cnvrtLatM = floor((floatval($lat)*10-($cnvrtLatD))*100);
        //echo " Min: " . $cnvrtLatM;
        $cnvrtLatS = (((floatval($lat)*10-($cnvrtLatD))*100)-$cnvrtLatM)*10;
        //echo " Sec: " . $cnvrtLatS;
        $latitude = $cnvrtLatD + ($cnvrtLatM/60) + ($cnvrtLatS/3600);
        //echo " Latitude Decimal Degrees: " . $latitude;
        return $latitude;
    }
    //Convert the Longitudnal position from Degress Minutes Seconds (DDMMS.SS) into Decimal Degree (D.DD) Value from proper mapping of position
    function convertLongitude($lon){
        //echo " String Value: " . $lon;
        //echo " Float Value: " . floatval($lon)*10;
        $cnvrtLonD = floor(floatval($lon)*10);
        //echo " Deg: " . $cnvrtLonD;
        $cnvrtLonM = floor((floatval($lon)*10-($cnvrtLonD))*100);
        //echo " Min: " . $cnvrtLonM;
        $cnvrtLonS = (((floatval($lon)*10 - ($cnvrtLonD))*100) - $cnvrtLonM)*10;
        //echo " Sec: " . $cnvrtLonS;
        $longitude = ($cnvrtLonD + ($cnvrtLonM/60) + ($cnvrtLonS/3600)) * -1;
        //echo " Longitude Decimal Degrees: " . $longitude;
        return $longitude;
    }
    //Convert UTC into Local time for usage in properly displaying JSON data from Open Weather API call
    function convertUTCLocal($dateTimeUTC){
        $timezone = 'America/New_York';
        $dateFormat = 'H:i';
        $dateTimeUTC = $dateTimeUTC ? $dateTimeUTC : date($dateFormat);
        $date = new DateTime($dateTimeUTC, new DateTimeZone('UTC'));
        $date->setTimeZone(new DateTimeZone($timezone));

        return $date->format($dateFormat);
    }
    //Retrieve the Latest Relay Status from the JSON data provided by the Raspberry PI
    function getRelayStatus(){
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $jsonContents = file_get_contents("http://gardenpi.ddns.net/jsonGPIO.php");
            $jsonData = json_decode($jsonContents);
            $relayStatus1 = $jsonData->relays->relay_1;
            $relayStatus2 = $jsonData->relays->relay_2;
            $sensorStatus1 = $jsonData->sensors->sensor_1;
            $sensorStatus2 = $jsonData->sensors->sensor_2;

            echo "Relay 1 status is: " . $relayStatus1 . "<br/>";
            echo "Relay 2 status is: " . $relayStatus2 . "<br/>";
            echo "Sensor 1 status is: " . $sensorStatus1 . "<br/>";
            echo "Sensor 2 status is: " . $sensorStatus2 . "<br/>";
        }
    }
    //Return array of results by temperature reading search value
    function findByTemp($search){
        $db = new Database();
        $conn = $db->dbConnect();
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        $query = " SELECT * FROM sensors Where Temperature like '%$search%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }$sensors = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $sensors[$index] = array(
                $row["entryid"], $row["DTStamp"], $row["Temperature"], $row["Humidity"], $row["Pressure"],
                $row["Altitude"], $row["GPSTimeStamp"], $row["GPSLat"], $row["GPSLong"], $row["GPSAltitude"], $row["GPSNumSat"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $sensors;
    }
    //future Search Capability
    function getSensorById($entryId)
    {
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "Select * from sensor where entryid like '%$entryId%'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Could not retrieve data: " . mysqli_error($conn));
        }
        $sensors = [];
        $index = 0;
        while($row = mysqli_fetch_assoc($result)){
            $sensors[$index] = array(
                $row["entryid"], $row["DTStamp"], $row["Temperature"], $row["Humidity"], $row["Pressure"],
                $row["Altitude"], $row["GPSTimeStamp"], $row["GPSLat"], $row["GPSLong"], $row["GPSAltitude"], $row["GPSNumSat"]
            );
            ++$index;
        }
        mysqli_close($conn);
        return $sensors;
    }
    //future CRUD Capability
    public function updateSensor($entryid, $dtStamp, $temp, $hum, $press, $alt, $gpsdtStamp, $gpsLat, $gpsLong, $gpsAlt, $gpsSat):string
    {
        $db = new Database();
        $conn = $db->dbConnect();
        $query = "UPDATE sensor SET 'DTStamp' = ?, Temperature = ?, Humidity = ?, Pressure = ?, Altitude = ?, GPSTimeStamp = ?, GPSLat = ?, GPSLong = ?, GPSAltitude = ?, GPSSatNum = ? WHERE Sensor_ID like ".$entryid;
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
    //future CRUD Capability
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