<!--/*Stephan Moncavage
 * CST-451
 * Capstone Project
 * 08 May 2022
 * Hardware Sensor Business Logic and Output
 */
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title -->
    <title>GCU-CST451</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="../css/assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../css/assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="../css/assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="../css/assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../css/assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="../css/assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../css/assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="../css/assets/css/responsive.css">

</head>

<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->

<?php include './layout_head.php'; ?>

<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <label><input type="text" placeholder="Keywords"/></label>
                        <button type="submit">Search <i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once('../../BusinessService/SensorBusinessService.php');
?>

<body>
<!-- hero area -->
    <div class="container">
                <div class="hero-text">
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <h2 style="text-align: center">Latest Local Sensor Data</h2>
                    <!--  <form class = "form3" action = "../handlers/searchHandlerSensor.php" method = "POST">
                        <input type = "submit" name = "sensorSearch" value = "Get Sensor Data" /> -->
                    <table id = "sensors" style="text-align:center" class="table table-striped table-condensed table-bordered table-rounded" style="width: fit-content">
                        <thead style="text-align:center">

                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            $busserv = new SensorBusinessService();
                            $sensors = $busserv->getAllSensorData();
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
    </div>
<!-- end hero area -->
  <div>

    <div class="container" style="width: fit-content">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <div>
                            <br/>
                            <h3>Latest Weather Forecast Data</h3>
                        <?php
                        error_reporting(E_ALL);
                        ini_set('display_errors',1);
                        //Open Weather API Call in this "hero area" section of HTML as well
                        $curl = curl_init();
                        $apiKey = "37d5482bf2d36047a822b19964843ac3";
                        $lat = strval(($sensors[0][7]/1000));
                        $lon = strval(($sensors[0][8]/1000));

                        curl_setopt_array($curl, [
                            CURLOPT_URL => "https://pro.openweathermap.org/data/2.5/forecast/hourly?lat=".$lat."&lon=".$lon."&appid=".$apiKey,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            //CURLOPT_HTTPHEADER => [
                            //    "X-RapidAPI-Host: community-open-weather-map.p.rapidapi.com",
                            //    "X-RapidAPI-Key: ec6eec344cmshc8af11bc0a722b9p1a8de0jsnaf8afaeb2b79"
                            //],
                        ]);

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                            echo "cURL Error #:" . $err;
                        } else {
                            echo "<table table id = \"forecast\" style=\"text-align:left\" class=\"table table-striped table-bordered table-rounded\" style=\"width: fit-content\">";
                            echo "<tr>";
                            echo "<th> Description </th>";
                            echo "<th> Forecast Time </th>";
                            echo "<th> Temperature </th>";
                            echo "<th> Humidity </th>";
                            echo "<th> Pressure </th>";
                            echo "<th> Wind Speed </th>";
                            echo "<th> Wind Direction </th>";
                            echo "<th> Precipitation </th>";
                            echo "</tr>";

                            $jsonContents = file_get_contents("https://pro.openweathermap.org/data/2.5/forecast/hourly?lat=".$lat."&lon=".$lon."&appid=".$apiKey."&cnt=24&units=imperial");
                            $data = json_decode($jsonContents, true);
                            foreach($data['list'] as $hour => $value) {
                                echo "<tr>";
                                echo "<td>" . $description = $value['weather'][0]['description'] . " </td>";
                                echo "<td>" . $forecastTime = $value['dt_txt'] . "</td>";
                                echo "<td>" . $actualTemp = $value['main']['temp'] . " F " . "</td>";
                                echo "<td>" . $humidity = $value['main']['humidity']. " % " . "</td>";
                                echo "<td>" . $pressure = $value['main']['pressure'] . " hPa" . "</td>";
                                echo "<td>" . $windSpeed = $value['wind']['speed']. " MPH " . "</td>";
                                echo "<td>" . $windDirection = $value['wind']['deg']. " Deg " . "</td>";
                                if (isset($value['rain']['1h'])) {
                                    echo "<td>" .$precipitation = $value['rain']['1h'] . " inches " . "</td>";
                                }
                                else{
                                    echo "<td>" .$precipitation = 'None'. "</td>";
                                }
                                echo "</tr>";
                            }
                            echo"</table>";
                        }
                        ?>
                            <form method="POST" action="">
                                <input type="submit" name="getVal" value="Get I/O Values"><br/>
                                <!-- <script>
                                    const xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onload = function(){
                                        const valStat = JSON.parse(this.responseText);
                                        document.getElementById("testing").innerHTML = valStat;
                                    }
                                    xmlhttp.open("GET","testing.php",true);
                                    xmlhttp.send();
                                </script> -->
                                <?php
                                //$val = intval($_POST['getVal']);
                                //echo $val;

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
                                ?>
                            </form>

                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<!-- jquery -->
<script src="../css/assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="../css/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="../css/assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="../css/assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="../css/assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="../css/assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="../css/assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="../css/assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="../css/assets/js/sticker.js"></script>
<!-- main js -->
<script src="../css/assets/js/main.js"></script>

<?php include './layout_foot.php'; ?>
</html>
