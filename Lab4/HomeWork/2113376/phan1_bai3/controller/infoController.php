<?php
    if (isset($_SESSION) == false){
        session_start();
    }

    include_once "../model/GetUsernameWithId.php";
    function GetUsername(){
        return GetUsernameWithId($_SESSION['id']);
    }
?>