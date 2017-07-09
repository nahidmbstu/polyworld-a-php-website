<?php
include_once'db_connect.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
</style>
</head>

<body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="add_menu.php">Edit Menu</a></li>
  <li><a href="product.php">Add Product</a></li>
    <li><a href="add_slider.php">Add Slider</a></li>
   <li><a href="view_all_product.php">View all Product</a></li>
   <li><a href="service.php">Edit Services</a></li>
   <li><a href="service_title.php">Edit Services title</a></li>
   <li><a href="cart_product.php">show carted product</a></li>

  
</ul>

<center>



    
<?php


$sql = "SELECT * FROM product";

if($result =  $mysqli->query($sql))


    {
        if($result->num_rows > 0)
        {

         echo "<table table border='1' cellpadding='10' >";
            echo "<tr>";
                echo "<th>S/N:</th>";
                echo "<th>Name</th>";
                echo "<th>image</th>";

                echo "<th>experience</th>";
                echo "<th>Description</th>";
                echo "<th>CategoryID</th>";
                 echo "<th>Sub_CategoryID</th>";
                
                echo "<th>Action</th>";
                echo "<th>Action</th>";

            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                  echo "<td>" .$row['id']. "</td>";
                
                echo "<td>" .$row['name']. "</td>";
                echo "<td width=20%><img src='".$row['image']. "'height='200' width='200'></td>";

                 echo '<td>' .$row['experience']. '</td>';
                echo '<td>' .$row['description']. '</td>';
                echo "<td>" .$row['category_id']. "</td>";
                echo "<td>" .$row['sub_category_id']. "</td>";
                
                echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';

                echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

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


</center>

</body>
</html>