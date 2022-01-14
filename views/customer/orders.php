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
            echo "<a href='checkout.php?order_id=".$order["order_id"]."'>Checkout order</a>";
        } else {
            echo "<h2>You do not have any orders at the moment</h2>";
        }
    ?>

</section>