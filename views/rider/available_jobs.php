<?php
    require_once "../header.php";

    // code snippet 5-2
    require_once "../../controllers/jobController.php";
    require_once "../../controllers/ordersController.php";
    require_once "../../controllers/itemController.php";
    require_once "../../controllers/customerController.php";

    $availableOrders = getAvailableOrders();
    $user = $_SESSION["loggedInUser"];

?>
<body>
    <h1>Available Jobs</h1>
    <!-- Replace the following h1 with code snippet 5-4 -->
    <h1>To be implemented later</h1>
</body>
