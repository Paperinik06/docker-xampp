<?php
require_once '../includes/db.php';

$table = 'users';

$query = "SELECT * FROM $table";

$result = $conn->query($query);


if ($result->num_rows > 0)
{
    echo "<table>";

    while($column = $result->fetch_field())
    {
        
        
        echo "<th> $column->name </th>";
        
    }

    while($row = $result->fetch_assoc())
    {
        echo"<tr>";

       
        
        foreach ($row as $key => $value)
        {
            echo "<td> $value </td>";
        }
        echo "</tr>";
    }

    echo"</table>";
}