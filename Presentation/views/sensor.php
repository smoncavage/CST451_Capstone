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

<?php include
error_reporting(E_ALL);
ini_set('display_errors',1);
'./layout_head.php'; ?>

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

<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <form method="POST" action="">
<input type="submit" name="rlyTgl" value="Toggle Relay"><br/>
</form>

<?php

    //TODO: Add Open Weather API Call in this "hero area" section of HTML as well



	//shell_exec("/usr/local/bin/gpio mode 21 out");

	$val = intval($_POST['rlyTgl']);
	echo $val;

	if(isset($val)){
		$read=intval(shell_exec("gpio read 21"));

		if($read == 1){
			$rReturn = 1;
			$write=shell_exec("gpio write 21 0");
		}
		else{
			$rReturn = 0;
			$write=shell_exec("gpio write 21 1");
		}
		$write;
	}
	$read2=shell_exec("gpio read 21");
	echo $read2;
	if($rReturn==0){
?>
	Pin 21:<label>
            <input type="text" name="pin21" value= "ON" />
        </label>
        <?php
	}
	else{
?>
	Pin 21:<label>
            <input type="text" name="pin21" value= "OFF" />
        </label>
        <?php
	}
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
//include('./_displayAllProducts.php');
//displayAllProducts();
?>

<body>
    <div class="container">
    <h2 style="text-align: center">Weather App</h2>
        <form class = "form3" action = "../handlers/searchHandlerSensor.php" method = "POST">
            <input type = "submit" name = "sensorSearch" value = "Get Sensor Data" />
        <table id = "sensors" style="text-align:center" class="table table-striped table-condensed table-bordered table-rounded">
            <thead style="text-align:center">
                <tr>
                    <th>Entry ID</th>
                    <th>Date</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                    <th>Pressure</th>
                    <th>Calculated Altitude</th>
                    <th>GPS Time Stamp</th>
                    <th>GPS Latitude</th>
                    <th>GPS Longitude</th>
                    <th>GPS Altitude</th>
                    <th>GPS Connected Satellites</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   <!-- <td>#{data.sensorId}</td>
                    <td>#{data.dtStamp}</td>
                    <td>#{data.temperature}</td>
                    <td>#{data.humidity}</td>
                    <td>#{data.pressure}</td>
                    <td>#{data.altitude}</td>
                    <td>#{data.gpsLat}</td>
                    <td>#{data.gpsLong}</td>
                    <td>#{data.gpsAltitude}</td>
                    <td>#{data.gpsNumSat}</td> -->
                    <?php if (isset($results)){
                    while($row = mysqli_fetch_array($results)){?>
                    <td><?php echo $row['entryid']; ?></td>
                    <td><?php echo $row['DTStamp']; ?></td>
                    <td><?php echo $row['Temperature']; ?></td>
                    <td><?php echo $row['Humidity']; ?></td>
                    <td><?php echo $row['Pressure']; ?></td>
                    <td><?php echo $row['Altitude']; ?></td>
                    <td><?php echo $row['GPSTimeStamp']; ?></td>
                    <td><?php echo $row['GPSLat']; ?></td>
                    <td><?php echo $row['GPSLong']; ?></td>
                    <td><?php echo $row['GPSAltitude']; ?></td>
                    <td><?php echo $row['GPSNumSat']; ?></td>
                    <?php } } ?>
                </tr>
            </tbody>
        </table>
        </form>
    </div>
</body>

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
