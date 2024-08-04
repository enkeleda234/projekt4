<?php 

require_once './db/products.php';
require_once './Product.php';
$raw_products = getAllProducts ();
$products=[];

foreach ($raw_products as $p){
    array_push ($products,new Product($p['id'],$p['name'],$p['price'],$p['image']));
}
?>
<?php
    echo '<div class="container">';
         echo '<div class="row">';
         foreach ($products as $product){
             echo "<div class='col-4'>";
                include "./ProductCard.php";
             echo '</div>';
         }
         echo '</div>';
    echo '</div>';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script>
    $(document).ready(function(){
        $(".add-to-card-btn").click(function(){
            $.ajax({
                success: function(res) {
                    toastr.options.timeOut= 3000;
                    toastr.options.positionClass = 'toast-top-center';
                    toastr.success('Product is Added');
                }
            });
        });
    });
</script>



