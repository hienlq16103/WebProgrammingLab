<html>
    <?php
    function foo($variable){
        $result = $variable % 5;
        switch ($result){
            case 0:
                echo "Hello<br>";
                break;
            case 1:
                echo "How are you?<br>";
                break;
            case 2:
                echo "I'm doing well, thank you";
                break;
            case 3:
                echo "See you later<br>";
                break;
            case 4:
                echo "Good-bye<br>";
                break;
        }
    }
    ?>
</html>