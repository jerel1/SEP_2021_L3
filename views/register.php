<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="SEP_2021_L3/views/css/Register.css">

    <?php
    require_once "./header.php";
    
?>
</head>


<body>
    <section >
        
        <div>
            I want to register as:
            <input type="radio" class="regType" name="regType" value="customer">Customer
            <input type="radio" class="regType" name="regType" value="merchant">Merchant
            <input type="radio" class="regType" name="regType" value="rider">Rider
        </div>

        <article class="customerRegSection" id="Customer" >
        <form action="../controllers/customerController.php?function=register" method="POST" onsubmit="return validatePassword(event);">
            <div id="Contact">
               
                <div id="Zoom"><h2>Register With Us!</h2></div>

                <!-- <div id="form-control">
                    <label>Upload Pic</label><br />
                    <div id="box"><p>Your Picture</p></div>
                    <br>
                    <div id="file">
                    <input  required type="file" break name="uprofpic" value="Upload Pic!" onclick="matchPassword()" >   
                    </div>            
                </div> -->
                
                <div id="form-control">
                    <label>Name</label>
                    
                    <input type="text" name="name" id="name"
                    title="Name must not contain number" required placeholder="Type full name here"  
                    >
                </div>

                <div id="form-control">
                    <label>Email Address</label>
                    
                    <input type="email" name="email" id="email" required placeholder="Type email address" title="Email must be valid">
                </div>

                <div id="form-control" >
                    <label for="">Password</label>
                    
                    <input type="password" name="password" id="password"  id="password"  required placeholder="[LowerCase,UpperCase,Number][8 Char]" >
                </div>

                <div id="form-control">
                    <label for="">Confirm Password</label>
                    
                    <input type="password" name="Confirmpassword" id="Confirmpassword" required placeholder="[LowerCase,UpperCase,Number][8 Char]">
                    
                </div>

                <div id="form-control">
                    <label for="">Phone Number</label>
                    
                    <input type="tel"name="mobileNumber" id="mobileNumber" required title="Enter your number" pattern="[0-9]{8}" >
                </div>


                <div id="form-control">
                    <label>Address</label>
                    
                    <textarea name="address" id="address" required cols="30" rows="3" maxlength="50" title="Please give ur Address" required></textarea>
                </div> 
                
                <br>

                <div id="form-control" class="register">
                    
                    <input type="submit" value="Register" onclick="DisplayInfo()"/>
                   
               </div>
               
               <div id="Email">
               <?php 

                $val=isset($_GET['message'])?$_GET['message']:"";
                if($val==1)
                {
                    echo"<div id='state'><b>Your Email already Exists!</b>";
                }


               ?>
                </div>   
                      
            </div>

    
        </form>

        </article>
        <article class="merchantRegSection">
            <form action="../controllers/merchantController.php?function=register" method="POST" onsubmit="return validatePassword(event);">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br>
                <label for="mobileNumer">Mobile Number:</label>
                <input type="number" name="mobileNumber" id="mobileNumber" required><br>
                <label for="company">Company:</label>
                <input type="text" name="company" id="company" required><br>
                <input type="submit" value="Register">
            </form> 
        </article>
        <article class="riderRegSection">
            <form action="../controllers/riderController.php?function=register" method="POST" onsubmit="return validatePassword(event);">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br>
                <label for="mobileNumber">Mobile Number:</label>
                <input type="number" name="mobileNumber" id="mobileNumber" required><br>
                <label for="vehicleNumber">Vehicle Number:</label>
                <input type="text" name="vehicleNumber" id="vehicleNumber" required><br>
                <label for="accountNumber">Account Number:</label>
                <input type="text" name="accountNumber" id="accountNumber" required><br>
                <input type="submit" value="Register">
            </form> 
        </article>   

        
        
        
      
    </section>

    


    <script src="./js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('input:radio[name="regType"]').change(function() {
                let regType = $(this).val();
                if (regType == 'customer') {
                    $(".customerRegSection").show();
                    $(".merchantRegSection").hide();
                    $(".riderRegSection").hide();
                } else if(regType=='merchant') {
                    $(".merchantRegSection").show();
                    $(".customerRegSection").hide();
                    $(".riderRegSection").hide();
                } else {
                    $(".merchantRegSection").hide();
                    $(".customerRegSection").hide();
                    $(".riderRegSection").show();
                }
            });
           
        })

        function validatePassword(e) 
        {
            //to retreive the password field (3rd field) from the form
            let password = $(e.target["2"]).val()+"";  
            if(!password.match(/(?=.{6,}$)(?=.*[A-Z])(?=.*\d).*/g)) {
                alert("Invalid password. Ensure that password is at least 6 characters long with at least one uppercase letter and one digit");
                return false;
            }
            return true;
        }
    </script>
    <div class="fixed">
        <footer id="socialmedia">
            <a href="https://twitter.com/?lang=en"><img src="uploaded_images/twitter.png" alt="Twitter" width="80px" height="80px"></a>
            <a href="https://www.facebook.com/fareastfloracomsg"><img src="uploaded_images/Facebook.png" alt="Facebook" width="80px" height="80px"></a>
            <a href="https://www.instagram.com/fareastfloracomsg/"><img src="uploaded_images/Instagram.png" alt="Instagram" width="95px" height="95px"></a>
        </footer>
    </div>
</body>
</html>