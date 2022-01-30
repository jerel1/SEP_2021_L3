<?php
    require_once "../header.php";
    require_once "../../controllers/ordersController.php";
    require_once "../../controllers/restaurantController.php";
    require_once "../../controllers/customerController.php";
?>
<style>
    section{
        text-align:center;
    }
</style>
<head>
    <!-- <link rel="stylesheet" href="views/customer/checkout.css"> -->
</head>
<body>
    <?php
        $user = ISSET($_SESSION["loggedInUser"])?$_SESSION["loggedInUser"]:false;
        $ordersummary = GetOrderById($_GET['order_id']);
        $customerAddress = getCustomerRecord($user["id"]);
        $orderDetail = getOrderDetailsById($_GET['order_id']);
    ?>
 
 
    <section id="checkout">
    <h1>Checkout Summary</h1>
    <h2>Your Order Has Been Placed!</h2>
   <div>
    <?php
        echo '<p> Order Number : ' . $_GET['order_id']. '</p> <br/>';
        echo '<p> Delivery Address : ' . $customerAddress['address']. '</p> <br/>';
        echo '<p> Delivery Date and Time : ' . $ordersummary['delivery_date'] .'  '. $ordersummary['delivery_time'] . '</p> <br/>';
        
        foreach ($orderDetail as $order){

            echo"<div class='Heading'>Order Quantity:<div>";
            echo "<div class='ckoutdetail'><div class='ckoutqnty'>".$order["quantity"] ."". '</div><br>';
            echo"<div class='Heading'>Order Name:<div><br>";
            echo "<div class='ckoutname'>".$order["name"]. '</div>';
            echo "<div class='ckoutamt'>".$order["amount"].' SGD</div></div><br>';
            
        }
        
       
        echo "<div class='ckoutsummary'><div class='ckoutsummary1'>Total Amount :</div><div class='ckoutsummary2 ckouttotal'>". $ordersummary['amount'] . " SGD</div></div>";
       
        
    ?>
    </div>
    </section>
</body>

