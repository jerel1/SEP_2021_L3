<?php
    require_once "./header.php";
?>
<body>
    <section>
        <h1>Register for an account</h1> 
        <div>
            I want to register as:
            <input type="radio" class="regType" name="regType" value="customer">Customer
            <input type="radio" class="regType" name="regType" value="merchant">Merchant
            <input type="radio" class="regType" name="regType" value="rider">Rider
        </div>
        <article class="customerRegSection">
            <form action="../controllers/customerController.php?function=register" method="POST" onsubmit="return validatePassword(event);">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br>
                <label for="mobileNumer">Mobile Number:</label>
                <input type="number" name="mobileNumber" id="mobileNumber" required><br>
                <label for="address">Address:</label>
                <textarea name="address" id="address" cols="20" rows="5" required></textarea><br>
                <input type="submit" value="Register">
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
</body>