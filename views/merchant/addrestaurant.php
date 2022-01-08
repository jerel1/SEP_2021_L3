<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "../../controllers/restaurantController.php";?>
</head>
<body>
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
</body>
</html>