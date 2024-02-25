<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    include_once '../model/CheckLogin.php';
    include_once 'remember.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['rememberMe']);
    if (ValidateLogin($username,$password)){
        if ($remember){
            RememberUser($_SESSION['id']);
        }
        header("location: ../view/info.php");
    }else{
        $_SESSION['loginFailed'] = true;
        header("location: ../view/login.php");
    }
?> 

