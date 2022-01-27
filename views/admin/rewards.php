<?php
    require_once "../header.php";
?>

<body>
    <section>
    <h1>Rewards Page</h1>
    <h1>Reward List</h1>
    <table border="1">
        <tr>
            <th>Description</th>
            <th>Cash Value</th>
            <th>Redeem Points</th>
            <th>Availability</th>
        </tr>

        <tr>
            <td>$5 voucher to be grabbed!</td>
            <td>$5</td>
            <td>10</td>
            <td>48</td>
            <td>
                <form method="post">
                    <input type="submit" name="edit1" id="edit" value="Edit">
                </form>
            </td>
            <td>
                <form action="../../controllers/rewardController.php?function=remove&id=1" method="POST" onsubmit="return confirmDelete();">
                    <input type="submit" name="delete" value="Delete">
                </form>
            </td>
            <td>
                <a href="rewardRedemption.php?reward_id=1">View Redemption</a>
            </td>
        </tr>

        <tr>
            <td>$10 voucher to be grabbed!</td>
            <td>$10</td>
            <td>20</td>
            <td>28</td>
            <td>
                <form method="post">
                    <input type="submit" name="edit2" id="edit" value="Edit">
                </form>
            </td>
            <td>
                <form action="../../controllers/rewardController.php?function=remove&id=1" method="POST" onsubmit="return confirmDelete();">
                    <input type="submit" name="delete" value="Delete">
                </form>
            </td>
            <td>
                <a href="rewardRedemption.php?reward_id=2">View Redemption</a>
            </td>
        </tr>

        <tr>
            <td>$15 voucher to be grabbed!</td>
            <td>$15</td>
            <td>30</td>
            <td>10</td>
            <td>
                <form method="post">
                    <input type="submit" name="edit3" id="edit" value="Edit">
                </form>
            </td>
            <td>
                <form action="../../controllers/rewardController.php?function=remove&id=1" method="POST" onsubmit="return confirmDelete();">
                    <input type="submit" name="delete" value="Delete">
                </form>
            </td>
            <td>
                <a href="rewardRedemption.php?reward_id=3">View Redemption</a>
            </td>
        </tr>

        <tr>
            <td>$20 voucher to be grabbed!</td>
            <td>$20</td>
            <td>40</td>
            <td>5</td>
            <td>
                <form method="post">
                    <input type="submit" name="edit3" id="edit" value="Edit">
                </form>
            </td>
            <td>
                <form action="../../controllers/rewardController.php?function=remove&id=1" method="POST" onsubmit="return confirmDelete();">
                    <input type="submit" name="delete" value="Delete">
                </form>
            </td>
            <td>
                <a href="rewardRedemption.php?reward_id=3">View Redemption</a>
            </td>
        </tr>

    </table>

    <h1>Add a new reward</h1>
    <form action="../../controllers/rewardController.php?function=add" method="post">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" size="30" required=""><br>
                <label for="cash_value">Cash Value ($)</label>
                <input type="number" name="cash_value" id="cash_value" min="0" required=""><br>
                <label for="redeem_points">Amount of points needed to redeem this reward</label>
                <input type="number" name="redeem_points" id="redeem_points" min="1" required=""><br>
                <label for="availability">Number of available redemptions possible</label>
                <input type="number" name="availability" id="availability" min="1" required=""><br>
                <input type="submit" value="Add">
            </form>
    </section>
</body>