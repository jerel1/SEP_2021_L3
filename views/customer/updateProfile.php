<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/delivery/views/css/Register.css">

    <?php
    include '../header.php';
    include '../../controllers/customerController.php';
    ?>
</head>
<body>
    <section>
    <!-- Replace the following h1 with code snippet 4-11 -->
   
    <?php 
        $user = $_SESSION["loggedInUser"];
        $customer = getCustomerRecord($user["id"]);
    ?>
    

    <form action="../../controllers/customerController.php?function=update"enctype="multipart/form-data" method="post" onsubmit="return validatePassword(event);">
    <div id="Contact">
               
               <div id="Zoom"><h2>Update your profile!</h2></div>


            
               <div id = "profilePicture"> 
                  <img id="viewImage" src="../../views/uploaded_images/profilepic.png" />
               </div>
               
               <input type="file" name="profilepic" id="profilepic">
                 
               <div id="Customer">
               <div id="form-control">
                   <label>Name</label>
                   
                   <input type="text" name="name" id="name" value="<?=$user["name"];?>" required><br>
               </div>
               <br>

               <div id="form-control">
                   <label>Password</label>
                   <input type="password" name="password" id="password"  readonly value="<?php echo $user['password'];?>"><br>
                   
               </div>

               

               <div id="form-control">
                   <label>Email Address</label>
                   
                   <input type="email" name="email" id="email" value="<?=$user["email"];?>" required><br>
               </div>
               <br>

           

               <div id="form-control">
                   <label for="">Phone Number</label>
                   
                   <input type="number" name="mobileNumber" id="mobileNumber" value="<?=$customer["mobileNumber"];?>" required><br>
               </div>

               <br>
               <div id="form-control">
                   <label>Address</label>
                   
                   <textarea name="address" id="address" cols="20" rows="5" required><?=$customer["address"];?></textarea><br>
               </div> 

              
             
               <div id="form-control" class="updateProfile">
                   
               <a href="updateProfile.php"><button>Update Profile</button></a>
                  
              </div>
              </div>
              <div>
                    <?php
                        if(isset($_SESSION["updateProfileMessage"])) {
                            echo $_SESSION["updateProfileMessage"];
                            unset($_SESSION["updateProfileMessage"]);
                        }
                    ?>
            </div>

</div>
    
    
    
   

    <div>
        <?php
            if(isset($_SESSION["updateProfileMessage"])) {
                echo $_SESSION["updateProfileMessage"];
                unset($_SESSION["updateProfileMessage"]);
            }
        ?>
    </div>
</section>
<script src="../js/jquery-3.5.1.min.js"></script>
    <script>
        function validatePassword(e) 
        {
            //to retreive the password field (3rd field) from the form
            let password = $(e.target["2"]).val();  
            if(!password.match(/(?=.{6,}$)(?=.*[A-Z])(?=.*\d).*/g)) {
                alert("Invalid password. Ensure that password is at least 6 characters long with at least one uppercase letter and one digit");
                return false;
            }
            return true;
        }

        $("#profilepic").change(function(){
            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/gif", "image/jpeg", "image/png"];

            if ($.inArray(fileType, validImageTypes) < 0) {
                // invalid file type code goes here.
                console.log("Error");
            }
            else 
            {
                readURL(this);
            }
            
        });

        function readURL(input) {
            if (input.files && input.files[0]) 
            {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


       
    </script>
    </section>
</body>
</html>