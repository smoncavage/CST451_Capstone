<!--
Stephan Moncavage
CST-451
Capstone Project
08 May 202
-->
<?php include './layout_head.php'; ?>
<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <p class="subtitle">Please Login or Register to Continue.</p>
                        <?php
						//include_once('myfuncs.php');
						//if(isSessionStarted() == TRUE){
						//	session_destroy();
							// Destroy session
						//}
						//session_unset();
						echo "In order to continue, "

						//if(session_destroy() !== NULL) {
							// Redirecting To Home Page
							//header("Location: ./index.php");
						//}
						?>
						<br>
							Please return to the <a href = "index.php"> Homepage </a> or <a href = "login.php"> Login </a> again.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<?php include './layout_foot.php'; ?>

