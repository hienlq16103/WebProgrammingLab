<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <style>
            table{
                background-color: yellow;
                margin: 0 auto;
            }
            table,td{
                border: 1px solid black;
                border-collapse: collapse;
            }
            td{
                width: 30px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
        $incrementVariable = 1;
        echo "<table>";
        for ($i=1;$i<=7;$i++){
            echo "<tr>";
            for ($j=1;$j<=7;$j++){
                echo "<td>".($i*$j)."</td>";
            }
            $incrementVariable++;
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>