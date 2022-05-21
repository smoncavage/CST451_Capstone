<!--/*Stephan Moncavage
 * CST-451
 * Capstone Project
 * 08 May 2022
 * Hardware Sensor Business Logic and Output
 */
-->

<?php
include './layout_head.php';
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once('../../BusinessService/SensorBusinessService.php');
//include '../../jsonGPIO.php';
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
                $sensors = $busserv->getAllSensorData();
                $lat = $busserv->convertLat($sensors[0][7]/1000);
                $lon = $busserv->convertLon($sensors[0][8]/1000);
                ?>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="single-latest-news">
                    <script type = 'text/javascript' src = 'https://www.bing.com/api/maps/mapcontrol?key=Av0TSxjqVSPgrCjL-6BY_-4hg7dm7TJou-ctyDAlpn3_rollYn53wE76jGDnbPE3'></script>
                    <script type = 'text/javascript'>
                        var map;
                        function loadMapScenario(){
                            map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                                credentials: 'Av0TSxjqVSPgrCjL-6BY_-4hg7dm7TJou-ctyDAlpn3_rollYn53wE76jGDnbPE3',
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
        <div class = "row">
            <div class="col-lg-12 col-md-6">
                <div class="single-latest-news">
                    <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors',1);
                    //Open Weather API Call in this "hero area" section of HTML as well
                    $busserv->getLatestWeatherData($sensors);
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <form method="POST" action="">
                    <input type="submit" name="getVal" value="Get I/O Values"><br/>
                    <?php
                    $busserv->getSolenoidRelayStatus();
                    ?>
                </form>
                <br/>
            </div>
        </div>
    </div>

<!-- end latest news -->
</body>
<?php include './layout_foot.php'; ?>

