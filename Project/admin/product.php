<?php
include_once 'db_connect.php';

$_SESSION['message'] ='';

$mysqli = new mysqli('localhost','root','','travelagent');

if($_SERVER['REQUEST_METHOD']=='POST')

{   
  
    $Name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $avater_path= mysqli_real_escape_string( $mysqli ,'images/'.$_FILES['avater']['name']);
    $Experience = mysqli_real_escape_string($mysqli, $_POST['experience']);
    $Description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $main_id=mysqli_real_escape_string($mysqli, $_POST['parent1']);
    $sub_id=mysqli_real_escape_string($mysqli, $_POST['parent2']);



    if(preg_match("!image!",$_FILES['avater']['type']))

    {  

        if(copy($_FILES['avater']['tmp_name'],$avater_path))

        {

            $_SESSION['name']=$Name;
            $_SESSION['avater']=$avater_path;
            $_SESSION['experience']=$Experience;
            $_SESSION['description']= $Description;
            $_SESSION['parent1']=$main_id;
            $_SESSION['parent2']=$sub_id;
     
$sql="INSERT INTO product(name,image,experience,description,category_id,sub_category_id) VALUES('$Name','$avater_path','$Experience','$Description','$main_id' ,'$sub_id')";



                
      if(mysqli_query($mysqli,$sql)===true)


            {

                
                $_SESSION['message']='successfully inserted';
                
                
            }

            else
            {

                  $_SESSION['message']='insert unsuccessful';
                

            }

        }

        else{

               $_SESSION['message']='file upload unsuccessful';

        }



    }

    else

    {
         $_SESSION['message']='please upload image only';
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add product</title>

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



<div class="well well-lg">

<form action="product.php" method="POST" enctype="multipart/form-data">

<table border='1' cellpadding='10'; >

<tr>
<td>
    <p>
        <label for="Name"> Product Name:</label>
        <input type="text" name="name" id="Name" required>
    </p>
  </td>
</tr>


<tr>
<td>
      <label>Image</label>
      <input type="file" name="avater" required>

</td>
</tr>







<tr>
<td>
    <p>
        <label for="Name">Experience:</label>
        <input type="text" name="experience" id="Name" required>
    </p>
  </td>
</tr>





<tr>
<td>
    <p>
        <label for="Description">Description:</label>
        <textarea rows="4" cols="50" name="description" required>

         </textarea>
    </p>
     </td>
</tr>


<tr>
<td>
<select name="parent1">
<option selected="selected"  value="<?php echo $row['m_menu_id']; ?>">select category menu</option>
<?php
$res=$mysqli->query("SELECT * FROM main_menu");
while($row=$res->fetch_array())
{
	?>
    <option name="main_menu" value="<?php echo $row['m_menu_id']; ?>"><?php echo $row['m_menu_name']; ?></option>
    <?php
}
?>
</select><br />



</td>
</tr>

<tr>
<td>
<select name="parent2">
<option selected="selected" value="<?php echo $row['s_menu_id']; ?>">select Sub category menu</option>
<?php
$res=$mysqli->query("SELECT * FROM sub_menu");
while($row=$res->fetch_array())
{
	?>
    <option name="sub_menu" value="<?php echo $row['s_menu_id']; ?>"><?php echo $row['s_menu_name']; ?></option>
    <?php
}
?>
</select><br />



</td>
</tr>


<tr>
<td>


    <input type="submit" value="submit" name="submit">

    </td>
</tr>

    </table>
</form>

<?php echo $_SESSION['message']; ?>

</div>


</center>
</body>
</html>