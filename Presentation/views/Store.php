<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 2
07 March 2021
-->
<?php
// include('auth_session.php');
// sessCheck();
// if($_SESSION["valid"] != 1){
//     header("Location: ./login/login.php");
// }
?>
<?php 
//error_reporting(E_ALL);
//ini_set('display_errors',1);
include './layout_head.php';
include('./_displayAllProducts.php');
include('../../autoloader.php');
//displayAllProducts();
?>
<link rel = "stylesheet" href = "../css/style.css" type="text/css">
<h3 class = "home-title" >Welcome to ABC Carwash!</h3>
	<br>

<body class = "body" style="text-align:center">
<div style="text-align:center" class="container" id="main-content">
	<h3 class = "home-title" >Welcome to eCommerce!</h3> 
	<div style="text-align:center" class="container">
          <div style="text-align:center" class="col-md-10 col-md-offset-1">
          <h1>Product Page</h1>
                <table style="text-align:center" class="table table-striped table-condensed table-bordered table-rounded">
                        <thead style="text-align:center">
                                <tr>
                                <th width="20%">Product Name</th>
                                <th width="30%">Product Description</th>
                                <th width="10%">Price</th>
                                <th width="20%">Image</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($results)){
                            for($i = 0; $i < count($results->data); $i++) ?>
                    		<tr>
                            <td><?php
                                } echo $results->data[$i]['Product ID']; ?></td>
                            <td><?php echo $results->data[$i]['Product Name']; ?></td>
                            <td><?php echo $results->data[$i]['Product Description']; ?></td>
                            <td><?php echo $results->data[$i]['Price']; ?></td>
                            <td><?php echo $results->data[$i]['Image']; ?></td>
                    		</tr>
            				<!<?php //endfor; ?>!>
                        </tbody>
                </table>
        </div>
   </div>
</div>


<h2 style="color:red">Products Coming Soon!</h2>
</body>
<?php include './layout_foot.php'; ?>