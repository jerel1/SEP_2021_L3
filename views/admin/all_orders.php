<?php
    require_once "../header.php";
    // code snippet 2-7
    require_once "../../controllers/ordersController.php";
    $past_orders = getAllOrders();
    
?>
<body>
    <section>
    <!-- Replace the following h1 with code snippet 2-8 -->
    <?php
        if(count($past_orders)>0) {
            $orderCount = 1;
            $totalAmount = 0;
            foreach($past_orders as $order) {
                echo "<article class='old_order'>";
                echo "<h3>Order #".$orderCount."</h3>";
                echo "Delivery Date/Time: ".$order["delivery_date"]." ".date("h:i A",strtotime($order["delivery_time"]))."<br>";
                $orderDetails = getOrderDetailsById($order["id"]);

                echo "<ol>";
                $totalAmount=0;
                foreach($orderDetails as $detail) {
                    echo "<li>".$detail["quantity"]." x ".$detail["name"]." ( $".$detail["amount"]." )</li>";
                    $totalAmount+=$detail["amount"];
                }
                echo "</ol>";
                echo "<b>Total amount: $".$totalAmount."</b><br>";
                $orderCount++;
                echo "</article>";
            }
        } else {
            echo "<h2>There are no past orders</h2>";
        }
    ?>

    </section>
</body>