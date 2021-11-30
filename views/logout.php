<?php
    session_start();

    // code snippet 4-8
    require_once "../controllers/ordersController.php";

    $user = $_SESSION["loggedInUser"];
    if($user["role"]=="customer") {
    removeOutstandingOrders();
}
    session_destroy();
    header("Location: ../index.php");
?>