<?php include("server.php"); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "proj";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
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
?>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="style1.css">

<style type="text/css">
	#top{
		 margin-top:-140px;
		 margin-left: 30px;
		 width:300px;
		 height: 30px;
	}
	#top input{
		font-style: "sans-serif";
		font-size: 20px;
		height: 30px;
		width: 300px;
		border:none;
		background-color: rgba(211,211,211,0.1);

	}
	 #desc {
   		word-wrap: break-word;
   		width: 100%;
   		font-family:Arial, Helvetica, sans-serif;"
	}
	#bottom input{
		 font-style: "sans-serif";
		 width:200px;
		 height: 30px;
		 font-size: 16px;
	}
	#bottom p{
		font-size: 16px;
		font-family: Arial, Helvetica, sans-serif;
	}
</style>
<body>
	<div class="navbar">
		<div style=" padding:14px 16px; width:100px;height: 17px; float: left; background: #333">
		<b style="padding-top: 2px; padding-bottom: 2px; font-size:20px; color: white; font-size: 17px"><i>EventHub</i></b>
		</div>
	  <a href="home.php">Home</a>
	  <div class="dropdown">
	    <button class="dropbtn">Events
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	        <a href="event-form.php">New</a>
	       	<a href="event_viewing.php">Technical</a>
	    	<a href="event_viewing.php">Cultural</a>
	        <a href="event_viewing.php">Sports</a>
	    </div>
	  	</div> 
	  	<a href="forum.php">Forum</a>
	  	<?php if(isset($_SESSION['success'])): ?>
			<a href="signup.php?logout='1'" style="float: right;" name="logout">Logout</a>
			<p id="wel" style="float: right; margin-top: 0px; margin-bottom: 0px; font-family: inherit; color: white; font-size: 16px">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
	  	<?php endif; ?>
	  	<?php if(!isset($_SESSION['success'])): ?>
	  		<a href="signin.php" style="float: right">Sign In</a>
	  	<?php endif; ?>
	  	<a href="contact.php" style="float: right;">About</a>
	</div>
	<br>
	<?php $GLOBALS['eid']=5142; ?>
	<table style="border-style: solid;height: 500px; width: 100%;border-width:1px; table-layout:fixed; border-radius: 5px;">
		<tr>
			<th><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" width="100%"></th>
			<th style="background-color: rgba(211,211,211,0.6);width: 500px;">
				<div id="top">
					<input type="date" name="date" readonly value="<?php echo $date; ?>"><br><br><br>
					<input type="ename" name="ename" readonly value="<?php echo $title; ?>" style="font-weight: bold;"><br><br><br>
					<p style="margin-left:-280px;">By</p> <input type="org" name="org" readonly value="<?php echo $name ?>"><br>
				</div>
			</th>
		</tr>
	</table>
	<br>
	<table style="border-style: solid;height: 900px; width: 100%;border-width:1px;table-layout:fixed; border-radius: 5px;" align="left">
		<tr>
			<th  align="left" width="100;"><form style="margin-top: -400px;margin-left:90px;">
				<h2 style="font-family: Arial, Helvetica, sans-serif;">Description</h2><br>
				<div id="desc" style="font-weight:400"><?php echo $des; ?>
				</div><br><br><br><br><br>
				<!-- <h2 style="font-family: Arial, Helvetica, sans-serif;">ORGANISERS DESCRIPTION</h2><br>
				<div id="desc" style="font-weight:400">
				</div> -->
				</form>
			</th>
			<th style="background-color: rgba(211,211,211,0.6);width: 50px;">
				<div style="margin-top:-310px;font-style: 'sans-serif';font-weight:400;"  id="bottom">
					<p>DATE AND TIME</p></p><br><br>
					<input type="text" readonly name="date1" value="<?php echo $date ?>" style="margin-left:-160px;"><br><br>
					<input type="text" readonly name="time" readonly value="<?php echo $time ?>" style="width:70px;margin-left:-260px;"> IST<br><br><br>
					<p>LOCATION</p><br><br>
					<input type="text" name="loc" readonly value="<?php echo $loc ?>" style="margin-left: -160px"><br><br>
					<p style="margin-left: -215px;">Bangalore,Karnataka</p> &nbsp;<!-- <input type="text" name="pincode" value="pincode" style="margin-left:-170px;"> --><br><br>
					<button style="height:80px;width: 260px;border-width:0px;border-radius: 3px;font-size:25px;font-style:'sans-serif';" action="<?php echo $link ?>"><p>REGISTRATION LINK</p></button>
				</div>
			</th>
		</tr>		
	</table>
</body>
</html