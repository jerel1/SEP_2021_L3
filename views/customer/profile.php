
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/delivery/views/css/CustomerProfile.css">

    <?php
    //require_once "../header.php";
    include '../header.php';
    include '../../controllers/customerController.php';
    ?>
</head>
<body>

    <?php 
        $user = $_SESSION["loggedInUser"];
        $customer = getCustomerRecord($user["id"]);
    ?>
    

    <div id="Contact">
               
                <div id="Zoom"><h2>Your profile!</h2></div>

                <div id = "profilePicture">
                
                <?php 
                    if(!empty($user["profilepic"]))
                    {
                        ?>
                        <img src="../uploaded_images/<?php echo $user["profilepic"] ?>" width='180' height='180' alt="<?php echo $user['profilepic'] ?>">
                        <?php
                    }
                    else 
                    {
                        echo "<img src='../uploaded_images/profilepic.png' alt='default' width='180' height='180'>";
                    }
                ?>

                
                
                
               
                <div id="middle">

                <div>
                    <label>Name</label>
                    
                    <div><?=$user["name"];?></div><br>
                </div>
                <br>

                <div>
                    <label>Email Address</label>
                    
                    <div><?=$user["email"];?></div><br>
                </div>
                <br>

            

                <div>
                    <label for="">Phone Number</label>
                    
                    <div><?=$customer["mobileNumber"];?></div><br>
                </div>

                <br>
                <div>
                    <label>Address</label>
                    
                   <div><?=$customer["address"];?></div><br>
                </div> 
                
                <br>

                <div class="updateProfile">
                    
                <a href="updateProfile.php"><button>Update Profile</button></a>
                   
               </div>
               </div>

</div>
    
    </section>
</body>
</html>