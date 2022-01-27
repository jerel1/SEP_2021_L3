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
            echo "<h4>$5 Delivery Charge will be applied for orders below $40</h4>";
            echo "<ol class='orders'>";
            foreach($orders as $order) {
    ?>
               
                <li>
                <article class="order_item">

                    <?php
                        echo "<div>  • ".$order["name"]." ( $".$order["amount"]." )</div>";
                    ?>

                    <form action="../../controllers/ordersController.php?function=deleteItem" method="POST">
                        <input type="hidden" name = "order_id" value = "<?php echo $order['order_id']; ?>">
                        <input type="hidden" name = "item_id" value = "<?php echo $order['item_id']; ?>">
                        <input type="hidden" name = "qty" value = "<?php echo $order['quantity']; ?>">
                        <input type="submit" value = "-">
                    </form>

                    <div> <?php echo $order["quantity"]; ?></div>

                    <form action="../../controllers/ordersController.php?function=addItem" method="POST">
                        <input type="hidden" name = "order_id" value = "<?php echo $order['order_id']; ?>">
                        <input type="hidden" name = "item_id" value = "<?php echo $order['item_id']; ?>">
                        <input type="hidden" name = "qty" value = "<?php echo $order['quantity']; ?>">
                        <input type="submit" value = "+">
                    </form>
                    
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
                    echo "<h2>Your cart is currently empty</h2>";
                }
            ?>

</section>
</body>
</html>