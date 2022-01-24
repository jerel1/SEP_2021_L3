<?php
    require_once __DIR__."/../connection.php";

    //code snippet 4-5
    if(isset($_GET["function"])) {
        $function = $_GET["function"];
        session_start();
        switch($function) {
            case "add":
                addOrder();
            break;
        }
    }
    
    function addOrder() {
        global $conn;
        if(!isset($_SESSION["loggedInUser"])) {
            $_SESSION["orderPromptMessage"] = "Please <a href='/delivery/views/login.php'>login</a> before making an order";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            if(!empty($_POST)) { 
                $customer_id =  $_SESSION["loggedInUser"]["id"];
                $order_query = mysqli_query($conn,"SELECT * from orders where customer_id=$customer_id and checked_out=0");
                $order_query_result = mysqli_fetch_assoc($order_query);
                $order_id = -1;
                //if order has been created before, it means it is the current order but haven't checked out
                if($order_query_result) {
                    $order_id = $order_query_result["id"];
                } else {    //otherwise, create a new order record
                    mysqli_query($conn, "INSERT into orders (customer_id) values ($customer_id)");
                    $order_id = mysqli_insert_id($conn);
                }
    
                $item_id = $_POST["item_id"];
                $item_price = $_POST["item_price"];
    
                $order_detail_query = mysqli_query($conn,"SELECT * from order_details where order_id=$order_id and item_id=$item_id");
                $order_detail_query_result = mysqli_fetch_assoc($order_detail_query);
                //if there exist the item in this particular order, then update the quantity and amouunt
                if($order_detail_query_result) {
                    mysqli_query($conn, "UPDATE order_details set quantity=quantity+1, amount=amount+$item_price where order_id=$order_id and item_id=$item_id");
                } else {
                    mysqli_query($conn, "INSERT into order_details (order_id,item_id,quantity,amount) values($order_id,$item_id,1,$item_price)");
                }
    
                //update total amount in orders table
                mysqli_query($conn, "UPDATE orders set amount=amount+$item_price where id=$order_id");
                
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
    //code snippet 4-7
    function removeOutstandingOrders() {
        global $conn;
        $customer_id =  $_SESSION["loggedInUser"]["id"];
        $order_query = mysqli_query($conn,"SELECT * from orders where customer_id=$customer_id and checked_out=0");
        $order_query_result = mysqli_fetch_assoc($order_query);
        //remove all outstanding un-checked out orders from db
        if($order_query_result) {
            $order_id = $order_query_result["id"];
            mysqli_query($conn, "DELETE from orders where id=$order_id");
        }
    }
    //code snippet 2-4
    function getOrderSummary($item_id) {
        global $conn;
        $query = mysqli_query($conn, "SELECT sum(quantity) as totalQuantity, sum(amount) as totalAmount from order_details where item_id=$item_id");
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
    

    //code snippet 2-6
    //Retrieve all the order details and join with the items table.
    function getOrderDetailsById($order_id) {
        global $conn;
        $query = mysqli_query($conn, "SELECT od.*, i.name from order_details od INNER JOIN items i on od.item_id=i.id where od.order_id=$order_id");
        $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
        return $result;
    }


    //Retrieve all the orders which have been checked_out. Recall that this field is to indicate if the customer has checked out the orders.
    function getAllOrders() {
        global $conn;
        $customer_id =  $_SESSION["loggedInUser"]["id"];
        $order_query = mysqli_query($conn,"SELECT * FROM orders where checked_out=1 order by order_date DESC");
        $order_query_result = mysqli_fetch_all($order_query, MYSQLI_ASSOC);
        return $order_query_result;
    }

    //code snippet 4-6
    function getCustomerCurrentOrder() {
        global $conn;
        if(isset($_SESSION["loggedInUser"])) {
            $customer_id =  $_SESSION["loggedInUser"]["id"];
            $order_query = mysqli_query($conn,"SELECT od.*, o.amount as totalAmount, i.name FROM order_details od INNER JOIN items i ON od.item_id=i.id INNER JOIN orders o ON od.order_id=o.id where o.customer_id=$customer_id and o.checked_out=0");
            $order_query_result = mysqli_fetch_all($order_query, MYSQLI_ASSOC);
            return $order_query_result;
        }
        //return empty array if the customer is not logged in
        return array();
    }
?>