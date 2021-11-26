<?php
    session_start();

    // code snippet 4-8
    
    session_destroy();
    header("Location: ../index.php");
?>