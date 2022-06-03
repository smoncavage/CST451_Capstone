<?php
include '../../Database/SensorDataService.php';
include '../../BusinessService/SensorBusinessService.php';

function displayAllSensors($sensors){
    if(!$sensors){
        echo "No Results Found.";
    }
    else{
        echo "<table>";
        echo "<tr>";
        echo "<th>Entry ID</th>";
        echo "<th>Date</th>";
        echo "<th>Temperature</th>";
        echo "<th>Humidity</th>";
        echo "<th>Pressure</th>";
        echo "<th>Calculated Altitude</th>";
        echo "<th>GPS Time Stamp</th>";
        echo "<th>GPS Latitude</th>";
        echo "<th>GPS Longitude</th>";
        echo "<th>GPS Altitude</th>";
        echo "<th>GPS Connected Satellites</th>";
        echo "</tr>";
        for($x=0; $x< count($sensors);$x++){
            echo "<tr>";
            echo "<td>" .$sensors[$x][0]. " </td>" . "<td>" . $sensors[$x][1] . " </td>" . "<td>" . $sensors[$x][2] . " </td>"
                . "<td>" .$sensors[$x][3]. " </td>" . "<td>" . $sensors[$x][4] . " </td>" . "<td>" . $sensors[$x][5] . " </td>"
                . "<td>" .$sensors[$x][6]. " </td>" . "<td>" . $sensors[$x][7] . " </td>" . "<td>" . $sensors[$x][8] . " </td>"
                . "<td>" .$sensors[$x][9]. " </td>" . "<td>" . $sensors[$x][10] . " </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
