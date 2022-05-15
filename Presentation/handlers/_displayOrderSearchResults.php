
<?php
//include('../../../autoloader.php');


?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
	<style>
	#orders {
		font-family: "Trebuchet  MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 90%;
	}

	#orders td, #customers th{
		border: 1px solid #ddd;
		padding: 8px;
	}

	#orders tr:nth-child(even){
		background-color: #f2f2f2;
	}

	#orders tr:hover{
		background-color: #ddd;
	}

	#orders th{
		padding-top 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}
	</style>
</head>
<table id="orders">
	<tr>
	<th>
	Order ID
	</th>
	<th>
	Date
	</th>
	<th>
	Address ID
	</th>
	<th>
	User ID
	</th>
	</tr>
	
<?php
$orders = $_REQUEST['orders'];
for($x = 0; $x <count($orders); $x++){
	echo "<tr>";
	
	echo "<td>".$orders[$x]['Order_ID']. "</td>";
	echo "<td>".$orders[$x]['Date']. "</td>";
	echo "<td>".$orders[$x]['Address_ID']. "</td>";
	echo "<td>".$orders[$x]['User_ID']. "</td>";
	echo "</tr>";
}
?>
</table>