
		<?php
			error_reporting(E_ALL);
			ini_set('display_errors',1);
			//require_once'./testing.php';
			//shell_exec("/usr/local/bin/gpio mode 21 out");
			/*
			 * GPIO.26 = BCM 12 = Pin 32 = Soil Sensor 1
			 * GPIO.25 = BCM 26 = Pin 37 = Soil Sensor 2
			 * GPIO.21 = BCM 5 = Pin 29 = Relay 1
			 * GPIO.22 = BCM 6 = Pin 31 = Relay 2 
			 * */
			 
			getValues();
			function getValues(){	
				$readRly1=intval(shell_exec("gpio read 21"));
				$readRly2=intval(shell_exec("gpio read 22"));
				$readSnr1=intval(shell_exec("gpio read 26"));
				$readSnr2=intval(shell_exec("gpio read 25"));			
				$readValues = array($readRly1, $readRly2, $readSnr1, $readSnr2);
				convertToJson($readRly1, $readRly2, $readSnr1, $readSnr2);
				return $readValues;
			}
			
			function convertToJson($rly1, $rly2, $snr1, $snr2){
				$jsonArray = array(
					'relays'=>array(
						'relay_1'=>$rly1, 
						'relay_2'=>$rly2
						),
					'sensors'=>array(
						'sensor_1'=>$snr1, 
						'sensor_2'=>$snr2
						)
				);
				$jsonData = json_encode($jsonArray);
				echo $jsonData;
			}		
		?>

