<?php 

include_once'db_connect.php';


session_start();
$mysqli = new mysqli("localhost", "root", "", "travelagent");

$_SESSION['message'] ='';

if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
 

 $_SESSION["username"]=$username;

$query="SELECT * FROM users WHERE username='$username'";


$result=mysqli_query($mysqli,$query);


$row=mysqli_fetch_array($result);



if ($row['username']!= $username) 

{
  

$sql="INSERT INTO users(username,password,fullname,address,phone) VALUES('$username','$password','$fullname','$address','$phone')";

               
      if(mysqli_query($mysqli,$sql)===true)


            {

                 
                $_SESSION['message']='successfully registerd';
                
                
            }

            else {
                     $_SESSION['message']='please check all fields';

            }


  
}


else
{
    $message = "username exists!!";
    echo "<script type='text/javascript'>alert('$message');</script>";
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
      <form  action="" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            
            <p class="center login-form-text"> SignUp Form</p>
          </div>
        </div>
        

         <div class="row">
          <div class="input-field col s12">
           <input type="text" name="username" placeholder="username" required>
              
          </div>
           <div class="row">
          <div class="input-field col s12">
           <input type="text" name="password" placeholder="password" required>
              
          </div>
           <div class="row">
          <div class="input-field col s12">
           <input type="text" name="fullname" placeholder="fullname" required>
              
          </div>
           <div class="row">
          <div class="input-field col s12">
           <input type="text" name="address" placeholder="address" required>
              
          </div>
           <div class="row">
          <div class="input-field col s12">
           <input type="text" name="phone" placeholder="phone" required>
              
          </div>

        
        <div class="row">
          <div class="input-field col s12">
           <input type="submit" value="submit" name="submit">
              
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up">Already have an account? <a href="login.php">Login</a></p>
          </div>
        </div>
      </form>
<?php echo $_SESSION['message']; ?>
      
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