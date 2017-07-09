<?php 

session_start();
include_once'db_connect.php';

if(isset($_SESSION["username"]))
{

if(isset($_POST['remove']))
{
  $id=$_POST['id'];
  $SQL = $mysqli->query("DELETE FROM cart WHERE product_id='$id'");
    
    if($SQL==true)
    {

        $message = "cart remove successfull!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
    }
    else
    {

        $message = "remove unsuccessfull!!";
       echo "<script type='text/javascript'>alert('$message');</script>";
        
    }

    $SQL = $mysqli->query("UPDATE product SET status='0' WHERE id='$id'");
     
     
    
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>user</title>
	<!-- this link correct any relative link and style sheet -->
	<base href="http://localhost/project/" />

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    
</script>

  <script type="text/javascript" src="js/custom.js"></script>

  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

<style>

</style>

</head>
<body>

<!-- go to root directory  -->


<?php include'header.php'; ?>

<h1> Hello <?php echo $_SESSION["username"]; ?></h1>

<?php
$username=$_SESSION["username"];

?>

<div class="jumbotron">
  
  <p class="text-success" style="text-align: center;" >All carted product</p>
</div>


<table class="table table-bordered table-hover">

<th class="success" style=" width:20%; text-align: center;">Product ID</th>
<th class="success" style=" width:60%; text-align: center;">Product image</th>
<th class="success" style="width:20%; text-align: center;">action</th>



</table>

<!-- proper way to stop sql injection -->
<?php

$sql="SELECT * FROM cart WHERE user_name = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $username);

$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) 
   
{

?>


<table class="table table-bordered table-hover">
  


  
  <tr>
  <td style="width:20%; text-align: center;"><?php echo $row['product_id'];?>
  </td>
    
  <td style="width:60%; text-align: center;"><img src="./admin/<?php echo $row['image'];?>" style="height: 100px; width: 100px;">  
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

?>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/project/footer.php' ); 

?>


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
