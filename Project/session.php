<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$mysqli = new mysqli("localhost", "root", "", "travelagent");
// Selecting Database
session_start();
// Storing Session
$user_check=$_SESSION['username'];
// SQL Query To Fetch Complete Information Of User
$sql=mysqli_query( $mysqli, "select username from users where username='$user_check'");
$row = mysql_fetch_assoc($sql);

$login_session =$row['username'];

if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>