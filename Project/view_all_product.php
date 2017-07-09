<!DOCTYPE html>
<html>

<body>
<center>


<?php


include_once 'db_connect.php';


$sql_4 = "SELECT * FROM product";

if($result =  $MySQLiconn->query($sql_4))


    {
        if($result->num_rows > 0)
        {

         echo "<table table border='1' cellpadding='10'>";
            echo "<tr>";
                echo "<th>S/N:</th>";
                echo "<th>Name</th>";
                echo "<th>Description</th>";
                echo "<th>CategoryID</th>";
                echo "<th>cart</th>";
                echo "<th>Action</th>";
                echo "<th>Action</th>";

            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                  echo "<td>" .$row['id']. "</td>";
                
                echo "<td>" .$row['Name']. "</td>";
                echo '<td>' .$row['Description']. '</td>';
                echo "<td>" .$row['CategoryID']. "</td>";
                echo "<td>" .$row['cart']. "</td>";
                echo '<td><a href="edit.php?CategoryID=' . $row['CategoryID'] . '">Edit</a></td>';

                echo '<td><a href="delete.php?CategoryID=' . $row['CategoryID'] . '">Delete</a></td>';

            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        $result->free();
    } else {
        echo "No records matching your query were found.";
    }

    }

        else{

               echo "ERROR: Could not able to execute $sql. " . $mysqli->error;


    }

?>

<a href="index.php">Back to Dashboard</a>
</center>

</body>
</html>