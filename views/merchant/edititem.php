        <?php 
             require_once "merchantglobal.php";
             require_once "../../controllers/itemController.php";
             require_once "../../controllers/restaurantController.php";
             $restaurant_id = $_GET["id"];
            $edit = isset($_POST["edit"]);
            $item_id = $_GET["itemid"];   
            $restaurantitem = getItemById($item_id);
            $restaurant = getRestaurantById($restaurant_id);
            echo "<form action='../../controllers/itemController.php?function=EditItem&itemid=".$restaurantitem["itemid"]."' enctype='multipart/form-data' method='POST' >"
        ?>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $restaurantitem["name"]?>" required>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" value="<?php echo $restaurantitem["description"]?>" required>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $restaurantitem["price"]?>" required>
        <label for="discount">Discount:</label>
        <input type="text" name="discount" id="discount" value="<?php echo $restaurantitem["discount"]?>" required>
        <input type="submit" value="Update">
        </form>