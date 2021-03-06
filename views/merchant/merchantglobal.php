<script src="menu.js"></script>
<link rel="stylesheet" href="merchantglobal.css">
<?php
    require_once "../../controllers/restaurantController.php"; 
    $merchant_id = $_GET["id"];
    $restaurants = getAllRestaurantsByMerchant($merchant_id);  
?>
<nav id="navbar">
        <ul>
            <li>
                <a href="index.php" id="home">Home</a>
            </li>
            <li>
                <a href="../logout.php" id="logout">Logout</a>
            </li>
            <li>
                <div id="myNav" class="overlay">

                <!-- Button to close the overlay navigation -->
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <!-- Overlay content -->
                <div class="overlay-content">
                <a href="../login.php">Login</a>
                <a href="restaurantsales.php?id=<?=$merchant_id?>">Restaurant Sales</a>
                <a href="menu.php?id=<?=$merchant_id?>">Restaurant Menu</a>
                <a href="restaurant.php?id=<?=$merchant_id?>">Edit Restaurant details</a>    
            </div>

                </div>

                <!-- Use any element to open/show the overlay navigation menu -->
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            </li>
        </ul>
    </nav>