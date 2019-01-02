<?php
//echo "flag0";
session_start();
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "proj";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user="";
$name="";
$phone="";
$mail="";
$college="";
$pass="";
$pass1="";
$errors=array();

if(isset($_POST['register']))
{
	$name=mysqli_real_escape_string($conn,$_POST['name']);
	$user = mysqli_real_escape_string($conn,$_POST['username']);
	$pass =mysqli_real_escape_string($conn,$_POST['password']);
	$mail=mysqli_real_escape_string($conn,$_POST['email']);
	$phone=mysqli_real_escape_string($conn,$_POST['contact']);
	$college=mysqli_real_escape_string($conn,$_POST['college_name']);
	$pass1 =mysqli_real_escape_string($conn,$_POST['c_password']);
	if(empty($name)){
		array_push($errors, "Name is required");
	}
	if(empty($user)){
		array_push($errors, "Username is required");
	}
	if(empty($mail)){
		array_push($errors, "Email is required");
	}
	if(empty($phone)){
		array_push($errors, "Contact is required");
	}
	if($college=="sel"){
		array_push($errors, "College name is required");
	}
	if(empty($pass)){
		array_push($errors, "Password is Required");
	}
	if(empty($pass1)){
		array_push($errors, "Password Confirmation is Required");
	}
	if($pass1!=$pass) {
		array_push($errors, "Passwords do not match");
	}
	if(count($errors)==0) {
		//$password= md5($pass); //Encrypting password
		$check="select * FROM login WHERE username = '$user'";
		$q=mysqli_query($conn,$check);
		if(!$q || (mysqli_num_rows($q))==0){
			$sql="INSERT INTO login VALUES('$name','$mail','$college','$phone','$user','$pass')";
			// mysqli_query($conn,$sql);
			if(!mysqli_query($conn,$sql))
			{
	    		die(mysqli_query($conn,$sql));
			}
			else{ array_push($errors,"Success"); 
			$_SESSION["username"]=$user;
			$_SESSION["success"]="You are now logged in";
			header('location:signin.php'); //redirect to home page
		}
		}
		else{
			array_push($errors,"An account already exists with this Username");
		}
}
}

if(isset($_POST['login'])) {
	$user=mysqli_real_escape_string($conn,$_POST['username']);	
	$pass=mysqli_real_escape_string($conn,$_POST['password']);
	if(empty($user)){
		array_push($errors, "Username is required");
	}
	if(empty($pass)){
		array_push($errors, "Password is Required");
	}
	if(count($errors)==0) {
		//$password= md5($pass); //Encrypting password
		$sql="select * FROM login WHERE password = '$pass' AND username = '$user'";
		$q=mysqli_query($conn,$sql);
		if(!$q || (mysqli_num_rows($q))==1){
		// 	die("YES, THIS WORKS.");
			$_SESSION["username"]=$user;
			$_SESSION["success"]="You are now logged in";
			header('location: home.php'); //redirect to home page
	}
	else{
			array_push($errors,"Not a valid Username/Password");
	}
}
}
// echo "flag2";
// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
if(isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: home.php');
}

?>
