<section class="cart">
<!-- replace the following h1 with code snippet 4-4 -->
<h1>Update Profile page</h1>
    <?php 
        $user = $_SESSION["loggedInUser"];
        $customer = getCustomerRecord($user["id"]);
    ?>
    <form action="../../controllers/customerController.php?function=update" method="post" onsubmit="return validatePassword(event);">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?=$user["name"];?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?=$user["email"];?>" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="mobileNumer">Mobile Number:</label>
        <input type="number" name="mobileNumber" id="mobileNumber" value="<?=$customer["mobileNumber"];?>" required><br>
        <label for="address">Address:</label>
        <textarea name="address" id="address" cols="20" rows="5" required><?=$customer["address"];?></textarea><br>
        <input type="hidden" name="id" value="<?=$user["id"]?>">
        <input type="submit" value="Submit">
    </form>
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
</script>
</section>