<link rel="stylesheet" href="merchantglobal.css">
    <script src="menu.js"></script>
<?php
    // require_once "../header.php";
    require_once "../../controllers/restaurantController.php";
?>
<body>
<nav id="navbar">
        <ul>
            <li>
                <a href="fpaafk" id="prfpic">profilepic</a>
            </li>
            <li>
                <a href="/SEP_2021_L3/delivery/views/index.php" id="home">Home</a>
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
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Clients</a>
                <a href="#">Contact</a>
                </div>

                </div>

                <!-- Use any element to open/show the overlay navigation menu -->
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            </li>
        </ul>
    </nav>
    <header>
        <h1>
    <?php
            session_start();
            if(isset($_SESSION['loggedInUser'])) {
            $user = $_SESSION['loggedInUser'];
            $name = $user["name"]; 
            echo "Welcome ".$name."!";
            $role = $user["role"];
        }
    ?>
        </h1>
    </header>
    <section id="restaurants">
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
    <div id="mr">
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
    }
?>

    <!-- code snippet 3-6 -->
    
    <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=300,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
<p><a href="JavaScript:newPopup('addrestaurant.php');"><button class="addRestaurantBtn"><img src="images/plusSignbutton.png" id="plussign"></button></a></p>
<div>
    <?php
        if(isset($_SESSION["merchantHomeMessage"])) {
            echo $_SESSION["merchantHomeMessage"];
            unset($_SESSION["merchantHomeMessage"]);
        }
    ?>
</div>
</div>
    </section>
</body>
</html>