<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/SEP_2021_L3/views/css/Register.css">

    <?php
    require_once "./header.php";
?>
</head>
<body>

    <div id="Login">
    <h2>Login to you Account</h2>
    </div>

    <section id="Customer">
        <form action="../controllers/loginController.php" method="POST">
        <div id="Contact">
        <div id="form-control">
                    <label>Email</label>
                    
                    <input type="email" name="email" id="email" required placeholder="Type email address" title="Email must be valid" onclick="DisplayInfo()" >
        </div>
        <br>
        <br>

        <div id="form-control" >
                    <label for="">Password</label>
                    
                    <input type="password" name="password" id="password"  id="password"  required placeholder="[LowerCase,UpperCase,Number][8 Char]" >
        </div>
        </div>

        <div id="form-control" class="Logon">
                    
            <input type="submit" value="Login"/><br><br>
            <?php
            if(isset($_SESSION["loginErrorMessage"])) {
                echo $_SESSION["loginErrorMessage"];
                unset($_SESSION["loginErrorMessage"]);
            }
        ?> 
                   
        </div>
        
        </form>
        <!-- Code snippet 1-1 -->
               
    </section>    
</body>  

</html>
