<?php
    require_once "merchantglobal.php";
    // code snippet 2-1
    require_once "../../controllers/itemController.php";
    require_once "../../controllers/ordersController.php";
      
?>
<body>
    <link rel="stylesheet" href="restaurantsales.css">
    <section>
    <!-- Replace the following h1 with code snippet 2-5 -->
    <h1>Restaurants Sales</h1>
    <?php
        $restaurant_id = $_GET["id"];
        $restaurant = getRestaurantById($restaurant_id);
            echo "<article class='restaurant_sales restaurant'>";
            echo "<h2>".$restaurant["name"]."</h2>";
            $items = getAllItemsFromRestaurant($restaurant_id);
            echo "<ol class='restaurant_sales'>";
            $grandTotal = 0;
            foreach($items as $item) {
                $itemOrder = getOrderSummary($item["itemid"]);
                echo "<li>";
                echo $item["name"];
                if(isset($itemOrder["totalQuantity"]))
                {
                    echo " ( Sold: ".$itemOrder["totalQuantity"]." Sales: $".$itemOrder["totalAmount"]." )";
                    $grandTotal+=$itemOrder["totalAmount"];
                    $grandtotal=round($grandTotal,2);
                }
                echo "</li>";
            }
            echo "</ol>";
            echo "Total sales: <b>$".$grandtotal."</b>";
            echo "</article>";
    ?>

    </section>
</body>