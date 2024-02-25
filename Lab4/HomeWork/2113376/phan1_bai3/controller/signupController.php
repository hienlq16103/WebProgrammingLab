<?php
    if (isset($_SESSION) == false){
        session_start();
    }
?>
<!DOCTYPE html>
<?php 
    include_once "../model/CreateUser.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
    if (AddUser($username,$hashedPassword)){ 
        header("location: ../view/login.php");
    } else {
        header("location: ../view/signup.php");
    } 
?>

