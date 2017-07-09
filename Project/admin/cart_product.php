<?php
session_start();
include_once'db_connect.php';

$_SESSION['message'] ='';

if(isset($_POST['remove']))
{
  $id=$_POST['id'];
  $SQL = $mysqli->query("DELETE FROM cart WHERE product_id='$id'");
    
    if($SQL==true)
    {

        $message = "cart remove successfull!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
	 header('cart_product.php');    
    }
    else
    {

        $message = "remove unsuccessfull!!";
       echo "<script type='text/javascript'>alert('$message');</script>";
	   header('cart_product.php');
	  
        
    }

    $SQL = $mysqli->query("UPDATE product SET status='0' WHERE id='$id'");
     
     
    
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

<div class="jumbotron">
  
  <p class="text-success" style="text-align: center;" >All carted product</p>
</div>


<table class="table table-bordered table-hover">

<th class="success" style=" width:20%; text-align: center;">Product ID</th>
<th class="success" style=" width:60%; text-align: center;">Product image</th>
<th class="success" style="width:20%; text-align: center;">action</th>


</table>
<?php 

$sql="SELECT * FROM cart ";

$result=$mysqli->query($sql);

while($row=$result->fetch_array())

{

?>


<table class="table table-bordered table-hover">
  


  
  <tr>
    <td style="width:20%; text-align: center;"><?php echo $row['product_id']; ?></td>

    <td style="width:60%; text-align: center;"><img src="<?php echo $row['image'];?>" style="height: 100px; width: 100px;">  
    </td>
   
    <td style="width:20%; text-align: center;">
    <form action="" method="POST">
     
    <input type="hidden" name="id" value="<?php echo $row['product_id'];?>"> 
    <input type="submit" name="remove" class="btn btn-success" value="Remove from cart">
    </form>
    </td>
  </tr>


</table>


<?php 
}
echo $_SESSION['message'];
?>


</body>
</html>