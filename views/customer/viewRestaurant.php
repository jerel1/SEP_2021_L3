
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/delivery/views/css/viewRestaurant.css">
    <?php
    require_once "../header.php";

    //code snippet 4-2
    require_once "../../controllers/restaurantController.php";
    require_once "../../controllers/ordersController.php";

    $restaurant_id = $_GET["id"];

    $restaurant = getRestaurantById($restaurant_id);
    ?>
</head>

<body>

   
    <div class="viewRestaurantPage">
    <!-- Replace the following h1 with code snippet 4-3 -->
    <section class="restaurant">
    <div id="border">
    <img class="restaurant_img" src="<?='../uploaded_images/'.$restaurant['image']?>" alt="<?=$restaurant['image']?>">
    
    <aside class="restaurant_description">
        <h3><?=$restaurant["name"];?></h3>
        <!-- the date function is to format the SQL time to more human-readable format.  -->
        <div>Opened from <?=date("h:i A",strtotime($restaurant["open_hours"]))?> to <?=date("h:i A",strtotime($restaurant["close_hours"]))?></div>
        <div>
            Type of cuisine: <?=$restaurant['cuisine']?><br>
            Website: <a href="<?=$restaurant['website']?>" target="_blank"><?=$restaurant['website']?></a><br>
            Address: <?=$restaurant['address']?>
        </div>
    </aside>
    </div>
    <?php require_once "orders.php"?>
  
</section>
<section class="restaurant_view">
<?php
    require_once "../../controllers/itemController.php";
    $items = getAllItemsFromRestaurant($restaurant_id);

    
    if(count($items)==0) {
        echo "<p>There are no menu items in this restaurant</p>";
    } else {
        // echo "<h2>List of menu items</h2>";
        echo "<ul class='restaurant_view menuItems'>";
        foreach($items as $item) {
?>
     <div id="flex">
            <li>
               
                <article class="menuItem">

                    <div class="padding">
                        <h3><?=$item["name"]?></h3>
                        <i><?=$item["description"]?></i><br>
                        
                        <?php
                            $disc = $item["discount"];
                            $price = $item["price"];
                            if($disc==0) {
                                echo "Price: $".$price;
                            } else {
                                //round to two decimal points
                                $price = round($price*(100-$disc)/100,2);
                                echo "Price: $".$price." <strike>$".$item["price"]."</strike> (".$disc."% discount)";
                            }
                        ?>
                    </div>

                    <div>
                        <form action="../../controllers/ordersController.php?function=add" method="POST">
                            <input type="hidden" name="item_id" value=<?=$item["id"]?>>
                            <!-- use the discounted price and not the price from db record -->
                            <input type="hidden" name="item_price" value=<?=$price?>>
                            <input type="submit" value="+">
                        </form>
                    </div>
                </article>
                
            </li>
      </div>
<?php
        }
        echo "</ul>";
    }

    if(isset($_SESSION["orderPromptMessage"])) {
        echo "<div class='LoginFirst'><p>".$_SESSION["orderPromptMessage"]."</p></div>";
        unset($_SESSION["orderPromptMessage"]);
    }
?>
</section>


    </div>
</body>
</html>
