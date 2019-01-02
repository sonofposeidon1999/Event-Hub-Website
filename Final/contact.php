<?php
include('login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="contactus.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="tag2.jpg">
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
	  	<a class="active" href="contact.php" style="float: right;">About</a>
	</div>

	<div id="ct">
		<h1 id="headr"><u>Creators</u></h1>
		<p>Daksha Singhal</p>
		<p>daksha.singhal@gmail.com</p>
		<p>M.Adithya Vardhan</p>
		<p>adivar1999@gmail.com</p>
		<p>A. Meghna</p>
		<p>maggiemeghna@gmail.com</p>
		<p><u>Profiles</u></p>
		<a href="https://www.linkedin.com/?originalSubdomain=in"><img src="ln.png" id="ln"></a>
		<a href="https://www.facebook.com/"><img src="fb.png" id="fb"></a>
		<a href="https://plus.google.com/discover"><img src="g+.png" id="g"></a>
</body>
</html>