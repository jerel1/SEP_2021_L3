<?php
    require_once "./header.php";

    // code snippet 1-3
    if(isset($_SESSION["loggedInUser"])) {
        $user = $_SESSION["loggedInUser"];
        $role = $user["role"];
        if($role=="admin") {
            header("Location: ./views/admin/index.php");
        } else if($role=="merchant") {
            header("Location: ./views/merchant/index.php");
        }  else if($role=="rider") {
            header("Location: ./views/rider/index.php");
        }
    }
?>
<body>
    <!-- code snippet 4-13 -->
    <section class="searchSection">
    <form method="post">
        <input type="text" name="search" id="search" size="40" placeholder="Search restaurants">
        <input type="submit" value="Search">
    </form>
</section>
    <section class="restaurants">
    <!-- Replace the following h1 with code snippet 4-1 -->
    <?php
    foreach($restaurants as $restaurant) {
?>
        <article class="restaurant">
            <img class="restaurant_img" src="<?='./views/uploaded_images/'.$restaurant['image']?>" alt="<?=$restaurant['image']?>">
            <aside class="restaurantDetails">
                <h3><a href="./views/customer/viewRestaurant.php?id=<?=$restaurant["id"]?>"><?=$restaurant['name']?></a></h3>
                <i><?=$restaurant['address']?></i><br><br>
                Opened from <?=date("h:i A",strtotime($restaurant["open_hours"]))?> to <?=date("h:i A",strtotime($restaurant["close_hours"]))?><br><br>
                Type of cuisine: <strong><?=$restaurant['cuisine']?></strong><br>
                Website: <a href="<?=$restaurant['website']?>" target="_blank"><?=$restaurant['website']?></a><br>
            </aside>
        </article>
<?php         
    }
?>
    </section>
</body>
