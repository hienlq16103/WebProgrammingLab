<html>
    <?php
    echo "Print odd number from 0 to 100 using for loop<br>";
    for ($index = 0; $index <= 100; $index ++){
        if ($index%2==0){
            continue;
        }
        echo "$index<br>";
    }
    echo "Print odd number from 0 to 100 using while loop<br>";
    $index = 0;
    while ($index<=100){
        if ($index % 2 !=0){
            echo "$index<br>";
        }
        $index++;
    }
    ?>
</html>