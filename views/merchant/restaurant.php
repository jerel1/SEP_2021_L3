<?php
    require_once "merchantglobal.php";
    // code snippet 3-10 
    require_once "../../controllers/restaurantController.php";

$restaurant_id = $_GET["id"];

$restaurant = getRestaurantById($restaurant_id);  
?>
<link rel="stylesheet" href="restaurant.css">
<body>
    <section class="merchant_restaurant_home">
    <!-- Replace the following h1 with code snippet 3-11 -->
    <?php
    $edit = isset($_POST["edit"]);
?>
<div id="restaurant">
    <h2>Click here to see the menu!!!!</h2>
    <a href="menu.php?id=<?=$restaurant['id']?>"><img class="restaurant_img" src="<?='../uploaded_images/'.$restaurant['image']?>" alt="<?=$restaurant['image']?>"></a>
    <?php
        if($edit) {
            echo "<form action='../../controllers/restaurantController.php?function=updateRestaurant&id=".$restaurant["id"]."' enctype='multipart/form-data' method='POST'>";
            echo "<input type='file' name='image' id='image' accept='image/*' onchange='readURL(this);'><br>";
        }
    ?>
    </div>
    <div class="restaurant_description">
        <?php
            if(!$edit) {
        ?>
                <h3><?=$restaurant["name"];?></h3>
                <!-- the date function is to format the SQL time to more human-readable format.  -->
                <div>Opened from <?=date("h:i A",strtotime($restaurant["open_hours"]))?> to <?=date("h:i A",strtotime($restaurant["close_hours"]))?></div><br>
                <div>
                    Type of cuisine: <?=$restaurant['cuisine']?><br><br>
                    Website: <a href="<?=$restaurant['website']?>" target="_blank"><?=$restaurant['website']?></a><br><br>
                    Address: <?=$restaurant['address']?><br><br>
                </div>
        <?php
            } else {
        ?>     <div class="editrestaurant">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?=$restaurant["name"];?>" required><br>
                <label for="open_hours">Opening hours</label>
                <input type="time" name="open_hours" id="open_hours" value="<?=$restaurant["open_hours"]?>" required><br>
                <label for="close_hours">Closing hours</label>
                <input type="time" name="close_hours" id="close_hours" value="<?=$restaurant["close_hours"]?>" required><br>
                <label for="cuisine">Cuisine:</label>
                <select name="cuisine" id="cuisine" required>
                <?php
                    $cuisines = getCuisines();
                    foreach ($cuisines as $cuisine) {
                        if($restaurant["cuisine"]==$cuisine["name"]) {
                            echo "<option value='".$cuisine["id"]."' selected=true>".$cuisine["name"]."</option>";
                        } else {
                            echo "<option value='".$cuisine["id"]."'>".$cuisine["name"]."</option>";
                        }
                    }
                ?>
                </select><br>
                <label for="website">Website:</label>
                <input type="text" name="website" id="website" value="<?=$restaurant['website']?>" required><br>
                <label for="address">Address:</label>
                <textarea name="address" id="address" cols="20" rows="5" required><?=$restaurant['address']?></textarea><br>
                <input type="submit" value="Update restaurant information">
                </form>
        <?php
            }
        ?>
        </div>
    <?php
        if(!$edit) {
    ?>
        <form method="post">
            <input type='submit' name="edit" id='edit' value='Edit restaurant information'>
        </form>
        <form action="../../controllers/restaurantController.php?function=removeRestaurant&id=<?=$restaurant["id"]?>" method='post' onsubmit="return confirmDelete();">
            <input type='submit' name='delete' value='Delete restaurant'>
        </form>
    <?php
        }
    ?>
    <div>
        <?php
            if(isset($_SESSION["restaurantUpdateMsg"])) {
                echo $_SESSION["restaurantUpdateMsg"];
                unset($_SESSION["restaurantUpdateMsg"]);
            }
        ?>
    </div>
    </section>
    <!-- code snippet 3-12 -->
    <script src="../js/jquery-3.5.1.min.js"></script>
<script>
    // reload the image upon file selection
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.restaurant_img').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function confirmDelete() {
        var ans = confirm("Are you sure you want to delete?");
        return ans;
    }
</script>  
</body>