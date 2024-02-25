<?php
    if (isset($_SESSION) == false){
        session_start();
    }

    include_once __DIR__ . "/../model/DatabaseConnection.php";

    function GenerateToken(){
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));
        return [$selector,$validator,$selector . ':' . $validator];
    }
    function SplitToken($token){
        $pair = explode(':',$token);
        if (!($pair && count($pair) == 2)){
            return null;
        }
        return $pair;
    }
    function InsertUserToken($user_id, $selector, $hashed_validator, $expiry){
        OpenConnection();
        global $connection;
        $insertString = "INSERT INTO user_tokens(user_id, selector, hashed_validator, expiry)
        VALUES($user_id,'$selector','$hashed_validator','$expiry')";
        if (mysqli_query($connection,$insertString)){
            CloseConnection();
            return true;
        }else{
            CloseConnection();
            return false;
        }
    }
    function DeleteUserToken($user_id){
        OpenConnection();
        global $connection;
        $queryString = "DELETE FROM user_tokens WHERE user_id = $user_id";
        if (mysqli_query($connection,$queryString)){
            CloseConnection();
            return true;
        }else{
            CloseConnection();
            return false;
        }
    }
    function FindUserTokenBySelector($selector){
        OpenConnection();
        global $connection;
        $queryString = "SELECT token_id, selector, hashed_validator, user_id, expiry
        FROM user_tokens
        WHERE selector = '$selector' AND expiry >= now()
        LIMIT 1";
        $result = mysqli_query($connection,$queryString);
        return mysqli_fetch_assoc($result);
    }
    function FindUserByToken($token){
        OpenConnection();
        global $connection;
        $tokens = SplitToken($token);
        if (!$tokens){
            return null;
        }
        $queryString = "SELECT user.id, username
        FROM user INNER JOIN user_tokens ON user_id = user.id
        WHERE selector = '$tokens[0]' AND expiry > now()
        LIMIT 1";
        $result = mysqli_query($connection,$queryString);
        return mysqli_fetch_assoc($result);
    }
    function IsTokenValid($token){
        [$selector,$validator] = SplitToken($token);
        $tokens = FindUserTokenBySelector($selector);
        if (!$tokens){
            return false;
        }
        return password_verify($validator,$tokens['hashed_validator']);
    }
    function RememberUser($user_id,$day = 30){
        [$selector,$validator,$token] = GenerateToken();
        DeleteUserToken($user_id);
        $expiredSeconds = time() + 60*60*24*$day;
        $hashed_validator = password_hash($validator,PASSWORD_DEFAULT);
        $expiry = date('Y-m-d H:i:s',$expiredSeconds);
        if (InsertUserToken($user_id,$selector,$hashed_validator,$expiry)){
            setcookie('remember_me',$token,$expiredSeconds,"/");
        }
    }
    function IsUserRemembered(){
        if (isset($_COOKIE['remember_me']) == false){
            return false;
        }
        $token = $_COOKIE['remember_me'];
        if (IsTokenValid($token) == false){
            return false;
        }
        $user = FindUserByToken($token);
        if (!$user){
            return false;
        }
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    }
?>