
<?php
//include('../../../autoloader.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
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
	#products {
		font-family: "Trebuchet  MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 90%;
	}

	#products td, #customers th{
		border: 1px solid #ddd;
		padding: 8px;
	}

	#products tr:nth-child(even){
		background-color: #f2f2f2;
	}

	#products tr:hover{
		background-color: #ddd;
	}

	#products th{
		padding-top 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}
	</style>
</head>
<table id="products">
	<tr>
	<th>
	Product ID
	</th>
	<th>
	Name
	</th>
	<th>
	Description
	</th>
	<th>
	Price
	</th>
	<th>
	Picture
	</th>
	</tr>
	
<?php

$products = $_REQUEST['products'];
for($x = 0; $x <count($products); $x++){
	echo "<tr>";
	
	echo "<td>".$products[$x]['Product_ID']. "</td>";
	echo "<td>".$products[$x]['Product_Name']. "</td>";
	echo "<td>".$products[$x]['Product_Description']. "</td>";
	echo "<td>".$products[$x]['Product_Price']. "</td>";
	echo "<td>".$products[$x]['Product_Picture']. "</td>";
	echo "</tr>";
}
?>
</table>