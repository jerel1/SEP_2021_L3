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

            case "update":
               ProfileUpdate();
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

    function validate_file($fileType, $fileSize){
        $filetype_limit = ['image/png', 'image/jpg','image/jpeg'];

        $filesize_limit = 1000000; //bytes, 1MB

        if (in_array($fileType, $filetype_limit) && $fileSize <= $filesize_limit){
            return true;
        }
        else{
            return false;
        }
    }

    // code snippet 4-9
    function ProfileUpdate() {
        global $conn;
        if(!empty($_POST)) {
            session_start();
            $id = $_POST["id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $mobileNumber = $_POST["mobileNumber"];
            $address = $_POST["address"];

            if(!empty($_FILES['profilepic']['name']))
            {
                
                $target_dir = "../views/uploaded_images/";
                $target_file = $target_dir . basename($_FILES['profilepic']['name']);
                
                $file_name = basename($_FILES['profilepic']['name']);
                $file_size = $_FILES['profilepic']['size'];
                $file_type = $_FILES['profilepic']['type'];
                $valid_file_type= validate_file($file_type,$file_size);

                if ($valid_file_type){
                    if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $target_file)){
                        mysqli_query($conn,"UPDATE users set name='$name', email='$email',password=MD5('$password'),profilepic='$file_name' where id=$id");
                        
                        //update the session variable as well to reflect changes on the UI
                        $user = $_SESSION["loggedInUser"];
                        $user["name"] = $name;
                        $user["email"] = $email;
                        $user["profilepic"] = $file_name;
                        $_SESSION["loggedInUser"] = $user;
                
                        $_SESSION["updateProfileMessage"] = "Profile Updated Successfully!";
                    }
                    else{
                        header('Location:'. $_SERVER['HTTP_REFERER']);
                        $_SESSION["updateProfileMessage"] = "System Error";
                    }
                }
                else{
                    header('Location:'. $_SERVER['HTTP_REFERER']);
                    $_SESSION["updateProfileMessage"] = "Invalid file type or file size";
                    
                }
                

               
            }
            else 
            {
                mysqli_query($conn,"UPDATE users set name='$name', email='$email',password=MD5('$password') where id=$id");
                $user = $_SESSION["loggedInUser"];
                $user["name"] = $name;
                $user["email"] = $email;
                $_SESSION["loggedInUser"] = $user;
            }
           
            mysqli_query($conn,"UPDATE customers set mobileNumber=$mobileNumber,address='$address' where user_id=$id");
            
    

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