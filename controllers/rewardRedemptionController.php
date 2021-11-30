<?php
    require_once __DIR__."/../connection.php";

    // code snippet 4-16
    require_once "customerController.php";
    require_once "rewardController.php";
    
        
    //to handle form submissions
    if(isset($_GET["function"])) {
        $function = $_GET["function"];
        switch($function) {
            case "add":
                addRewardRedemption();
                break;
        }
    }
    
    function addRewardRedemption() {
        global $conn;
        session_start();
        //check to ensure there was a post data
        if(!empty($_POST)) {
            $reward_id = $_POST["reward_id"];
            $redeem_points = $_POST["redeem_points"];
    
            $user = $_SESSION["loggedInUser"];
            $customer = getCustomerRecord($user["id"]);
    
            if($customer["reward_points"]<$redeem_points) {
                $_SESSION["redeem_message"] = "Sorry! You do not have enough points to redeem the reward.";
            } else {
                $reward_points = $customer["reward_points"]-$redeem_points;
    
                mysqli_query($conn,"INSERT into reward_redemption(reward_id,user_id) values ($reward_id,".$user["id"].")");
    
                updateRewardPoints($user["id"],$reward_points);  //inside customer controller
                
                updateRewardAvailability($reward_id); //inside reward controller
                
                $_SESSION["redeem_message"] = "You have successfully redeemed the reward!";
            }
            header("Location: ../views/customer/redeem_rewards.php");
        } 
    }
    // code snippet 4-17
    function getAllRedeemedRewards($id) {
        global $conn;
        $query = mysqli_query($conn,"SELECT t1.id,t1.description,t2.redeemed_on FROM rewards t1 INNER JOIN reward_redemption t2 ON t1.id = t2.reward_id where t2.user_id=$id and t2.has_used=0");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }
    
    function getUnredeemedRewards($id) {
        global $conn;
        $query = mysqli_query($conn,"SELECT * FROM rewards WHERE availability>0 and id NOT IN (SELECT reward_id FROM reward_redemption where user_id=$id)");
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }
?>