<?php
    require_once "./header.php";
?>
<body>
    <section>
        <form action="../controllers/loginController.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" size="30" required><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br>
                <input type="submit" value="Login">
        </form>
        <!-- Code snippet 1-1 -->
        <?php
            if(isset($_SESSION["loginErrorMessage"])) {
                echo $_SESSION["loginErrorMessage"];
                unset($_SESSION["loginErrorMessage"]);
            }
        ?>        
    </section>    
</body>  
