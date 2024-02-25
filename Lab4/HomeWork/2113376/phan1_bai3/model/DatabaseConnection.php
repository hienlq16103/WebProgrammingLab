<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    
    $connection;
    
    function OpenConnection(){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $database = "lab4";

        global $connection;
        $connection = mysqli_connect($serverName,$userName,$password,$database);

        if (!$connection){
            die ("Connection failed:" . mysqli_connect_error());
        }
    }

    function CloseConnection(){
        global $connection;
        mysqli_close($connection);
    }
?>