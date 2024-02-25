<?php
    $expression = $_GET["expression"];
    $result = eval('return '.$expression.';');
    echo "result = $result"
?>