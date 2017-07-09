<?php 
session_start();
include_once'db_connect.php';

if(isset($_POST['login']))
{

$username=mysqli_real_escape_string($mysqli,$_POST['username']);
$password=mysqli_real_escape_string($mysqli,$_POST['password']);

$_SESSION["username"]=$username;
$_SESSION["password"]=$password;

$select_user="SELECT * FROM admin WHERE username=? AND password=? ";

$stmt = $mysqli->prepare($select_user);

$stmt->bind_param('ss', $username, $password);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

if ($row['username']==$_SESSION["username"] && $row['password']==$_SESSION["password"] ) {

         header('location:admin/index.php');           
}

 else
 { 
   
   $message = "you are not registerd !!";
    echo "<script type='text/javascript'>alert('$message');</script>";

  // 


 }

}



if(isset($_POST['userlogin']))
{

$username=mysqli_real_escape_string($mysqli,$_POST['username']);
$password=mysqli_real_escape_string($mysqli,$_POST['password']);

$_SESSION["username"]=$username;
$_SESSION["password"]=$password;

$select_user="SELECT * FROM users WHERE username=? AND password=? ";

$stmt = $mysqli->prepare($select_user);

$stmt->bind_param('ss', $username, $password);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

if ($row['username']==$_SESSION["username"] && $row['password']==$_SESSION["password"] ) {
           
//           echo $_SESSION["username"];
         header('location:users/index.php');           
}

 else
 { 
   
   $message = "you are not registerd !!";
    echo "<script type='text/javascript'>alert('$message');</script>";

  // 


 }

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Signup </title>
  <!-- CORE CSS-->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

<style type="text/css">
html,
body {
    height: 100%;
    width: 30%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
.margin {
  margin: 0 !important;
}
</style>
  
</head>

<body class="blue">


  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form  method="post" action="">
        <div class="row">
          <div class="input-field col s12 center">
            
            <p class="center login-form-text"> Admin Login </p>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="username" type="text" class="validate" required>
            <label name="username" class="center-align">Username</label>
          </div>
        </div>
        

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" type="password" class="validate" required>
            <label for="password">Password</label>
          </div>
        </div>
      
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn btn-primary btn-block" name="login" value="login">Login</button>
          </div>
        
        </div>
      </form>
    </div>
  </div>

<div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form  method="post" action="">
        <div class="row">
          <div class="input-field col s12 center">
            
            <p class="center login-form-text"> user Login </p>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="username" type="text" class="validate" required>
            <label name="username" class="center-align">Username</label>
          </div>
        </div>
        

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" type="password" class="validate" required>
            <label for="password">Password</label>
          </div>
        </div>
      
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn btn-primary btn-block" name="userlogin" value="login">Login</button>
          </div>
        
        </div>
      </form>
    </div>
  </div>



  <center>

</center>

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!--materialize js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>



  


  
</body>

</html>