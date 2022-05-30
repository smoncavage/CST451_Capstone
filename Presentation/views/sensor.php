<!--/*Stephan Moncavage
 * CST-451
 * Capstone Project
 * 08 May 2022
 * Hardware Sensor Business Logic and Output
 */
-->

<?php
error_reporting(E_STRICT);
ini_set('display_errors',0);
include '../../Logger.php';
include_once '../../environmentVariables.php';
$logger = new MyLogger();
$log=$logger->getLogger();
$log->addRecord(1,"Entered Sensor.php page. ");
require_once('../../BusinessService/SensorBusinessService.php');
if(isset($_REQUEST['user'])){
    include '../views/layout_head.php';
    $log->addRecord(1,"Sensor Page Load Layout Header File. ");

}
else {
    header("Location: ./login.php");
    $log->addRecord(1,"Sensor page Re-Direct to Login.php - Session Variable Not Set. ");
}
?>

<body onload = 'loadMapScenario();'>
<!-- latest news -->
<div class="row">
    <div class="cart-banner pt-100 pb-100">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <h5 style="text-align: center"></h5>
        <div class = "col-sm-12 sidenav news-item">

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
                <h3><span class="orange-text">Local</span> Weather </h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class = "col-lg-4 col-md-6">
            <h5 style="text-align: center">Garden Environment Sensor</h5>
            <?php
            $busserv = new SensorBusinessService();
            $log->addRecord(1,"Sensor Page new SensorBusinessService Created. ");
            $sensors = $busserv->getAllSensorData();
            $lat = $busserv->convertLat($sensors[0][7]/1000);
            $lon = $busserv->convertLon($sensors[0][8]/1000);
            $log->addRecord(1,"Sensor Page Converted Latitude and Longitude from sensor Data. ");
            $mapsApiKey = getenv('MAPS_API_KEY');
            ?>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="single-latest-news">
                <script type = 'text/javascript' src = 'https://www.bing.com/api/maps/mapcontrol?key=<?php echo $mapsApiKey ?>'></script>
                <script type = 'text/javascript'>
                    var map;
                    function loadMapScenario(){
                        map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                            center: new Microsoft.Maps.Location(<?php echo $lat ?> , <?php echo $lon ?>),
                            zoom: 13
                        });
                    }
                </script>
                <div id="myMap" class = 'position-relative' style='width:730px;height:325px;'>
                    <div>
                        <div id="printoutPanel">
                        </div>
                        <div id = 'myMap' class = "container-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class = "row">
        <div class="col-lg-12 " style = 'overflow-x: scroll'>
            <div class="owl-stage">
                <?php
                //Open Weather API Call in this "hero area" section of HTML as well
                $busserv->getLatestWeatherData($sensors);
                $log->addRecord(1,"Sensor Page Retrieve Latest Weather Data from Sensors. ");
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">
            <form method="POST" action="">
                <input type="submit" name="getVal" value="Get I/O Values"><br/>
                <?php
                $busserv->getSolenoidRelayStatus();
                $log->addRecord(1,"Sensor Page Load Relay Status from Raspberry Pi JSON webpage");
                ?>
            </form>

        </div>
        <div class="col-sm-6 text-center">
            <form method="POST" action="./logout.php">
                <input type="submit" name="logout" value="Log Out"><br/>
            </form>
        </div>
    </div>
    <br/>
</div>

<!-- end latest news -->

<?php
include './layout_foot.php';
?>

