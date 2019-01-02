<?php
include('Login.php');
?>
<html>
<head>
	<title>Signin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
		<h1><i><center>Sign in here!</center></i></h1>
	<form align='center' method="post" action="signin.php">
		<?php include("errors.php");?>
		<input type="text" name="username" required placeholder="Username" id="ip"><br><br>
		<input type="password" name="password" required placeholder="Password" id="ip"><br><br>
		<input type="submit" name="login" value="Sign In">
		<p>Not yet a member?<a href="signup.php">Sign up</a></p>
	</form>
	<center style="color: rgb(105,105,105);">By signing in, you agree to the <br>
<u>Terms of Use</u> and <u>Privacy Policy</u>.</center>
</div>
</body>
</html>