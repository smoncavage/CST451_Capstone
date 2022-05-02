
<?php
include('../../../autoloader.php');


?>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha256-3edrmyuQ0w665f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
	crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"/>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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