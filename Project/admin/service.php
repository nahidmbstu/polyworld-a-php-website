<?php


include_once 'db_connect.php';

session_start();

$mysqli = new mysqli('localhost','root','','travelagent');


$_SESSION['message'] ='';


if(isset($_POST['delete_service']))
{
  $parent = $_POST['parent'];
  $sql=$mysqli->query("DELETE FROM service WHERE id ='$parent'");
  echo " service deleted ";
}







if(isset($_POST['submit']))

{
     $name = mysqli_real_escape_string($mysqli, $_POST['name']);
 $image_path= mysqli_real_escape_string( $mysqli ,'images/'.$_FILES['image']['name']);
     $detail = mysqli_real_escape_string($mysqli, $_POST['detail']);

    if(preg_match("!image!",$_FILES['image']['type']))

    {

         if(copy($_FILES['image']['tmp_name'],$image_path))


         {

            
            $_SESSION['name']=$name;
           $_SESSION['image']=$image_path;
            $_SESSION['detail']=$detail; 

           

               $query="SELECT * FROM service";


           if ($result = mysqli_query($mysqli, $query)) {

    /* determine number of rows result set */
                      $row_cnt = mysqli_num_rows($result);

                   if ($row_cnt<3) {
      
                                

     




                 $sql="INSERT INTO service (name,image,detail) VALUES ('$name','$image_path','$detail')";


                 if(mysqli_query($mysqli,$sql)==true)

                 {
                    $_SESSION['message']='successfully inserted';

                 }

                 else
                 {
 $_SESSION['message']='insert unsuccessful';


                 }

         }


         else{
                $_SESSION['message']='cannot insert more than 3';


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


}











?>




<!DOCTYPE html>
<html>
<head>
    <title>Edit services</title>
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

<script>
function showService(str) {
    if (str == "") {
        document.getElementById("txt").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getService.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>








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


#dialog{

    display: inline-block;
    vertical-align: middle;

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


<div class="well">

<center>

<h2>ADD services</h2>

<form action="" method="POST" enctype="multipart/form-data">
    
    <table border='1' cellpadding='10'; >

 

        
<tr>
<td>
    <p>
        <label for="Name">Service Name:</label>
        <input type="text" name="name" id="Name" required>
    </p>
  </td>
</tr>
        

<tr>
<td>
      <label>Service Image</label>
      <input type="file" name="image" required>

</td>
</tr>

<tr>
<td>
      <label>Service details</label>
      <textarea rows="4" cols="50" name="detail" required></textarea>

</td>
</tr>





        
    
<tr>
<td>


    <input type="submit" value="submit" name="submit">

    </td>
</tr>
        
    </table>

    </form>

<hr>
<div>
<h2>show service details</h2>

<form>
<select name="parent" onchange="showService(this.value)">
<option selected="users" >Select a Service:</option>
<?php
$res=$mysqli->query("SELECT * FROM service");
while($row=$res->fetch_array())
{
  ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
    <?php
}
?>
</select>
</br>

</form>

</div>

<div id="txt"><b>Service info will be show here...</b></div>


<hr>

<form method="post" action="">
<select name="parent">
<option selected="selected">Select Service</option>
<?php
$res=$mysqli->query("SELECT * FROM service");
while($row=$res->fetch_array())
{
  ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
    <?php
}
?>
</select></br>

<button type="submit" name="delete_service">Delete service</button>
</form>
    </center>

    </div>









</body>
</html>
    

    <?php echo $_SESSION['message']; ?>

