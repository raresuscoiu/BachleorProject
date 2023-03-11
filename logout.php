<?php
    // session_start();
    // unset($_SESSION["id"]);
    // unset($_SESSION["name"]);
    // header("Location:index.php");

    session_start();
    session_unset();
    session_destroy();
    header("Location:index.php");
?> 