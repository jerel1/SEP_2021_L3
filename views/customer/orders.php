<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/delivery/views/css/Cart.css">
    <?php
    require_once "../header.php";
    ?>

</head>

<body>

<section class="cart">
<!-- replace the following h1 with code snippet 4-4 -->

<?php
         require_once "../../controllers/ordersController.php";
         require_once "../../controllers/customerController.php";

 

?>
<?php
        $orders = getCustomerCurrentOrder();
        if(count($orders)>0) {
            echo "<h2>My orders</h2>";
            echo "<ol class='orders'>";
            foreach($orders as $order) {
    ?>
                <li>
                    <article class="order_item">
                        <?php
                            echo "<div>".$order["quantity"]." x ".$order["name"]." ( $".$order["amount"]." )</div>";
                        ?>
                    </article>
                </li>
    <?php
            }
            echo "</ol>";
            // can use $order here because php will still hold reference to the last $order element in the foreach loop.
            echo "<div><b>Total amount: $".$order["totalAmount"]."</b></div>";
            $_SESSION["totalAmount"]=$order["totalAmount"];

            
            echo "<div class='checkout'><a href='checkout.php?order_id=".$order["order_id"]."'><p>Checkout order</p></a></div>";
            
        } else {
            echo "<h2>You do not have any orders at the moment</h2>";
        }
    ?>

</section>
</body>
</html>