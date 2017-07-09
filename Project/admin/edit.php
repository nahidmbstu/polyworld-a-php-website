<?php

$mysqli = new mysqli("localhost", "root", "", "travelagent");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if(isset($_GET['id']))
{
	$SQL = $mysqli->query("SELECT * FROM product WHERE id=".$_GET['id']);
	$getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
	$SQL = $mysqli->query("UPDATE product SET name='".$_POST['name']."',image= '".$_POST['image']."', experience= '".$_POST['experience']."',description='".$_POST['description']."',category_id='".$_POST['category_id']."',sub_category_id='".$_POST['sub_category_id']."',status='".$_POST['status']."' WHERE id=".$_GET['id']);
	
	echo"edit succesfull";
     header('location:view_all_product.php');


}



?>

<html>

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
<body>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="add_menu.php">Add New Menu</a></li>
  <li><a href="product.php">Add Product</a></li>
    <li><a href="add_slider.php">Add Slider</a></li>
   <li><a href="view_all_product.php">View all Product</a></li>
   <li><a href="service.php">Edit Services</a></li>
   <li><a href="service_title.php">Edit Services title</a></li>
   <li><a href="cart_product.php">show carted product</a></li>

  
</ul>


<div id="form">
<form  method="post" enctype="multipart/form-data">
<table width="30%" border="1" cellpadding="15" >
<tr>
<td> Product ID :<?php echo  $_GET['id']; ?></td>
</tr>
<td><input type="text" name="name" placeholder=" Name" value="<?php if(isset($_GET['id'])) echo $getROW['name'];  ?>" /></td>
</tr>

</tr>
<td><input type="text" name="image" placeholder="Name" value="<?php if(isset($_GET['id'])) echo $getROW['image'];  ?>" /></td>
</tr>

</tr>
<td><input type="text" name="experience" placeholder="Name" value="<?php if(isset($_GET['id'])) echo $getROW['experience'];  ?>" /></td>
</tr>

<tr>
<td><input type="text" name="description" placeholder="Description" value="<?php if(isset($_GET['id'])) echo $getROW['description'];  ?>" /></td>
</tr>

</tr>
<td><input type="text" name="category_id" placeholder="Name" value="<?php if(isset($_GET['id'])) echo $getROW['category_id'];  ?>" /></td>
</tr>


</tr>
<td><input type="text" name="sub_category_id" placeholder="Name" value="<?php if(isset($_GET['id'])) echo $getROW['sub_category_id'];  ?>" /></td>
</tr>

</tr>
<td><input type="text" name="status" placeholder="status" value="<?php if(isset($_GET['id'])) echo $getROW['status'];  ?>" /></td>
</tr>










<tr>
<td>
<button type="submit" name="update">EDIT</button>
</td>
</tr>
</table>
</form>
</body>
</html>

