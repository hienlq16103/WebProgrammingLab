<?php
    include_once "db.php";

    function DisplayData(){
        global $connection;

        $queryString = "SELECT * FROM products";
        $result = mysqli_query($connection,$queryString);
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td><button type="button" onclick="EditData(' . $row['id'] .')">Edit</button></td>';
            echo '<td><button type="button" class="delete" onclick="Delete(' . $row['id'] .')">Delete</button></td>';
            echo "</tr>";
        }
        echo "</table>";
    }
    DisplayData();
?>