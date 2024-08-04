<?php
if(!session_id()){
    session_start();
}
require_once './Users.php';

$user = new Users();
$current_user = $user->getCurrentUserDetails ();
$addresses = $user-> getCurrentUserAddresses ();
$orders = $user ->getCurrentUserOrder ();
if(!$user->isLoggedIn ()){

    header ("location: ./signing.php");
}
?>
<style>
body{
    background-image: url('foto/foto4.jpg');
    background-size: cover;
    width: 100%;
}

    </style>
<div class="container">
    <h2>My account:</h2>
    <ul class="list-group">
        <li class="list-group-item">Name:<b> <?php echo $current_user['username'] ?></b></li>
        <li class="list-group-item">Email:<b> <?php echo $current_user['email'] ?></b></li>
    </ul>
    <h3>Addresses  </h3>
    <ul class="list-group">
            <?php
            foreach ($addresses as $address){?>
        <li class="list-group-item">
            Address:
            <b>
                <?php echo $address['address'] ?>
                <?php echo $address['city'] ?>
                <?php echo $address['state'] ?>
                <?php echo $address['zipcode'] ?>
            </b>
        </li>
            <?php
            }
            ?>
    </ul>
    <button type="button" href="address-in.php" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Add new Address </button>
    <div class="modal fade"   id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                </div>
            </div>
        </div>
    </div>
    <h3>  Orders </h3>
    <?php
    if(count ($orders)>0){?>
    <table class="table">
        <thead>
        <tr>
            <th>Date </th>
            <th>Method</th>
            <th class="text-center">Order Price</th>
            <th >Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($orders as $order){?>
        <tr>
            <td>  <?php echo $order['created_at'] ?></td>
            <td>  <?php echo $order['payment'] ?></td>
            <td class="text-center"> <?php echo $order['grand_total'] ?>  <span>$</span></td>
            <td>
                <div>
                    <form action="/remove-order.php" method="DELETE">
                        <input type="hidden" name="order_id" value="<?php echo $order['id'] ?>" />
                        <button id="remove" type="submit" class="btn btn-danger" >Cancel</button>
                    </form>
                </div>
            </td>
        </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php }else{
        echo "You don't have any order yet";
    }?>
</div>