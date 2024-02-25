<?php
    $serverName = "localhost";
    $userName = "root";
    $password = " ";
    $database = "shop";

    $connection = mysqli_connect($serverName,$userName,$password,$database);

    if (!$connection){
        die ("Connection failed:" . mysqli_connect_error());
    }

    $queryString = "SELECT * FROM products";
    $result = mysqli_query($connection,$queryString);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>phan1_bai1</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="list.css">
        <script src="script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="top">
                <div class="left">
                    <div class="title">
                        Site Title
                    </div>
                    <div class="contact">
                        <div>
                            <a href="#">Categories</a> | 
                            <a href="#">Contact us</a> | 
                            <a href="#">Follow us</a>
                        </div>
                    </div>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="search">
                </div>
            </div>
            <div class="middle">
                <div class="left">
                    <div class="navigation-box">
                        <div class="navigation-title">
                            Category
                        </div>
                        <ul>
                            <li>Item 1</li>
                            <li>Item 2</li>
                            <li>Item 3</li>
                            <li>Item 4</li>
                            <li>Item 5</li>
                        </ul>
                    </div>
                    <div class="navigation-box">
                        <div class="navigation-title">
                            Top Products
                        </div>
                        <ul>
                            <li>Item 1</li>
                            <li>Item 2</li>
                            <li>Item 3</li>
                            <li>Item 4</li>
                            <li>Item 5</li>
                        </ul>
                    </div>
                </div>
                <div class="center">
                    <div class="content-title">
                        Top Products
                    </div>
                    <div class="item-container">
                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                                echo '<div class="item">';
                                echo '<img src="' . $row["image"] . '">';
                                echo '<div>' . $row["price"] . '</div>';
                                echo '<button onclick="Redirect(' . $row["id"] . ')">Buy now</button>';
                                echo "</div>";
                            }
                        mysqli_free_result($result);
                        mysqli_close($connection);
                        ?>
                    </div>
                </div>
                <div class="right">
                
                </div>
            </div>
            <div class="footer">
                <div class="information">
                    Footer information ...
                </div>
                <div class="references">
                    <a href="#">Link 1</a> | 
                    <span><a href="#">Link 2</a></span> | 
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
    </body>
</html>