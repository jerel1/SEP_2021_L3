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
    <?php
        
        $user = ISSET($_SESSION["loggedInUser"])?$_SESSION["loggedInUser"]:false;
        date_default_timezone_set("Asia/Singapore"); 

        $date = new DateTime();
        $dt = $date->format("Y-m-d\TH:i:s");
        
        $dt_max = new DateTime("+7 days");
        $dt_max = $dt_max->format("Y-m-d\TH:i:s");
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
                
            <?php
                    
                    echo "<div class='total_amt' ><b>Total amount: $".$order["totalAmount"]."</b></div>";    
                    $_SESSION["totalAmount"]=$order["totalAmount"];
                    $current_order = isset($_SESSION['order_ID'])?($_SESSION['order_ID']):"";
                    ?>
                    <form action="../../controllers/ordersController.php?function=checkOut" method="post">
                    <input type="datetime-local" name="_dt" value="<?php echo $dt ?>" min="<?php echo $dt ?>" max="<?php echo $dt_max ?>">
                    <input type="hidden" name = 'orderID' value='<?php echo $current_order; ?>' >
                    <input type='submit' value='Checkout'>
                    </form>
        
                    <?php
                    
                    
                } else {
                    echo "<h2>Your cart is currently empty</h2>";
                }
            ?>
        </div>
                
</section>
</body>
</html>