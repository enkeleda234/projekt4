<?php

if(!session_id()){
    session_start();
}

require_once './Users.php';
$user = new Users();
$addresses= $user-> getCurrentUserAddresses ();
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
    <body>
        <div class="modal-header bg-info">
             <h3 class="modal-title " id="exampleModalLabel">Choose your shipping address</h3>
        </div>
        <form id="payment-form" class="form" action="order-confirmation.php" method="post">
                <div class="modal-body">
                        <?php
                        foreach ($addresses as $address){?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="address" id="address" value="<?php echo $address['id'] ?>">
                            <label class="form-check-label" for="address">
                                Address:
                                <b>
                                    <?php echo $address['address'] ?>
                                    <?php echo $address['city'] ?>
                                    <?php echo $address['state'] ?>
                                    <?php echo $address['zipcode'] ?>
                                </b>
                            </label>
                        </div>
                            <?php
                        }
                        ?>
                </div>
            <div class="modal-header bg-info">
                 <h3 class="modal-title" id="exampleModalLabel1">Choose your Payment</h3>
            </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="cash_on_delivery" value="Cash on delivery">
                        <label class="form-check-label" for="cash_on_delivery">
                            Payment: Cash on delivery
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="credit_card" value="Credit card">
                        <label class="form-check-label" for="credit_card">
                            Payment: Credit Card
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="paypal" value="Paypal">
                        <label class="form-check-label" for="paypal">
                            Payment: PayPal
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"   class="btn btn-success " data-toggle="modal" >Confirm </button>
                    </div>
                </div>
        </form>
    </body>
</html>

