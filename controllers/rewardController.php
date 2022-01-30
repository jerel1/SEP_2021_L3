<?php
    require_once __DIR__."/../connection.php";


    //code snippet 4-14
    function updateRewardAvailability($id) {
        global $conn;
        mysqli_query($conn, "UPDATE rewards SET availability=availability-1 WHERE id=$id");
    }


    function addReward(){
        global $conn;
        session_start();
        $reward_id = $_POST["reward_id"];
        $reward = $_POST["reward"];
        $description = $_POST["description"];
        $cash_value = $_POST["cash_value"];
        $redeem_points = $_POST["redeem_points"];
        $availability = $_POST["availability"];
        mysqli_query($conn,"INSERT into reward(reward, description, cash_value, redeem_points, availability) values ($reward,".$description. $cash_value.$redeem_points.$availability.")");
        updateRewardAvailability($reward_id); 
        $_SESSION["rewards_message"] = "Rewards have been successfully updated!";
        header("Location: ../views/admin/rewards.php");
    }

    function remove()
    {
        global $conn;
        session_start();
        $reward_id = $_POST["reward_id"];
        mysqli_query($conn,"DELETE FROM reward WHERE record_id=$reward_id");
        updateRewardAvailability($reward_id); 
        $_SESSION["rewards_message"] = "Rewards have been successfully deleted!";
        header("Location: ../views/admin/rewards.php");
    }

?>