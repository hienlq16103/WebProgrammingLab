<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    require_once '../controller/remember.php';
    if (!isset($_SESSION['id'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="container">
            <div class="user-information">
                User: <?= $_SESSION['username']?>
            </div>
            <br>
            <a href="../controller/logout.php"><button type="button">Log out</button></a>
        </div>
    </body>
</html>