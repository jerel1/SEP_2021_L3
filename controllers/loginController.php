<?php
    session_start();
    require_once __DIR__."/../connection.php";

    // Code snippet 1-2
    //check to ensure there was a post data
    if(!empty($_POST)) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query = mysqli_query($conn,"SELECT * from users where email='$email' and password=MD5('$password')");
        $result = mysqli_fetch_assoc($query);
        //check if result contains something.
        if($result) {
            $_SESSION["loggedInUser"] = $result;
            if(isset($_SESSION["loggedInUser"])) {
                $user = $_SESSION["loggedInUser"];
                $role = $user["role"];
                if($role=="admin") {
                    header("Location: ../views/admin/index.php");
                } else if($role=="merchant") {
                    header("Location: ../views/merchant/index.php");
                } else if($role=="rider") {
                    header("Location: ../views/rider/index.php");
                }
                else if($role=="customer"){
                   header("Location: ../views/customer/viewRestaurant.php") 
                }
            } 
}
    } 
        else {
            $_SESSION["loginErrorMessage"] = "You have entered the wrong login credentials. Please try again.";
            header("Location: ../views/login.php");
        }
?>