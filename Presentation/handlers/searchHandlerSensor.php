<?php
error_reporting(E_ALL);
ini_set('display_errors',1);


include('../../BusinessService/SensorBusinessService.php');

//$searchPhrase = $_POST['searchSensor'];

$busserv = new SensorBusinessService();

$sensors = $busserv->getAllSensorData();

?>
    <link rel = "stylesheet" href = "../css/style.css" type="text/css">
    <h2>Search Results</h2>
    <p>Results are as follows: <p>

<?php

if($sensors){
    include('_displaySensorSearchResults.php');
}
else{
    echo "No Users found with current search. Please try a different phrase. </br>";
}