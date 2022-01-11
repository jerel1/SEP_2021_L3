<?php
    require_once __DIR__."/../connection.php";
    require_once "ordersController.php";

    date_default_timezone_set("Asia/Singapore");

    // code snippet 5-1
    function getAvailableOrders() {
        global $conn;
        $date = date("Y-m-d");
        $time = date("H:i:s");
    
        // combine results for date > today  + date=today AND time>now (basically orders after the current time)
        $query = mysqli_query($conn,
        "select * from orders where delivery_date='$date' and delivery_time>='$time' and status='unassigned'
        UNION select * from orders where delivery_date>'$date' and status='unassigned'");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
        return $result;
    }

    // code snippet 5-5
    function getAssignedJobs($rider_id) {
        global $conn;
        $query = mysqli_query($conn,"select * from jobs j inner join orders o on j.order_id=o.id where j.rider_id=$rider_id and j.delivery_status<>'Delivered'");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
        return $result;
    
    }
?>