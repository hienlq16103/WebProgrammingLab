<?php
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birthday = $_POST["birthday"];
    $isInformationValid = true;

    if ($firstName == ""){
        echo "First name is empty<br>";
        $isInformationValid = false;
    }
    if (!(2 <= strlen($firstName) && strlen($firstName) <= 30)){
        echo "First name must be 2-30 characters<br>";
        $isInformationValid = false;
    }
    if ($lastName == ""){
        echo "Last name is empty<br>";
        $isInformationValid = false;
    }
    if (!(2 <= strlen($lastName) && strlen($lastName) <= 30)){
        echo "Last name must be 2-30 characters<br>";
        $isInformationValid = false;
    }
    if ($email == ""){
        echo "Email is empty<br>";
        $isInformationValid = false;
    }
    if (filter_var($email,FILTER_VALIDATE_EMAIL) == false){
        echo "Invalid email address<br>";
        $isInformationValid = false;
    }
    if ($password == ""){
        echo "Password is empty<br>";
        $isInformationValid = false;
    }
    if (!(2 <= strlen($password) && strlen($password) <= 30)){
        echo "Password must be 2-30 characters<br>";
        $isInformationValid = false;
    }
    if ($birthday == ""){
        echo "Birthday is empty<br>";
        $isInformationValid = false;
    }
    if (isset($_POST["gender"]) == false){
        echo "Gender is not selected<br>";
        $isInformationValid = false;
    }
    
    
    
    if ($isInformationValid == false){
        return;
    }
    echo "Complete!<br>";
?>