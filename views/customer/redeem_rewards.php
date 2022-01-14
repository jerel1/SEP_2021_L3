<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/delivery/views/css/Rewards.css">
    <?php
    require_once "../header.php";
    ?>

</head>

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
    <h1>My Rewards</h1>
    <p>
        You have <?=$customer["reward_points"]?> reward points now.
    </p>
    

   
   <div class="box">
    <?php
        if(count($rewardsRedeemed)==0) {
            echo "<h3>You have not redeemed any rewards.</h3>";
        }
        

        else {
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
            echo "<br><h3>You may proceed to redeem the rewards that are available</h3>";
    ?>

     </div>       
     <div class="box2">
                
            
            <?php
                foreach ($rewardsNotRedeemed as $reward) {
                    echo "<tr>";
                    
                    echo "<td>".$reward["description"]."</td><br><br>";
                    echo "Cash Value :$".$reward["cash_value"]."<br><br>";
                    echo "Redeem Points :".$reward["redeem_points"]."<br><br>";
                    echo "<td>
                        <form method='post' action='../../controllers/rewardRedemptionController.php?function=add'>
                            <input type='hidden' name='reward_id' value=".$reward["id"].">
                            <input type='hidden' name='redeem_points' value=".$reward["redeem_points"].">
                            <input type='submit' value='Redeem Reward'>
                        </form>
                        </td>";
                    echo "</tr>";
                }
          
        }   //end else
        if(isset($_SESSION["redeem_message"])) {
            echo $_SESSION["redeem_message"];
            unset($_SESSION["redeem_message"]);
        }
    ?>
    </div>

    <div class="box2">
       <p>Rewards Details</p>
    </div>

    <div class="box2">
       <p>Rewards</p>
    </div>
  
</section>
</section>

</body>
</html>