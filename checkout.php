<?php

    require_once './Users.php';
    $user = new Users();
    if(!$user->isLoggedIn ()){
        header ("location:./signing.php");
    }

    include_once "Cart.php";
    $card = new Cart();
    $products = $card->getAllProductsFromCart ();
?>

<style>

table, tr, th, td {
  margin: 10px;
}

.btn-info{
    color:blue;
}

.btn-warning{
    background:yellow;
}

.btn-success{
    background:yellow;
}
    </style>

<div class="container">

    <?php
    if(count ($products)>0){?>
        <a class="btn btn-danger" href="/reset-session.php">Empty cart</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $total=0;
                $total_quantity=0;
                foreach ($products as $product){?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td>
                            <a class="btn btn-info" href="change-qty.php?action=decrement&product_id=<?php echo $product['id']; ?>">-</a>
                            <?php echo $product['quantity']; ?>
                            <a class="btn btn-info" href="change-qty.php?action=increment&product_id=<?php echo $product['id']; ?>">+</a>
                        </td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php
                            $row_total=$product['price'] * $product['quantity'];
                            $total = $total + $row_total;
                            echo $row_total;
                            $total_quantity += $product['quantity']
                            ?>
                        </td>
                        <td>
                            <div>
                                <form action="remove.php" method="DELETE">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>" />
                                    <button id="remove" type="submit" class="btn btn-warning" >Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            <tr>
                <td colspan="2" class="text-left"><strong>Total:  </strong></td>
                <td colspan="2" class="text-left"><strong> <?php echo $total_quantity; ?></strong> </td>
                <td colspan="1" class="text-left"><strong> <?php echo $total; ?> <span>$</span> </strong></td>
                <td colspan="1" class="text-left">  </td>
            </tr>
            </tbody>
        </table>
        <button type="button"  href="./confirm-address.php" class="btn btn-success " data-toggle="modal" data-target="#myModal"> Confirm </button>
    <div class="modal fade"   id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"></div>
            </div>
        </div>
    </div>
    <?php }
        else {
            echo "Your cart is empty";
        }
        ?>
</div>