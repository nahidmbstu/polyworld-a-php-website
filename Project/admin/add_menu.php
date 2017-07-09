<?php
$mysqli = new MySQLi("localhost","root","","travelagent");

session_start();
if(isset($_POST['add_main_menu']))
{
	$menu_name = $_POST['menu_name'];
	$menu_link = $_POST['mn_link'];
	$sql=$mysqli->query("INSERT INTO main_menu(m_menu_name,m_menu_link) VALUES('$menu_name','$menu_link')");
}
if(isset($_POST['add_sub_menu']))
{
	$parent = $_POST['parent'];
	$proname = $_POST['sub_menu_name'];
	$menu_link = $_POST['sub_menu_link'];
	$sql=$mysqli->query("INSERT INTO sub_menu(m_menu_id,s_menu_name,s_menu_link) VALUES('$parent','$proname','$menu_link')");
}


if(isset($_POST['delete_main_menu']))
{
  $parent = $_POST['parent'];
  $sql=$mysqli->query("DELETE FROM main_menu WHERE s_menu_id ='$parent'");
}




if(isset($_POST['delete_sub_menu']))
{
  $parent = $_POST['parent'];
  $sql=$mysqli->query("DELETE FROM sub_menu WHERE s_menu_id ='$parent'");
}








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add_Menu</title>
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

</head>

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
  <li><a href="add_menu.php">Edit Menu</a></li>
  <li><a href="product.php">Add Product</a></li>
    <li><a href="add_slider.php">Add Slider</a></li>
   <li><a href="view_all_product.php">View all Product</a></li>
   <li><a href="service.php">Edit Services</a></li>
   <li><a href="service_title.php">Edit Services title</a></li>
   <li><a href="cart_product.php">show carted product</a></li>

  
</ul>






<div id="head" class="well well-lg">
<div class="wrap"><br />
<h1><a href="#">Add NEW Menu</a></h1>
</div>
</div>
<center>
<pre>
<form method="post" class="form-group">
<input type="text" placeholder="menu name :" name="menu name" /><br />
<input type="text" placeholder="menu link :" name="mn_link" /><br />
<button type="submit" name="add_main_menu">Add main menu</button>
</form>
</pre>

<hr>

<form method="post" action="">
<select name="parent">
<option selected="selected">Select main menu</option>
<?php
$res=$mysqli->query("SELECT * FROM main_menu");
while($row=$res->fetch_array())
{
  ?>
    <option value="<?php echo $row['m_menu_id']; ?>"><?php echo $row['m_menu_name']; ?></option>
    <?php
}
?>
</select></br>

<button type="submit" name="delete_main_menu">Delete submenu</button>
</form>



<br />
<pre>
<form method="post">
<select name="parent">
<option selected="selected">select parent menu</option>
<?php
$res=$mysqli->query("SELECT * FROM main_menu");
while($row=$res->fetch_array())
{
	?>
    <option value="<?php echo $row['m_menu_id']; ?>"><?php echo $row['m_menu_name']; ?></option>
    <?php
}
?>
</select><br />
<input type="text" placeholder="menu name :" name="sub_menu_name" /><br />
<input type="text" placeholder="menu link :" name="sub_menu_link" /><br />
<button type="submit" name="add_sub_menu">Add sub menu</button>
</form>
</pre>

<hr>

<form method="post" action="">
<select name="parent">
<option selected="selected">Select sub menu</option>
<?php
$res=$mysqli->query("SELECT * FROM sub_menu");
while($row=$res->fetch_array())
{
  ?>
    <option value="<?php echo $row['s_menu_id']; ?>"><?php echo $row['s_menu_name']; ?></option>
    <?php
}
?>
</select></br>

<button type="submit" name="delete_sub_menu">Delete submenu</button>
</form>

<hr>

</center>
</body>
</html>