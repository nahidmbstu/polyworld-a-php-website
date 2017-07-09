<?php
session_start();
include_once'db_connect.php';


$mysqli = new mysqli("localhost", "root", "", "travelagent");

if(isset($_POST['status']))
{
  if (!isset($_SESSION["username"]))

  {    
   $message = "please login!!";
   echo "<script type='text/javascript'>alert('$message');</script>";

 }

 else

 {    
  $id = mysqli_real_escape_string($mysqli, $_POST['id']);
  $username=$_SESSION["username"];

  $image = mysqli_real_escape_string($mysqli, $_POST['image']);
   
  $_SESSION['image']=$image;
  $_SESSION['id']=$id;


  $sql = "UPDATE product SET status='1' WHERE id='$id' ";

  if(mysqli_query($mysqli,$sql)==true)

  {
   
   $sql="INSERT INTO cart (user_name, product_id,image) VALUES ('$username','$id','$image')";

   $result=$mysqli->query($sql);

   $message = "added to cart!! ";

   echo "<script type='text/javascript'>alert('$message');</script>";

   session_destroy();
	 
 }


}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Polyworld Services</title>
<meta name="Description" content="Polyworld">
<meta name="viewport" content="width:device-width" initial-scale="1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script
src="https://code.jquery.com/jquery-2.2.4.js"
integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
crossorigin="anonymous"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/full-slider.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">


</head>

<body  data-spy="scroll" data-target="#my-navbar">

<?php 

include'header.php';

?>



<h1 style="text-align:center;">Welcome to Manpower page</h1> 

<div class="row" id="content">
<?php 

$result=$mysqli->query("SELECT * FROM product WHERE category_id='1' AND sub_category_id='1' AND status='0'" );

while($row=$result->fetch_array())

{                 
 ?>


 <div class="col-md-3">

  <ul> 









	

	<li>picture : <?php    echo "<img src='admin/".$row['image']. "' height='200' width='200'>";  ?> </li>
	<li>Name: <?php  echo $row['name'];           ?></li>

	<li>Description :<?php    echo $row['description'];        ?></li>
	<li ><a href="#">Details</a></li>
	  <form action="" method="post">

	  <input type="text" name="id" value="<?php echo $row['id']; ?>">
	  <input type="hidden" name="image" value="<?php echo $row['image']; ?>">  




	  <li><input type="submit" name="status" value="add to cart"></li></br>
	</form> 
  </ul>


</div>





<?php                 

}

?>
</div>                 


<?php  include'footer.php'; ?>

<script type="text/javascript">


</script>


</script>

<script type="text/javascript" src="js/custom.js">

</script>

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>




</body>
</html>