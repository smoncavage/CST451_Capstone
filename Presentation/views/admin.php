<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 1
27 February 2021
-->
<?php
//include auth_session.php file on all user panel pages
include("./../../Utility/auth_session.php");
sessCheck();
if($_SESSION["valid"] != 1){
	header("Location: ./login.php");
}
include('./../../autoloader.php');
?>

<?php include 'layout_head.php'; ?>
  


<?php
/*
include('auth_session.php');
include('myfuncs.php');
$conn = dbConnect();

$blogtitle = $_REQUEST['Title'];
$qry = "SELECT TITLE FROM `posts` WHERE TITLE = '$blogtitle'";
$result = mysqli_query($conn, $qry) or die(mysqli_error($conn));

while($row = mysqli_fetch_array( $result)){
	if($row['TITLE'] == $blogtitle){
		echo "Please select a new title.";
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$target = "./files/";
	$filetarget = $target.$blogtitle;
	$filtchk = langFilter($_REQUEST['blog']);
	if($filtchk != true){
		$blogpost = $_REQUEST['blog'];
	}else{
		echo "Please use your browser's back button and remove any foul language in the post.";
	}
	//$blogpost = langFilter($_REQUEST['blog']);
	//$blogpost = filter_input(INPUT_POST, $blog, FILTER_CALLBACK, array("options"=>"langFilter"));
	$query = "INSERT INTO `posts`(`TITLE`, `blog`) VALUES ('$blogtitle','$blogpost')";
	if ($conn->query($query) == TRUE) {
	}else{
		die("SQL Query failed: " . mysqli_error($conn));
	}
	header("Location: ./show_db.php");
}
*/
?>
