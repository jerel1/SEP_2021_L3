<?php
    require_once "./views/header.php";

    if(isset($_SESSION["loggedInUser"])) {
        $user = $_SESSION["loggedInUser"];
        $role = $user["role"];
        if($role=="admin") {
            header("Location: ./views/admin/index.php");
        } else if($role=="merchant") {
            header("Location: ./views/merchant/index.php");
        } else if($role=="rider") {
            header("Location: ./views/rider/index.php");
        }
    }
?>
<body>
    <!-- code snippet 4-13 -->
    <section class="restaurants">
    <!-- Replace the following h1 with code snippet 4-1 -->
    <h1>To be implemented later</h1>
    </section>
</body>