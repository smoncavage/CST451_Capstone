<!--
Stephan Moncavage
CST-451
Capstone Project
07 May 2022
-->

<?php include '../views/layout_head.php'; ?>
<!-- hero area -->
<div class="hero-area hero-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-2 text-center">
                <div class="hero-text">
                    <div class="hero-text-tablecell">
                        <p class="subtitle">Automated Gardening</p>
                        <h6>This website is the basis for using a Raspberry Pi 4 to control solenoid valves in order to water a garden, lawn, or plants with different "zones". The Raspberry Pi takes input from a soil sensor located within each "zone"
						 as well as looking at your local weather forecast in order to determine if it is going to rain in the near future. If the soil sensor senses a "dry" state with no precipitation in the forecast, the solenoids will turn on and
						 allow water to flow to that particular zone until there is either precipitation in the forecast or the sensor senses a "wet" state.</h6>
                        <div class="hero-btns">
                            <a href="login.php" class="boxed-btn">Log In</a>
                            <a href="register.html" class="bordered-btn">Register With Us</a>
                            <a href="logout.php" class="boxed-btn">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end hero area -->

<?php include '../views/layout_foot.php'; ?>
