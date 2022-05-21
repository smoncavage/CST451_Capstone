<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2022
Username Verification Checker
-->
<?php
 require_once 'myfuncs.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Who Am I</title>
</head>

<body>
 <h2>Hello My User ID Is: <?php echo " " . $_SESSION['username']; ?></h2><br>
</body>

</html>
