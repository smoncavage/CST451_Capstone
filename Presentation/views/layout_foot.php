<!--
Stephan Moncavage
CST-451
Capstone Project
02 May 2022
Footer Update to seperate file
Based on code by: Imran Hossain from https://imransdesign.com/
-->

<div>
        <!-- /row -->
 
    </div>
    <!-- /container -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script>
$(document).ready(function(){
    // add to cart button listener
    $('.add-to-cart-form').on('submit', function(){
 
        // info is in the table / single product layout
        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
 
        // redirect to add.php, with parameter values to process the request
        window.location.href = "add.php?id=" + id + "&quantity=" + quantity;
        return false;
    });
    
 	// update quantity button listener
    $('.update-quantity-form').on('submit', function(){
     
        // get basic information for updating the cart
        var id = $(this).find('.product-id').text();
        var quantity = $(this).find('.cart-quantity').val();
     
        // redirect to update_quantity.php, with parameter values to process the request
        window.location.href = "update.php?id=" + id + "&quantity=" + quantity;
        return false;
    });

 	// change product image on hover
    $(document).on('mouseenter', '.product-img-thumb', function(){
        var data_img_id = $(this).attr('data-img-id');
        $('.product-img').hide();
        $('#product-img-'+data_img_id).show();
    });
    
});
</script>

<footer>
    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Just a simple student starting out a wonderful career full of software and web based development opportunities .</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>South of Atlanta Area.</li>
                            <li>support@testing.com</li>
                            <li>+1 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="mail.php">
                            <label><input type="email" placeholder="Email"></label>
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2022 - <a href="https://www.linkedin.com/in/stephan-moncavage-0a484967">Stephan Moncavage</a>,  All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <!-- jquery -->
    <script src="../css/assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="../css/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="../css/assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="../css/assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="../css/assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="../css/assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="../css/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="../css/assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="../css/assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="../css/assets/js/main.js"></script>
</footer>
</html>


