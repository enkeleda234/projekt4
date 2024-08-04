
<div class="card">
    <img src="<?php echo $product->getImage(); ?>" class="card-img-top">
    <div class="card-body">
        <h4 class="card-title"><strong><?php echo $product->getName(); ?></strong></h4>
        <p class="card-text">
            <span>$</span>
            <?php echo $product->getPrice(); ?>
        </p>
        <form action="/add-to-cart.php" method="post">
          <button   class="btn btn-primary add-to-card-btn" type="submit" >Add To Card</button>
          <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>">
        </form>
    </div>
</div>

