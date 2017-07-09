<?php

session_start();
include_once'db_connect.php';


?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$sql="SELECT * FROM service WHERE id = '".$q."'";
$result = mysqli_query($mysqli,$sql);

echo "<table>
<tr>

<th>id</th>
<th>Service name</th>
<th>Detail</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    
    echo "<td>" . $row['name'] . "</td>";
    echo "<td><img src='" . $row['image'] . "' height='100' width='50' ></td>";
    echo "<td>" . $row['detail'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($mysqli);
?>

</body>
</html>