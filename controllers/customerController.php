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

            header("Location: /delivery");
        }
    }
    

    // code snippet 4-9
    function updateProfile() {
        global $conn;
        if(!empty($_POST)) {
            session_start();
            $id = $_POST["id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $mobileNumber = $_POST["mobileNumber"];
            $address = $_POST["address"];
    
            mysqli_query($conn,"UPDATE users set name='$name', email='$email',password=MD5('$password') where id=$id");
            mysqli_query($conn,"UPDATE customers set mobileNumber=$mobileNumber,address='$address' where user_id=$id");
    
            //update the session variable as well to reflect changes on the UI
            $user = $_SESSION["loggedInUser"];
            $user["name"] = $name;
            $user["email"] = $email;
            $_SESSION["loggedInUser"] = $user;
    
            $_SESSION["updateProfileMessage"] = "Updated profile successfully!";
            //go back to previous page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    function getCustomerRecord($id){
        global $conn;   
        $query = mysqli_query($conn,"SELECT * from customers c inner join users u on c.user_id=u.id where user_id=$id");
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
    // code snippet 4-15
    function updateRewardPoints($id,$reward_points) {
        global $conn;
        mysqli_query($conn,"UPDATE customers set reward_points=$reward_points where user_id=$id");
    } 
?>