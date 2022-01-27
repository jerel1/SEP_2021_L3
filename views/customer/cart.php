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
           
            echo "<h1 id='style'>MY ORDERS</h1>";
            
            echo "<h4>$5 Delivery Charge will be applied for orders below $40</h4>";
            
            echo "<ol class='orders'>";
           
            ?> <div class = "order_info"> <?php
            foreach($orders as $order) {
    ?>
            <div id="cartflex">
                <div id="cartTXT">
                    <p class="cartp" id="cartname"><?php echo $order['name']; ?></p><br>
                </div>
                <div id="cartucost">
                    <p>$<?php echo number_format($order['amount'],2); ?> <br></p>
                </div>
                <form action="../../controllers/ordersController.php?function=deleteItem" method="POST">
                        <input type="hidden" name = "order_id" value = "<?php echo $order['order_id']; ?>">
                        <input type="hidden" name = "item_id" value = "<?php echo $order['item_id']; ?>">
                        <input type="hidden" name = "qty" value = "<?php echo $order['quantity']; ?>">
                        <input type="submit" value = "-">
                    </form>
                    <?php echo $order["quantity"]; ?>
                <form action="../../controllers/ordersController.php?function=addItem" method="POST">
                    <input type="hidden" name = "order_id" value = "<?php echo $order['order_id']; ?>">
                    <input type="hidden" name = "item_id" value = "<?php echo $order['item_id']; ?>">
                    <input type="hidden" name = "qty" value = "<?php echo $order['quantity']; ?>">
                    <input type="submit" value = "+">
                </form>
                
            </div>    
            <?php
                    }?>
                    
            </div>
            <div>
                <br>
                <br>
            <label class='DD'>Delivery Date:</label>
            <input type="date" name="datetime" id="datetimebox" class="delv" require><br><br>
            <label class='DD'>Delivery Time:</label>
            <input type="time" name="datetime" id="datetimebox" class="delv" require><br>
            <?php
                    // can use $order here because php will still hold reference to the last $order element in the foreach loop.
                    echo "<div class='total_amt' ><b>Total amount: $".$order["totalAmount"]."</b></div>";
                    
                    $_SESSION["totalAmount"]=$order["totalAmount"];
                    echo "<a href='checkout.php?order_id=".$order["order_id"]."'>Checkout order</a>";
                } else {
                    echo "<h2>Your cart is currently empty</h2>";
                }
            ?>
        </div>
                
</section>
</body>
</html>