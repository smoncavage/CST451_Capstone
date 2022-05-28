<!--
Stephan Moncavage
CST-451
Capstone Project
02 May 2022
-->
<?php include '../views/layout_head.php'; ?>

<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <h3 class = "home-title" >Welcome to Automated Garden Watering!</h3>
                        <br>
                        <br>
                        <H3> Please feel free to send me an email with any question or comments that you may have. Thank you! </H3>
                        <br/>
                        <a href="mailto: [smoncavage@my.gcu.edu]?subject= &body= " class = "boxed-btn"> Email me! </a>
                        <br/><br/>
                        <a href="./logout.php"> <input type = "submit" name = "logout" value = "Logout"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->
<a href = "logout.php" class = "boxed-btn"> Logout </a>
<?php include '../views/layout_foot.php'; ?>
