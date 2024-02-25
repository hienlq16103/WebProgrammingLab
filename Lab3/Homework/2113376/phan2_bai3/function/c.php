<?php
    include_once "db.php";

    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'ON'){
        $url = "https://";
    }else{
        $url = "http://";
    }
    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];
    $urlParameters = parse_url($url);
    parse_str($urlParameters['query'],$parameters);

    if (!empty($_POST)){
        $isInputValid = true;
        $id = $parameters["id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $image = $_POST["image"];
        if ($name == ""){
            echo "Name field is empty<br>";
            $isInputValid = false;
        }
        if (!(5 <= strlen($name) && strlen($name) <= 40)){
            echo "Name field must be 5-40 characters<br>";
            $isInputValid = false;
        }
        if (strlen($description) > 5000){
            echo "Description must be shorter than 5000 characters<br>";
            $isInputValid = false;
        }
        if ($price < 0 ){
            echo "Price can not be negative<br>";
            $isInputValid = false;
        }
        if (strlen($image) > 255){
            echo "Image url must be shorter than 255 characters<br>";
            $isInputValid = false;
        }
        if ($isInputValid == false){
            return;
        }
        $queryString = 'UPDATE products SET name="' . $name . '", description="' . $description . '",price="' . $price . '", image="' . $image . '" WHERE id="' . $id . '"';
        mysqli_query($connection,$queryString);

        header("location: ../index.php");
    
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <form method="post">
        <label>
            name: <input type="text" name="name">
        </label>
        <br>
        <label>
            description: <textarea name="description"></textarea>
        </label>
        <br>
        <label>
            Price: <input type="number" name="price">
        </label>
        <br>
        <label>
            Image: <input type="text" name="image">
        </label>
        <br>
        <button type="submit">Edit</button>
        </form>
    </body>
</html>
