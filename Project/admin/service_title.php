<?php

$mysqli = new mysqli("localhost", "root", "", "travelagent");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if(isset($_POST['update']))
{
  $sql = "UPDATE service_title_dialog SET title='".$_POST['title']."',dialog='".$_POST['dialog']."'" ;

   if(mysqli_query($mysqli,$sql)==true){

  echo"edit succesfull";

}
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" type="text/css" href="style.css" media="all" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <!-- Latest compiled and minified JavaScript -->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

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
$sql="SELECT * FROM service_title_dialog";

if ($result =  $mysqli->query($sql))

{

if($result->num_rows > 0)
        {
            while($row = $result->fetch_array())


            {

?>





<form  method="post" action=""  >
<table width="30%" border="1" cellpadding="15"  class="table table-bordered table-hover">


<tr>
<td>
<input type="text" name="title" placeholder=" title" value="<?php echo $row['title'] ; ?>" style="width: 100%;" /></td>
</tr>

</tr>
<td><input type="text" name="dialog" placeholder="dialog" value="<?php echo $row['dialog'] ;?>" style="width: 100%;" /></td>
</tr>

<tr>
<td>
<button type="submit" name="update"> EDIT</button>
</td>
</tr>

</table>
</form>

<?php
                }

}

}

?>


</center>




</body>
</html>

