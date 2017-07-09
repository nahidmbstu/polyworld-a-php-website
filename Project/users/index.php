<?php 
session_start();
include_once'db_connect.php';

if(isset($_SESSION["username"]))
{

?>

<!DOCTYPE html>
<html>
<head>
	<title>user</title>
	<!-- this link correct any relative link and style sheet -->
	<base href="http://polyworldservice.com/users/" />

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

  <!-- Script to Activate the Carousel -->
  
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
  
  <a href="cart_list_show_edit.php"><p class="text-success" style="text-align: center;" >Show All carted product</p></a>
</div>


<?php
include($_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); 
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
