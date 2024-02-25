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

    $queryString = "DELETE FROM products WHERE id='" . $parameters["id"] ."'";
    mysqli_query($connection,$queryString);
    include_once "a.php";
?>