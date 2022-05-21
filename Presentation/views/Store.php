<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2021
-->

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include '../views/layout_head.php';
include('./_displayAllProducts.php');
//include('../../autoloader.php');
//displayAllProducts();
// include('auth_session.php');
// sessCheck();
// if($_SESSION["valid"] != 1){
//     header("Location: ./login/login.php");
// }
?>

<body class = "body" style="text-align:center">
<div style="text-align:center" class="container" id="main-content">
    <br/>
    <br/>
    <br/>
	<br/>
    <br/>
	<div style="text-align:center" class="container">
          <div style="text-align:center" class="col-md-10 col-md-offset-1">
          <h1>Product Page</h1>
                <table style="text-align:center" class="table table-striped table-condensed table-bordered table-rounded">
                        <thead style="text-align:center">
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($results)){
                            for($i = 0; $i < count($results->data); $i++) ?>
                    		<tr>
                            <td><?php echo $results->data[$i]['Product ID']; ?></td>
                            <td><?php echo $results->data[$i]['Product Name']; ?></td>
                            <td><?php echo $results->data[$i]['Product Description']; ?></td>
                            <td><?php echo $results->data[$i]['Price']; ?></td>
                            <td><?php echo $results->data[$i]['Image']; ?></td>
                    		</tr>
            				<?php }//endfor; ?>
                        </tbody>
                </table>
        </div>
   </div>
</div>


<h2 style="color:red">Products Coming Soon!</h2>
</body>

<?php include '../views/layout_foot.php'; ?>
