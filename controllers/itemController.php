<?php
    require_once __DIR__."/../connection.php";

    // code snippet 2-3
    function getAllItemsFromRestaurant($id) {
        global $conn;
        $query = mysqli_query($conn,"SELECT * from items where restaurant_id=$id");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
        return $result;
    }
    
    // code snippet 5-3
    function getRestaurantFromItem($itemId) {
        global $conn;
        $query = mysqli_query($conn,"SELECT r.name,r.address,i.name as itemName from items i inner join restaurants r on i.restaurant_id = r.id where i.id=$itemId");
        $result = mysqli_fetch_assoc($query); 
        return $result;
    }
?>