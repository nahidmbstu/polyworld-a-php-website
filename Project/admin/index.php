<?php

session_start();
include'db_connect.php';

if(isset($_SESSION["username"]))
{

if (isset($_POST['logout'])) {
  session_destroy();
  header('location:../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>

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

body{

   background-image: url('images/travel.jpg');
   background-size: cover;
   opacity: 0.7;
}
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
  <li><a class="active" href="#">Home</a></li>
  <li><a href="add_menu.php">Edit Menu</a></li>
  <li><a href="product.php">Add Product</a></li>
    <li><a href="add_slider.php">Add Slider</a></li>
   <li><a href="view_all_product.php">View all Product</a></li>
   <li><a href="service.php">Edit Services</a></li>
   <li><a href="service_title.php">Edit Services title</a></li>
   <li><a href="cart_product.php">show carted product</a></li>
   
  
</ul>
  
<center>
  <h3><?php    echo "Welcome </br>".$_SESSION["username"]; ?></h3>
  <form method="POST" action="">
  
<input class="btn btn-denger" type="submit" name="logout" value="logout" style="color: red; width: 100px; font-size: 28px;">
  
</form>
</center>



</body>
</html>

<?php

}
else
{
     $message = "you are not registerd !!";
    echo "<script type='text/javascript'>alert('$message');</script>";

}

?>
