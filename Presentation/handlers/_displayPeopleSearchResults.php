
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
	#customers {
		font-family: "Trebuchet  MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 90%;
	}

	#customers td, #customers th{
		border: 1px solid #ddd;
		padding: 8px;
	}

	#customers tr:nth-child(even){
		background-color: #f2f2f2;
	}

	#customers tr:hover{
		background-color: #ddd;
	}

	#customers th{
		padding-top 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #4CAF50;
		color: white;
	}
	</style>
</head>
<table id="customers" class="display">
<thead>
	<tr>
	<th>
	ID
	</th>
	<th>
	First Name
	</th>
	<th>
	Last Name
	</th>
	<th>
	Street
	</th>
	<th>
	Street 2
	</th>
	<th>
	City
	</th>
	<th>
	State
	</th>
	<th>
	Zip Code
	</th>
	<th>
	Default?
	</th>
	</tr>
	</thead>
	<tbody>
<?php
$persons = $_REQUEST['persons'];
for($x = 0; $x <count($persons); $x++){
	echo "<tr>";
	
	echo "<td>".$persons[$x]['ID']. "</td>";
	echo "<td>".$persons[$x]['First_Name']. "</td>";
	echo "<td>".$persons[$x]['Last_Name']. "</td>";
	echo "<td>".$persons[$x]['Street']. "</td>";
	echo "<td>".$persons[$x]['Street2']. "</td>";
	echo "<td>".$persons[$x]['City']. "</td>";
	echo "<td>".$persons[$x]['State']. "</td>";
	echo "<td>".$persons[$x]['Postal_Code']. "</td>";
	echo "<td>".$persons[$x]['Default_Id']. "</td>";
	
	echo "</tr>";
}
?>
</tbody>
</table>
<script>
$(document).ready)(function(){
	$('#customers').DataTable();
});
</script>