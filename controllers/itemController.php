<?php
    require_once __DIR__."/../connection.php";

    if(isset($_GET["function"])) {
        $function = $_GET["function"];
        switch($function) {
            case "EditItem":
                EditItem();
                break;
            case "DeleteItem":
                    DeleteItem();
                    break;
        }
    }
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
        $query = mysqli_query($conn,"SELECT r.name,r.address,i.name as itemName from items i inner join restaurants r on i.restaurant_id = r.id where i.itemid=$itemId");
        $result = mysqli_fetch_assoc($query); 
        return $result;
    }
    function getItemById($item_id){
        global $conn;
        $item_id=$_GET["itemid"];
        $query = mysqli_query($conn,"SELECT itemid,name,description,price,discount from items where itemid=$item_id");
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
    function EditItem(){
        global $conn;
        if(!empty($_POST)){
            $item_id = $_GET["itemid"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $discount = $_POST["discount"];
            $price = $_POST["price"];
            $query = mysqli_query($conn,"UPDATE items set name = '$name', description = '$description', price = '$price', discount = '$discount' where itemid = '$item_id'");
            if($query){
               header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            else{
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
    function DeleteItem(){
        global $conn;
        if(!empty($_GET)){
            $item_id = $_GET["itemid"];
            mysqli_query($conn,"DELETE from items where itemid='$item_id'");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>