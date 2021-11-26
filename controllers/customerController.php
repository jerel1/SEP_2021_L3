<?php
    // __DIR__ refers to the current directory this file is in. 
    // so no matter which php file requires this file, it will always be able to find the relative path to connection.php
    require_once __DIR__."/../connection.php";

    // code snippet 1-4
    //to handle form submissions
    if(isset($_GET["function"])) {
        $function = $_GET["function"];
        switch($function) {
            case "register":
                registerCustomer();
                break;
        }
    }

    function registerCustomer() {
        global $conn; //to refer to the $conn variable defined in connection.php
        if(!empty($_POST)) {
            session_start();
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $mobileNumber = $_POST["mobileNumber"];
            $address = $_POST["address"];       

            mysqli_query($conn,"INSERT into users(name,email,password,role) values ('$name','$email',MD5('$password'),'customer')");
            //to obtain the newly inserted id in the users table
            $last_id = mysqli_insert_id($conn); 
            mysqli_query($conn,"INSERT into customers(user_id,mobileNumber,address) values ($last_id,$mobileNumber,'$address')");

            //to obtain the registered user info to put into session
            $login_query = mysqli_query($conn,"SELECT * from users where id=$last_id");
            $result = mysqli_fetch_assoc($login_query);
            $_SESSION["loggedInUser"] = $result;

            header("Location: /delivery_jerel");
        }
    }
    

    // code snippet 4-9

    // code snippet 4-15
?>