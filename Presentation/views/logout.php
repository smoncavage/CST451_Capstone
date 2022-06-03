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
                        error_reporting(E_ALL);
                        ini_set('display_errors',1);
						session_unset();
                        if (ini_get("session.use_cookies")) {
                            $params = session_get_cookie_params();
                            session_set_cookie_params( time() - 42000, "/", "SameSite", TRUE, TRUE);
                            //session_destroy();
                        }
                        if(session_id() !== null) {
                            //session_destroy();
                            setcookie('user',"");
                            setcookie('pass',"");
                            setcookie('startSess',"");
                        }
						?>
						<br>
                        In order to continue, Please return to the <a href = "index.php" class = "boxed-btn"> Homepage </a> or <a href = "login.php" class = "boxed-btn"> Login </a> again.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<?php include './layout_foot.php'; ?>

