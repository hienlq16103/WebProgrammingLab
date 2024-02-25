<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    include_once 'DatabaseConnection.php';
    
    function GetUsernameWithId($id){
        OpenConnection();
        global $connection;
        $queryString = "SELECT * FROM user WHERE id = $id";
        $result = mysqli_query($connection,$queryString);
        if (mysqli_num_rows($result) != 1){
            $_SESSION['getUserFailed'] = "User no longer exist";
            CloseConnection();
            return "";
        }
        $userData = mysqli_fetch_assoc($result);
        return $userData['username'];
        CloseConnection();
    }
?>