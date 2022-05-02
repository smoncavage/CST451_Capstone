<!--
Stephan Moncavage
CST-236
eCommerce Site Milestone Project
Milestone 4
21 March 2021
Footer Update to seperate file
Based on code found on: https://codeofaninja.com/2015/08/simple-php-mysql-shopping-cart-tutorial.html
Some portions based on code found on: https://codeofaninja.com/2015/08/simple-php-mysql-shopping-cart-tutorial.html
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

</body>
<footer>
<h3> Coded by Stephan Moncavage for CST-236 @ Grand Canyon University </h3>
</footer>
</html>


