<?php
    if (isset($_SESSION) == false){
        session_start();
    }
    require_once '../controller/remember.php';
    if (IsUserRemembered()){
        header("location: info.php");
    }
    if (isset($_SESSION['id'])){
        header("location: info.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sign up</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="container">
            <div class="left">
                <h3>Create an account</h3>
                <form action="../controller/signupController.php" method="post" onsubmit="return ValidateSignupInput()">
                    <div class="username">
                        Username <br>
                        <input type="text" name="username" placeholder="Enter username">
                    </div>
                    <div class="password">
                        Passowrd <br>
                        <input type="password" name="password" placeholder="Enter password">
                    </div>
                    <div class="password">
                        Repeat password <br>
                        <input type="password" name="repeatedPassword" placeholder="Repeat password">
                    </div>
                    <button type="submit">Sign up</button>
                </form>
                <div class="login">
                    Already have an account? <a href="login.php">Login</a>
                </div>
            </div>
            <div class="right">
                <img src="images/FileSharingIcon.png" alt="none">
            </div>
        </div>
        <?php if (isset($_SESSION['errorNumber'])){?>
            <script>
                window.alert("Error <?= $_SESSION['errorNumber']?>: <?= $_SESSION['errorMessage']?>");
            </script>
            <?php
                unset($_SESSION['errorNumber']);
                unset($_SESSION['errorMessage']);
            ?>
        <?php } ?>
        <script src="../controller/javascripts/validateSignup.js"></script>
    </body>
</html>