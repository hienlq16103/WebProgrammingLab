<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    include_once "remember.php";
    DeleteUserToken($_SESSION['id']);
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    if (isset($_COOKIE['remember_me'])){
        unset($_COOKIE['remember_me']);
        setcookie('remember_user',null, -1,"/");
    }
    session_destroy();
    header("location: ../view/login.php");
?>