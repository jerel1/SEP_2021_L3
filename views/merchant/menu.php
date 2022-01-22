<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="menu.css">
    <?php
        require_once "merchantglobal.php";
        require_once "../../controllers/itemController.php";
        require_once "../../controllers/restaurantController.php";
        session_start();
        ?>
</head>
<body>
    <section id="menuflex">
<?php

$restaurant_id = $_GET["id"];
$edit = isset($_POST["edit"]);
$restaurant = getRestaurantById($restaurant_id);
?>

<body>
<div class="viewRestaurantPage">
    <!-- Replace the following h1 with code snippet 4-3 -->
    <h2>Click the image to see the sales of this restaurant!</h2>
    <a href="restaurantsales.php?id=<?=$restaurant["id"]?>"><img class="restaurant_img" src="<?='../uploaded_images/'.$restaurant['image']?>" alt="<?=$restaurant['image']?>"></a>
        <h3><?=$restaurant["name"];?></h3>
        <!-- the date function is to format the SQL time to more human-readable format.  -->
        <div>Opened from <?=date("h:i A",strtotime($restaurant["open_hours"]))?> to <?=date("h:i A",strtotime($restaurant["close_hours"]))?></div>
        <div>
            Type of cuisine: <?=$restaurant['cuisine']?><br>
            Website: <a href="<?=$restaurant['website']?>" target="_blank"><?=$restaurant['website']?></a><br>
            Address: <?=$restaurant['address']?>
        </div>
</div>
<div class="restaurant_view">
<?php
    $items = getAllItemsFromRestaurant($restaurant_id); 
    ?>
<?php
    if(count($items)==0) {
        echo "<p>There are no menu items in this restaurant</p>";
    } else {
        echo "<h2>List of menu items</h2>";
        echo "<ol class='restaurant_view menuItems'>";
        if(!$edit){
        foreach($items as $item) {    
        ?>
            <li>
                        <h3><?=$item["name"]?></h3>
                        <i><?=$item["description"]?></i><br>
                        <h3>
                        <?php
                            $disc = $item["discount"];
                            $price = $item["price"];
                                //round to two decimal points
                                $price = round($price*(100-$disc)/100,2);
                                if($disc==0){
                                    echo "Price: $".$item["price"]."(".$disc."% discount)";
                                }
                                else{
                                    echo "Price: $".$price." <strike>$".$item["price"]."</strike> (".$disc."% discount)";
                                }

                            
                        ?>
                        </h3>
                        <form method='post' action='edititem.php?id=<?=$restaurant["id"]?>&itemid=<?=$item["itemid"]?>'>
                            <input type="hidden" name="item_id" value=<?=$item["itemid"]?>>
                            <!-- use the discounted price and not the price from db record -->
                            <input type="hidden" name="item_price" value=<?=$price?>>
                            <input type="submit" name="edit" value="Edit" id="edit">
                            </form>
                            <form action="../../controllers/itemController.php?function=Delete&itemid=<?=$item["itemid"]?>" method='post' onsubmit="return confirmDelete();">
                            <input type="submit" name="delete" value="Delete">
                        </form>
            </li>
                            <?php }
                            echo "</ol>";
                            }
                            
                        }?>
                        
                        
                        
        </div>
            </section>
<?php
    if(isset($_SESSION["DeleteMessage"])) {
        echo "<div>".$_SESSION["DeleteMessage"]."</div>";
        unset($_SESSION["DeleteMessage"]);
    }
?>
<script>
    function confirmDelete() {
        var ans = confirm("Are you sure you want to delete?");
        return ans;
    }
</script>            
</body>
</html>