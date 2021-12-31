<?php
    require_once "./views/header.php";

    // code snippet 1-3
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
    <section class="searchSection">
    <form method="post">
        <input type="text" name="search" id="search" size="40" placeholder="Search restaurants">
        <input type="submit" value="Search">
    </form>



</body>

