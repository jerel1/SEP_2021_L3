<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align:center;
        }
       
        .box
{
    border:4px solid black;
    background-color: rgb(158, 195, 231);
    width:1050px;
    margin:0 auto;
    text-align:center;
    font-size:20px;
    padding:30px;
    margin-top:30px;
    margin-bottom:30px;
 
}
 
.padding {
    background-color: #f1f1f1;
    margin: 10px;
    padding: 20px;
    border:9px solid darkcyan;
    border-radius:5px;
   
  }
 
img {
    width: 250px;
    border:15px solid black;
   
   
  }
 
 
    </style>
    <?php
    require_once "../header.php";
    require_once "../../controllers/ordersController.php";
 
    $order_history = getAllManageOrders();
    $order_exist = false;
?>
</head>
<body>
<section class="box">
    <h1>Order History</h1>
        <?php
       
        //Display of Orders not yet done
            foreach($order_history as $single_order)
            {
                if($single_order["customer_id"] == $user['id'])
                {
                    $order_exist = true;
                }
            }
 
            if(!$order_exist)
            {
                echo "<h2>No Orders Yet</h2>";
                echo "<p>You have no orders in your history.</p>";
            }
            else
            {
                foreach($order_history as $single_order)
                {
                    if($single_order["customer_id"] == $user['id'])
                    {
                        $order_item = returnSingleOrderItem($single_order["id"]);
                        ?>
                    <div class="padding">
                            <?php
                            echo"Delivery Date:<br>";
                            print_r($single_order["delivery_date"]);
                            echo"<br><br>";
                            // print_r($order_item["delivery_time"]);
                            // echo"<br>";
                            echo"Name:<br>";
                            print_r($order_item["name"]);
                            echo"<br><br>";

                            echo"Amount:<br> $";
                            print_r($order_item["amount"]);
                            echo"<br><br>";

                            echo"Quantity:<br>";
                            print_r($order_item["quantity"]);

                            ?>
                    </div>
 
                        <h2><?php ?></h2>
                        <?php
                    }
 
                }
            }
 
           
        ?>
 
    </section>
</body>
 
</html>