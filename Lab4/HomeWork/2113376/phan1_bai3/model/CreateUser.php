<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    include_once 'DatabaseConnection.php';
    function AddUser($username,$hashedPassword){
        OpenConnection();
        global $connection;
        $insertQuery = "INSERT INTO user (username,password) VALUES ('$username','$hashedPassword');";
        if (mysqli_query($connection,$insertQuery)){
            $_SESSION['signUpSuccess'] = true;
            CloseConnection();
            return true;
        }else{
            $_SESSION['errorNumber'] = mysqli_errno($connection);
            $_SESSION['errorMessage'] = mysqli_error($connection);
            CloseConnection();
            return false;
        }
    }
?>