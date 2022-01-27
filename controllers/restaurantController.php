<?php
    require_once __DIR__."/../connection.php";

    // code snippet 3-1
    if(isset($_GET["function"])) {
        $function = $_GET["function"];
        session_start();
        switch($function) {
            case "addRestaurant":
                addRestaurant();
            break;
            case "updateRestaurant":
                updateRestaurant();
            break;
            case "removeRestaurant":
                deleteRestaurant();
            break;

            case "rateRestaurant":
                ratingRestaurant();
            break;

            case "Rating":
                ratingRestaurant();
            break;
        }
    }

    function ratingRestaurant()
    {

                global $conn;
           
                $restaurant_id = $_GET["id"];
                $rating= $_POST["rating"];
                //echo"<br>you have chosen $rating";/
                $ratingValue = mysqli_query($conn,"SELECT Rating from restaurants WHERE id=2");
                $rating_fetch= mysqli_fetch_assoc($ratingValue);

                $raters = mysqli_query($conn,"SELECT Raters FROM restaurants WHERE id=2");
                $raters_num = mysqli_fetch_assoc($raters);
                $raters_final=(int)$raters_num;

                mysqli_query($conn,"UPDATE restaurants SET Raters=$raters_final+1 WHERE id=2");

                $average=((int)$rating_fetch+(int)$rating)/$raters_final;
                mysqli_query($conn,"UPDATE restaurants SET Rating=$average WHERE id=2");

                header('Location: ' . $_SERVER['HTTP_REFERER']);
                

            /* mysqli_query($conn,"UPDATE restaurants SET Raters=$raters_num+1 WHERE id=1");
            echo"<br>Raters num is $raters_num"; */


            /* $ratingValue = mysqli_query($conn,"SELECT Rating from restaurants WHERE id='$restaurant_id");
            $rating_fetch= mysqli_fetch_assoc($ratingValue);

            $average=($rating_fetch+$rating)/$raters_num;

            mysqli_query($conn,"UPDATE restaurants SET Rating=$average WHERE id='$restaurant_id'");
            mysqli_query($conn,"UPDATE restaurants SET Raters=$raters_num+1 WHERE id='$restaurant_id'");
            echo"<br>Average is $average"; */
            

    }

    function getRating()
    {

        global $conn;
        if(!empty($_GET)) {
            $restaurant_id = $_GET["id"];
            
    
            global $conn;
            $query = mysqli_query($conn,"SELECT Rating FROM restaurants WHERE  $restaurant_id");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
            return $result;
    
           
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        
    }


    // code snippet 3-2
    function addRestaurant() {
        global $conn;
        if(!empty($_POST)) {
            $merchant_id = $_SESSION["loggedInUser"]["id"];
            $name = $_POST["name"];
            $open_hours = $_POST["open_hours"];
            $close_hours = $_POST["close_hours"];
            $cuisine = $_POST["cuisine"];
            $website = $_POST["website"];
            $address = $_POST["address"];
            $image_name = $_FILES["image"]["name"];
    
            // __DIR__ refer to the directory this file resides in.
            $target = __DIR__."/../views/uploaded_images/".$image_name;
            move_uploaded_file($_FILES["image"]["tmp_name"] , $target);
    
            mysqli_query($conn,"INSERT into restaurants(name,open_hours,close_hours,cuisine_id,website,image,address) values('$name','$open_hours','$close_hours',$cuisine,'$website','$image_name','$address')");
            $last_id = mysqli_insert_id($conn);
            mysqli_query($conn,"INSERT into merchant_restaurant(merchant_id,restaurant_id) values($merchant_id,$last_id)");
    
            $_SESSION["merchantHomeMessage"] = "Restaurant is added successfully!";
            //go back to previous page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    // code snippet 3-8 
    function updateRestaurant() {
        global $conn;
        if(!empty($_POST)) {
            $restaurant_id = $_GET["id"];
            $name = $_POST["name"];
            $open_hours = $_POST["open_hours"];
            $close_hours = $_POST["close_hours"];
            $cuisine = $_POST["cuisine"];
            $website = $_POST["website"];
            $address = $_POST["address"];
            $image_name = $_FILES["image"]["name"];
    
            $hasFile = $_FILES["image"]["size"]!=0;
            // __DIR__ refer to the directory this file resides in.
    
            if($hasFile) {
                $target = __DIR__."/../views/uploaded_images/".$image_name;
                move_uploaded_file($_FILES["image"]["tmp_name"] , $target);
                mysqli_query($conn,"UPDATE restaurants set name='$name',open_hours='$open_hours',close_hours='$close_hours',cuisine_id=$cuisine,website='$website',image='$image_name',address='$address' where id=$restaurant_id");
            } else {
                mysqli_query($conn,"UPDATE restaurants set name='$name',open_hours='$open_hours',close_hours='$close_hours',cuisine_id=$cuisine,website='$website',address='$address' where id=$restaurant_id");
            }
    
            $_SESSION["restaurantUpdateMsg"] = "Restaurant is updated successfully!";
            //go back to previous page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    function deleteRestaurant() {
        global $conn;
        if(!empty($_GET)) {
            $restaurant_id = $_GET["id"];
            $merchant_id = $_SESSION["loggedInUser"]["id"];
    
            mysqli_query($conn,"DELETE from restaurants where id=$restaurant_id");
    
            $_SESSION["merchantHomeMessage"] = "Restaurant is removed successfully!";
            header("Location: ../views/merchant/index.php");
        }
    }
    // code snippet 3-3
    function getAllRestaurantsByMerchant($id) {
        global $conn;
        //select everything from restaurants and cuisine name from cuisine
        $query = mysqli_query($conn,"SELECT r.*, c.name as cuisine FROM restaurants r INNER JOIN merchant_restaurant mr ON r.id=mr.restaurant_id INNER JOIN cuisines c ON c.id=r.cuisine_id WHERE mr.merchant_id=$id");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
        return $result;
    }
    // code snippet 2-2
    function getAllRestaurants() {
        global $conn;
        $query = mysqli_query($conn,"SELECT r.*, c.name as cuisine from restaurants r INNER JOIN cuisines c on c.id=r.cuisine_id");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
        return $result;
    }

    //code snippet 4-12
    function searchRestaurants($search) {
        global $conn;
        $query = mysqli_query($conn,"SELECT r.*, c.name as cuisine from restaurants r INNER JOIN cuisines c on c.id=r.cuisine_id where r.name like '%$search%'");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
        return $result;
    }
    
    // code snippet 3-9
    function getRestaurantById($id) {
        global $conn;
        $query = mysqli_query($conn,"SELECT r.*, c.name as cuisine from restaurants r INNER JOIN cuisines c on c.id=r.cuisine_id where r.id=$id");
        $result = mysqli_fetch_assoc($query); 
        return $result;
    }
    // code snippet 3-4 
    function getCuisines() {
        global $conn;
        $query = mysqli_query($conn,"SELECT * from cuisines");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC); 
        return $result;
    }   
?>