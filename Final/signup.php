<?php
include('Login.php');
?>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body background="a-l-135921-unsplash.jpg">
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
	  		<a class="active" href="signin.php" style="float: right">Sign In</a>
	  	<?php endif; ?>
	  	<a href="contact.php" style="float: right;">About</a>
	</div>
	<div id='su'>
		<h1><i><center>Sign up here!</center></i></h1>
	<form align='center' method="post" action="signup.php">
		<?php include("errors.php");?>
		<input type="text" name="name" required placeholder="Full Name" id="ip"><br><br>
		<select name="college_name" required id="ip" placeholder="Select your University">
			<option value="sel">Select your University</option>
			<option value="pes">PES University</option>
			<option value="rv">RV University</option>
			<option value="chirst">Christ Univeristy</option>
		</select><br><br>
		<input type="email" name="email" required placeholder="Email-Id" id="ip"><br><br>
		<input type="text" name="contact" required placeholder="Contact No." id="ip"><br><br>
		<input type="text" name="username" required placeholder="Username" id="ip"><br><br>
		<input type="password" name="password" required placeholder="Password" id="ip"><br><br>
		<input type="password" name="c_password" required placeholder="Confirm Password" id="ip"><br><br>
		<input type="submit" name="register" value="Sign Up">
		<p>Already a member?<a href="signin.php">Sign in</a></p>
	</form>
	<center style="color: rgb(105,105,105);">By signing up, you agree to the <br>
<u>Terms of Use</u> and <u>Privacy Policy</u>.</center>
</div>
<!-- <div id="pic">
	<img src="momentum-gurgaon.jpg">
</div> -->
</body>
</html>