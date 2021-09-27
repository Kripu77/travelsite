<?php

    $fav = $_POST["favourite"];

    session_start();

    if(isset($_SESSION["user"])){
        $_SESSION["Favourite"] = $fav;
    }

?>