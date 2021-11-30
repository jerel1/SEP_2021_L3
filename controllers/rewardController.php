<?php
    require_once __DIR__."/../connection.php";


    //code snippet 4-14
    function updateRewardAvailability($id) {
        global $conn;
        mysqli_query($conn, "UPDATE rewards SET availability=availability-1 WHERE id=$id");
    }
?>