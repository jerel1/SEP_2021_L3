<?php
    require_once "../header.php";
    require_once "../../controllers/restaurantController.php";
?>
<body>
    <section>
    <!-- Replace the following h1 with code snippet 3-5 -->
    <?php
        $user = $_SESSION["loggedInUser"];
        $restaurants = getAllRestaurantsByMerchant($user["id"]);
        if(count($restaurants)==0) {
            echo "<p>You have no restaurants currently.</p>";
        } else {
            echo "<h2>List of restaurants</h2>";
            echo "<article class='restaurants'>";
            foreach($restaurants as $restaurant) {
    ?>
            <a href="restaurant.php?id=<?=$restaurant['id']?>">
                <aside class="restaurant">
                    <img class="restaurant_img" src="<?='../uploaded_images/'.$restaurant['image']?>" alt="<?=$restaurant['image']?>">
                    <p class="restaurantName">
                        <?=$restaurant['name']?>
                    </p>
                </aside>
            </a>
    <?php
                
            }
            echo "</article>";
        }
    ?>
    <h1>To be implemented later</h1>

    <!-- code snippet 3-6 -->
    <button class="addRestaurantBtn">Add new restaurant</button>
    <article class="addRestaurantSection">
        <form action="../../controllers/restaurantController.php?function=addRestaurant" enctype="multipart/form-data" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>
            <label for="open_hours">Opening hours</label>
            <input type="time" name="open_hours" id="open_hours" required><br>
            <label for="close_hours">Closing hours</label>
            <input type="time" name="close_hours" id="close_hours" required><br>
            <label for="cuisine">Cuisine:</label>
            <select name="cuisine" id="cuisine" required>
            <?php
                $cuisines = getCuisines();
                foreach ($cuisines as $cuisine) {
                    echo "<option value='".$cuisine["id"]."'>".$cuisine["name"]."</option>";
                }
            ?>
            </select><br>
            <label for="website">Website:</label>
            <input type="text" name="website" id="website" required><br>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" accept="image/*" required><br>
            <label for="address">Address:</label>
            <textarea name="address" id="address" cols="20" rows="5" required></textarea><br>
            <input type="submit" value="Add restaurant">
        </form>
    </article>
    <div>
        <?php
            if(isset($_SESSION["merchantHomeMessage"])) {
                echo $_SESSION["merchantHomeMessage"];
                unset($_SESSION["merchantHomeMessage"]);
            }
        ?>
    </div>
    </section>

    <!-- code snippet 3-7 -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".addRestaurantBtn").click(function(){
                $(".addRestaurantSection").show();
            });
        })
    </script>

</body>
</html>