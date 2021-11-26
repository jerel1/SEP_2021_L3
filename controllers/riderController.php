<?php
    require_once __DIR__."/../connection.php";
    
    // code snippet 1-6
    //to handle form submissions
    if(isset($_GET["function"])) {
        session_start();
        $function = $_GET["function"];
        switch($function) {
            case "register":
                registerRider();
                break;
        }
    }

    function registerRider() {
        global $conn;
        if(!empty($_POST)) {
            session_start();
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $mobileNumber = $_POST["mobileNumber"];
            $vehicle = $_POST["vehicleNumber"];
            $account = $_POST["accountNumber"];

            mysqli_query($conn,"INSERT into users(name,email,password,role) values ('$name','$email',MD5('$password'),'rider')");
            $last_id = mysqli_insert_id($conn);

            mysqli_query($conn,"INSERT into riders(user_id,mobile_number,vehicle_number,account_number) values ($last_id,$mobileNumber,'$vehicle','$account')");

            //to obtain the registered user info to put into session
            $login_query = mysqli_query($conn,"SELECT * from users where id=$last_id");
            $result = mysqli_fetch_assoc($login_query);
            $_SESSION["loggedInUser"] = $result;

            header("Location: ../views/rider/index.php");
        }
    }
