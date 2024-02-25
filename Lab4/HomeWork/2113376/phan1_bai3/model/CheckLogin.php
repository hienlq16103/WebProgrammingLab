<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    include_once "DatabaseConnection.php";
    function ValidateLogin($username,$password){
        OpenConnection();
        global $connection;
        $queryString = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($connection,$queryString);
        if (mysqli_num_rows($result) != 1){
            CloseConnection();
            return false;
        }
        $userData = mysqli_fetch_assoc($result);
        if (password_verify($password,$userData['password']) == false){
            CloseConnection();
            return false;
        }
        $_SESSION['id'] = $userData['id'];
        $_SESSION['username'] = $userData['username'];
        CloseConnection();
        return true;
    }
?>