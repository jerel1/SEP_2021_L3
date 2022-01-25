<?php
    session_start();
    require_once __DIR__."/../connection.php";

    // Code snippet 1-2
    //check to ensure there was a post data
    if(!empty($_POST)) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_SESSION["role"];
        $query = mysqli_query($conn,"SELECT * from users where email='$email' and password=MD5('$password')");
        $result = mysqli_fetch_assoc($query);
        //check if result contains something.
        if($result) {
            $_SESSION["loggedInUser"] = $result;
            if($role ="merchant"){
                header("Location:../views/merchant/index.php");
            }
            else if($role="admin"){
            
            }
            else if($role = "customer"){

            }
            else if($role = "rider")
        
        }
        else if($role = "admin"){

        }      
        else {
            $_SESSION["loginErrorMessage"] = "You have entered the wrong login credentials. Please try again.";
            header("Location: ../views/login.php");
        }
    }
?>