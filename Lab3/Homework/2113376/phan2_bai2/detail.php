<?php
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'ON'){
        $url = "https://";
    }else{
        $url = "http://";
    }
    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];
    $urlParameters = parse_url($url);
    parse_str($urlParameters['query'],$parameters);

    $serverName = "localhost";
    $userName = "root";
    $password = " ";
    $database = "shop";

    $connection = mysqli_connect($serverName,$userName,$password,$database);

    if (!$connection){
        die ("Connection failed:" . mysqli_connect_error());
    }

    $queryString = "SELECT * FROM products WHERE id = '" . $parameters['id'] ."'";
    $result = mysqli_query($connection,$queryString);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>phan1_bai1</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="detail.css">
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
                    <div class="directory">Home > Main Category > <?php echo $row["name"] ?></div>
                    <div class="product-information">
                        <div class="product-images">
                            <div class="main-image">
                                <?php
                                    echo '<image src="' . $row["image"] . '">';
                                ?>
                            </div>
                        </div>
                        <div class="description">
                            <h2>
                                <?php echo $row["name"] ?>
                            </h2>
                            <h3>Summary:</h3>
                            <div class="information">
                                <?php echo $row["description"] ?> 
                            </div>
                            <div class="price">
                                price:
                            <?php echo $row["price"] ?> 
                            </div>
                            <div class="buy-button">
                                <button>Buy now</button>
                            </div>
                        </div>
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