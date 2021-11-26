<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery Service!</title>
    <link rel="stylesheet" href="/delivery_jerel/views/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/delivery_jerel">Home</a></li>
                <?php
                    session_start();
                    if(isset($_SESSION['loggedInUser'])) {
                        $user = $_SESSION['loggedInUser'];
                        $name = $user["name"];
                        echo "<li>Welcome <b>".$name."! </b></li>";
                        $role = $user["role"];
                        switch($role) {
                            case "admin":
                                echo "<li><a href='/delivery_jerel/views/admin/all_orders.php'>See all orders</a></li>";
                                echo "<li><a href='/delivery_jerel/views/admin/rewards.php'>Rewards</a></li>";
                                break;
                            case "customer":
                                echo "<li><a href='/delivery_jerel/views/customer/profile.php'>Profile</a></li>";
                                echo "<li><a href='/delivery_jerel/views/customer/cart.php'>Cart</a></li>";
                                echo "<li><a href='/delivery_jerel/views/customer/redeem_rewards.php'>Redeem Rewards</a></li>";
                                echo "<li><a href='/delivery_jerel/views/customer/past_orders.php'>See past orders</a></li>";
                                break;
                            case "rider":
                                echo "<li><a href='/delivery_jerel/views/rider/profile.php'>Profile</a></li>";
                                echo "<li><a href='/delivery_jerel/views/rider/available_jobs.php'>View Available Jobs</a></li>";
                                echo "<li><a href='/delivery_jerel/views/rider/completed_jobs.php'>View Completed Jobs</a></li>";
                                break;
                        }
                        echo "<li><a href='/delivery_jerel/views/logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href='/delivery_jerel/views/login.php'>Login</a></li>";
                        echo "<li><a href='/delivery_jerel/views/register.php'>Register</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>
</body>