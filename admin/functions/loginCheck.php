<?php 

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);


include 'connect.php';

// $select = "SELECT * FROM users
// 			 WHERE 
// 			 username = '$username' 
// 			 AND 
// 			 password = '$password'";

// $query = $conn -> query($select);

if ( true  ) {

	// user exist
	// $_SESSION['login'] = $username ;
	header("location: ../index.php");

} else {

	// user dosn`t exist
	$_SESSION['error'] = '<div class="alert alert-danger">Wrong credentials</div>';
	header("location: ../login.php");

}
