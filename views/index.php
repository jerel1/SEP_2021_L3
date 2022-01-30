<head>
    <link rel="stylesheet" href="./views/css/customer/index.css">
    <link rel="stylesheet" href="./views/css/styles.css">
</head>

<?php
    require_once "./views/header.php";
    require_once "./controllers/restaurantController.php";

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
    
    if(isset($_POST['search'])) {
        $restaurants = searchRestaurants($_POST['search']);
    }

    else 
    {
        $restaurants = getAllRestaurants();
    }
?>
<body>
    <?php
        if(isset($_POST['search']) && $_POST['search']!="") {
            echo "Search results for \"". $_POST['search'] . "\"<br><br>";
        }
    ?>




    <section class="restaurants">
    <!-- Replace the following h1 with code snippet 4-1 -->
   
            <article class="restaurant cuisine_<?php echo $restaurant['cuisine_id'];?>" id="restaurant_<?php echo $restaurant['id']; ?>">
                <div class="imageBorder"><img class="restaurant_img" src="<?='./views/uploaded_images/'.$restaurant['image']?>" alt="<?=$restaurant['image']?>"></div>
                <aside class="restaurantDetails">
                    <h3><a class="restaurantName" href="./views/customer/viewRestaurant.php?id=<?=$restaurant["id"]?>"><?=$restaurant['name']?></a></h3>
                    <i><?=$restaurant['address']?></i><br><br>
                    Rating: <?=$restaurant['Rating']?>
                    Opened from <?=date("h:i A",strtotime($restaurant["open_hours"]))?> to <?=date("h:i A",strtotime($restaurant["close_hours"]))?><br><br>
                    Type of cuisine: <strong><?=$restaurant['cuisine']?></strong><br>
                    Website: <a href="<?=$restaurant['website']?>" target="_blank"><?=$restaurant['website']?></a><br>
                </aside>
            </article>
    
    </section>

</body>
