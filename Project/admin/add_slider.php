<?php


include_once 'db_connect.php';

session_start();

$mysqli = new mysqli('localhost','root','','travelagent');


$_SESSION['message'] ='';

if($_SERVER['REQUEST_METHOD']=='POST')

{

 $id = mysqli_real_escape_string($mysqli, $_POST['id']);
$avater_path= mysqli_real_escape_string( $mysqli ,'images/'.$_FILES['avater']['name']);
    $caption = mysqli_real_escape_string($mysqli, $_POST['caption']);
     $active = mysqli_real_escape_string($mysqli, $_POST['active']);

    if(preg_match("!image!",$_FILES['avater']['type']))

    {

         if(copy($_FILES['avater']['tmp_name'],$avater_path))


         {

           $_SESSION['id']=$id; 
           $_SESSION['avater']=$avater_path;
            $_SESSION['caption']=$caption;
            $_SESSION['active']=$active; 

           



                 $sql="INSERT INTO slider (id,image,caption,active) VALUES ('$id','$avater_path','$caption','$active')";


                 if(mysqli_query($mysqli,$sql)==true)

                 {
                    $_SESSION['message']='successfully inserted';

                 }

                 else
                 {
 $_SESSION['message']='insert unsuccessful';


                 }

         }

         else
         {
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
<html>
<head>
    <title>Add slider</title>
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

<div class="well well-lg">


<center>


<form action="" method="POST" enctype="multipart/form-data">
    
    <table border='1' cellpadding='10'; >

 
<tr>
<td>
      <label>SLider ID</label>
      <input type="text" name="id" required>

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
        <label for="Name">Caption:</label>
        <input type="text" name="caption" id="Name" required>
    </p>
  </td>
</tr>
        

<tr>
<td>
      <label>Active Slider : 0 or 1</label>
      <input type="text" name="active" required>

</td>
</tr>




        
    
<tr>
<td>


    <input type="submit" value="submit" name="submit">

    </td>
</tr>
        

        
    </table>

    </form>
</center>
</div>
</body>
</html>
    

    <?php echo $_SESSION['message']; ?>

