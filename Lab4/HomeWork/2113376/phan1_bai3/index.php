<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    require_once 'controller/remember.php';
    if (IsUserRemembered()){
        header("location: view/info.php");
    }
    header("location: view/login.php");
?>