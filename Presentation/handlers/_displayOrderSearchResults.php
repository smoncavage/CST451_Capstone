
<?php
include('../../../autoloader.php');


?>
<head>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha256-3edrmyuQ0w665f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
	crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	
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