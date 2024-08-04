<?php
if(!session_id()){
    session_start();
}
require_once './Users.php';
$user = new Users();
if(!$user->isLoggedIn ()){
    header ("location:/signing.php");
}
?>

<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="projekt.css">

            </head>
    <body>
        <div class="menu">

        <a href="#" class="logo">BlejRroba</a>

        <ul class="navlist">
            <li id="home"><a href="#">Home</a></li>
            <li><a href="/productShow.php">Products</a></li>
            <li> <a class="me-3 py-2 text-dark text-decoration-none position-relative" href="/checkout.php">
                Card
                <?php
                    require_once "./Cart.php";
                    $cart = new Cart();
                    $nrOfProducts = $cart->getNrOfProducts ();
                    if($nrOfProducts>0){
                        ?>
                <span class="badge rounded-pill bg-danger"><?php echo $nrOfProducts; ?> </span>
                <?php
                    }
                ?>
            </a></li>
            <li><a href="/Profile.php">Profile</a></li>
            
            <?php
                require_once "./Users.php";
                $user = new Users();
                if($user->isLoggedIn ()){
                    ?>
                  <li>  <a class="me-3 py-2 text-dark text-decoration-none" href="/logout.php"><strong>LOGOUT</strong></a></li>
            <?php
                }
            ?>
        </ul>
            </div>
    </body>
</html>