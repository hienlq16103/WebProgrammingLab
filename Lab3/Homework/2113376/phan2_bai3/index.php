<?php
    //include_once 'function/a.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <button type="button" onclick="DisplayForm()">Create new product</button>
            <form name="add-product" method="post" action="function/b.php">
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
                <button type="submit">Add</button>
                <button type="button" onclick="HideForm()">Close form</button>
            </form>
            <div class="display"></div>
        </div>
        <script src="script.js"></script>
    </body>
</html>