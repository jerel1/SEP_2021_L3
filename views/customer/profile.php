<?php
    require_once "../header.php";
?>
<body>
    <section>
    <!-- Replace the following h1 with code snippet 4-10 -->
    <h1>Profile page</h1>
    <?php 
        $user = $_SESSION["loggedInUser"];
        $customer = getCustomerRecord($user["id"]);
    ?>
    Name: <?=$user["name"];?><br>
    Email: <?=$user["email"];?><br>
    Mobile Number: <?=$customer["mobileNumber"];?><br>
    Address: <?=$customer["address"];?><br>
    Reward Points: <?=$customer["reward_points"];?><br>
    <a href="updateProfile.php"><button>Update Profile</button></a>
    </section>
</body>