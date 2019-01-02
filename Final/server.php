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
$name="";
$loc="";
$title="";
$image="";
$mail="";
$link="";
$des="";
$time="";
$date="";
$etype="";
$errors=array();

if(isset($_POST['publish']))
{
	$title=mysqli_real_escape_string($conn,$_POST['title']);
	$loc = mysqli_real_escape_string($conn,$_POST['address']);
	$time =mysqli_real_escape_string($conn,$_POST['time']);
	$image=mysqli_real_escape_string($conn,$_POST['image']);
	$des=mysqli_real_escape_string($conn,$_POST['description']);
	$link=mysqli_real_escape_string($conn,$_POST['link']);
	$date =mysqli_real_escape_string($conn,$_POST['date']);
	$etype=mysqli_real_escape_string($conn,$_POST['etype']);
	if(empty($title)){
		array_push($errors, "Title is required");
	}
	if(empty($loc)){
		array_push($errors, "Location is required");
	}
	if(empty($time)){
		array_push($errors, "Time is required");
	}
	if($etype=="sel"){
		array_push($errors, "Event Type is required");
	}
	if(empty($date)){
		array_push($errors, "Date is Required");
	}
	if(empty($des)){
		array_push($errors, "Event Description is Required");
	}
	if(empty($image)) {
		array_push($errors, "image do not match");
	}
	if(count($errors)==0) {
		$user=$_SESSION['username'];
		$eid=rand(0,9999999999);
		$q="SELECT email, Name from login WHERE username='$user';";
		$result = mysqli_query($conn,$q);
		if (!$result || mysqli_num_rows($result) > 0) {
		    $row = mysqli_fetch_assoc($result);
			$mail=$row["email"];
			$name=$row["Name"];
		}
		$sql="INSERT INTO event VALUES('$eid','$title','$loc','$date','$time','$image','$des','$name','$mail','$etype','$link')";
		// mysqli_query($conn,$sql);
		if(!mysqli_query($conn,$sql))
		{
 		}
		else{ array_push($errors,"Success"); 
		$_SESSION["username"]=$user;
		$_SESSION["success"]="You are now logged in";
		header('location:home.php'); //redirect to home page
}
}
}
if(isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header('location: event-form.php');
}

if(isset($_POST['srm'])){
	// $e=mysqli_real_escape_string($conn,$GLOBALS['eid']);
	$q="SELECT * from event WHERE EID='5142';";
	$result = mysqli_query($conn,$q); 
	if (!$result || mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result);
		$name=$row["OName"];
		$title=$row["title"];
		$loc=$row["location"];
		$date=$row["date"];
		$time=$row["time"];
		$image=$row["image"];
		$des=$row["description"];
		$link=$row["RLink"];
		$etype=$row["EType"];
	}
	else{
		array_push($errors, "Could not find Event.");
	}

}

?>