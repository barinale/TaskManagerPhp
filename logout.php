<?php
    session_start();
    if(isset($_SESSION)){
        $_SESSION = array();
        session_destroy();
        header("location:./index.php");
        exit();
    }
    