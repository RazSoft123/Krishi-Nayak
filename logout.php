<?php
    if(session_status() === PHP_SESSION_ACTIVE){
        unset($_SESSION["farmerid"]);
        if(!isset($_SESSION["farmerid"])){
            echo "Log out successfully redirected to homescreen";
        }else {
            echo "Log out unsuccessful";
        }
    } else {
        session_start();
        unset($_SESSION["farmerid"]);
        if(!isset($_SESSION["farmerid"])){
            echo "Log out successfully redirected to homescreen";
        }else {
            echo "Log out unsuccessful";
        }
    }
    header("location: index.php");
?>