<?php
    require_once "../header.php";
?>

<body>
    <section>
    <!-- code snippet 4-18 -->
    <section>
    <?php
        require_once "../../controllers/rewardRedemptionController.php";
        require_once "../../controllers/customerController.php";
        
        $user = $_SESSION["loggedInUser"];
        $rewardsRedeemed = getAllRedeemedRewards($user["id"]);
        $rewardsNotRedeemed = getUnredeemedRewards($user["id"]);
        $customer = getCustomerRecord($user["id"]);
    ?>
    <h1>Rewards Page</h1>
    <p>
        You have <?=$customer["reward_points"]?> reward points now.
    </p>
    <?php
        if(count($rewardsRedeemed)==0) {
            echo "<h3>You have not redeemed any rewards.</h3>";
        } else {
            echo "<h3>You have redeemed the following rewards:</h3>";
            echo "<ul>";
            foreach ($rewardsRedeemed as $reward) {
                echo "<li>".$reward["description"]." (Redeemed on ".$reward["redeemed_on"].")</li>";
            }
            echo "</ul>";
        }

        if(count($rewardsNotRedeemed)==0) {
            echo "<h3>There are no available awards to be redeemed.</h3>";
        } else {
            echo "<h3>These are the available rewards which you can redeem:</h3>";
    ?>
            <table border="1">
                <tr>
                <th>Description</th>
                <th>Cash Value</th>
                <th>Redeem Points</th>
            </tr>
            <?php
                foreach ($rewardsNotRedeemed as $reward) {
                    echo "<tr>";
                    echo "<td>".$reward["description"]."</td>";
                    echo "<td>$".$reward["cash_value"]."</td>";
                    echo "<td>".$reward["redeem_points"]."</td>";
                    echo "<td>
                        <form method='post' action='../../controllers/rewardRedemptionController.php?function=add'>
                            <input type='hidden' name='reward_id' value=".$reward["id"].">
                            <input type='hidden' name='redeem_points' value=".$reward["redeem_points"].">
                            <input type='submit' value='Redeem Reward'>
                        </form>
                        </td>";
                    echo "</tr>";
                }
            echo "</table>"; 
        }   //end else
        if(isset($_SESSION["redeem_message"])) {
            echo $_SESSION["redeem_message"];
            unset($_SESSION["redeem_message"]);
        }
        ?>
</section>
    </section>
</body>