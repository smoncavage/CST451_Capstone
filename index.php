<!DOCTYPE html>
<html>
<head><title>GPIO Toggle</title></head>
<h1> Raspberry Pi Toggler </h1>
<body>
<form metho="POST"action="">
<input type="submit" name="rlyTgl" value="Toggle Relay"><br/>
</form>

<?php
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
	Pin 21:<input type="text" name="pin21" value= "ON" />
<?php
	}
	else{
?>
	Pin 21:<input type="text" name="pin21" value= "OFF" />
<?php	
	}
?>

</body>
</html>
