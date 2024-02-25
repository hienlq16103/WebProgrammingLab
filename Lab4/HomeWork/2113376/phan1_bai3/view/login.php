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
        <title>Login</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="left">
                <h3>Login to your account</h3>
                <form action="../controller/loginController.php" method="post" onsubmit="return ValidateLoginInput()">
                    <div class="username">
                        Username <br>
                        <input type="text" name="username" placeholder="Enter username">
                    </div>
                    <div class="password">
                        Passowrd <br>
                        <input type="password" name="password" placeholder="Enter password">
                    </div>
                    <label>
                        <input type="checkbox" name="rememberMe" value="checked"> 
                        Remember me
                    </label>
                    <button type="submit">Login</button>
                </form>
                <div class="signup">
                    Don't have a account yet? <a href="signup.php">Sign up</a>
                </div>
            </div>
            <div class="right">
                <img src="images/FileSharingIcon.png" alt="none">
            </div>
        </div>
        <?php if (isset($_SESSION['signUpSuccess'])){ ?>
            <script>
                window.alert("Successfully created an account\nPlease login to continue");
            </script>
            <?php
                unset($_SESSION['signUpSuccess']);
            ?>
        <?php } ?>
        <?php if (isset($_SESSION['loginFailed'])){ ?>
            <script>
                window.alert("Incorrect username or password");
            </script>
            <?php
                unset($_SESSION['loginFailed']);
            ?>
        <?php } ?>
        <script src="../controller/javascripts/validateLogin.js"></script>
    </body>
</html>