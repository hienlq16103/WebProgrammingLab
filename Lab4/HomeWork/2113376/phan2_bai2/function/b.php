<?php
    include_once 'db.php';

    $isInputValid = true;   

    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    if ($name == ""){
        echo "Name field is empty\n";
        $isInputValid = false;
    }
    if (!(5 <= strlen($name) && strlen($name) <= 40)){
        echo "Name field must be 5-40 characters\n";
        $isInputValid = false;
    }
    if (strlen($description) > 5000){
        echo "Description must be shorter than 5000 characters\n";
        $isInputValid = false;
    }
    if ($price < 0 ){
        echo "Price can not be negative\n";
        $isInputValid = false;
    }
    if (strlen($image) > 255){
        echo "Image url must be shorter than 255 characters\n";
        $isInputValid = false;
    }
    if ($isInputValid == false){
        return;
    }

    $queryString = "INSERT INTO products 
    (name,description,price,image) 
    VALUES (\"$name\",\"$description\",\"$price\",\"$image\")";
    mysqli_query($connection,$queryString);
    header("location: ../index.php");
?>