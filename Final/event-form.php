<?php
include("server.php");
?>
<html>
<head>
	<title>Create an Event</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<!-- <link rel="stylesheet" href="kuchbhi.css"> -->
</head>
<body>
	<script>
		<?php if(!isset($_SESSION['success'])): ?>
			alert("You need to sign in to create an event");
			<?php  header('location: signin.php');?>
		<?php endif; ?>
	</script>
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
	<hr>
	<center><h2>CREATE AN EVENT</h2></center>
	<div style="height:45;border-top:0px;border-right: 0px;border-left:0px;padding-top: 1px;border-color:rgb(200,200,200);border-style: solid;">
		<h2  style="margin-left: 10px;font-family: Arial, Helvetica, sans-serif;">EVENT DETAILS</h2>
	</div>
	<div style="background-color: rgba(211,211,211,0.6);"><br><br>
	<form  style="margin-left: 100px;" method="post" action="event-form.php">
		<?php include("errors.php"); ?>
		<div class="eventa" id="d">
			<label for="event">
			<b>EVENT TITLE</b>    <input type="text" name="title" placeholder="Give it a short distinct name" id="event" autofocus value=<?php echo $title ?>>
			</label><br><br><br>
			<b>LOCATION</b>    <input type="text" name="address" placeholder="Address" id="loc" value=<?php echo $loc ?>><br><br>
					    <input type="text" name="pincode" placeholder="Pincode" id="loc" style="margin-left: 104px;"><br><br><br>
			<label for="date"><b>DATE OF THE EVENT</b>    <input type="date" name="date" id="loc" value=<?php echo $date ?>></label><br><br><br>
			<b>TIME OF THE EVENT</b>    <input type="time" name="time" id="loc" value=<?php echo $time ?>><br><br><br>
			<b>EVENT IMAGE</b>    <input type="file" name="image" accept="image/*" id="loc"><br><br><br>
			<b>EVENT DESCRIPTION</b><br><br> <textarea name="description" cols="50" rows="8" style="resize: none;" id="area" value=<?php echo $des ?>></textarea><br><br><br>
			<b>EVENT TYPE</b>
			<select id="etype" name=etype style="width:300px;height: 30px;font-size:20px;font-style: "sans-serif";">
				<option value="sel">Select one option</option>
				<option id="technical">Technical</option>
				<option id="cultural">Cultural</option>
				<option id="sports">Sports</option>
			</select>&nbsp;&nbsp;&nbsp;<p id="p"></p>
			<!-- <select id="tech" disabled="true" visible="false">
				<option value=1a>Hackathon</option>
				<option id="1b">Guest Lecture</option>
				<option id="1c">Workshop</option>
			</select>
			<select id="cul" disabled="true" visible>
				<option value=2a>Concert</option>
				<option id="2b">Audition</option>
				<option id="2c">Competition</option>
			</select>
			<select id="sp" disabled="true">
				<option value=3a>Football</option>
				<option id="3b">Cricket</option>
				<option id="3c">Badminton</option>
			</select> --><br><br>
			<b>REGISTRATIONS LINK</b>    <input type="url" name="link" placeholder="Give Link Here" id="loc" value=<?php echo $link ?>><br><br><br>
			<center><input type="submit" name="publish" value="Publish" style="background-color: rgba(220,20,60,0.86);height:40px;width: 160px;border-width:0px;border-radius: 3px;font-size:25px;font-style:"sans-serif";"></center>
		</div>
	</form></div>	
<script type="text/javascript">
		function GetSelectedTextValue(event) {
		    var selectedText = event.options[event.selectedIndex].innerHTML;
		    var selectedValue = event.value;
		    // alert("Selected Text: " + selectedText + " Value: " + selectedValue);
		    if(selectedText=="Technical"){
	    		if(typeof(selectE2)!="undefined"){
	    			document.getElementById("eventa").removeChild(selectE2);
	    		}  
	    		if(typeof(selectE3)!="undefined"){
	    			document.getElementById("eventa").removeChild(selectE3);
	    		}  		    		
				var selectE1=document.createElement("select");
				selectE1.setAttribute("id","technicals")
				var opE1=document.createElement("option");
				var opE2=document.createElement("option");
				var opE3=document.createElement("option");
				selectE1.add(opE1);
				selectE1.add(opE2);
				selectE1.add(opE3);
				opE1.text="Hackathon";
				opE1.value="1a";
				opE2.text="Guest Lecture";
				opE2.value="1b";
				opE3.text="Workshop";
				opE3.value="1c";	
				selectE1.setAttribute("id","t");
				document.getElementById("d").insertBefore(selectE1,document.getElementById("p"));
				alert(typeof(selectE1));
		    }
		    if(selectedText=="Cultural"){
		    	alert(typeof(selectE1));
		    	alert(typeof(selectE3));
	    		// if(selectE1!="undefined"){
	    		// 	document.getElementById("eventa").removeChild(selectE1);
	    		// }  
	    		// if(selectE3!="undefined"){
	    		// 	document.getElementById("eventa").removeChild(selectE3);
	    		// }  
				var selectE2=document.createElement("select");
				var opE1=document.createElement("option");
				var opE2=document.createElement("option");
				var opE3=document.createElement("option");
				selectE2.add(opE1);
				selectE2.add(opE2);
				selectE2.add(opE3);
				opE1.text="Concert";
				opE1.value="2a";
				opE2.text="Audition";
				opE2.value="2b";
				opE3.text="Competion";
				opE3.value="2c";	
				selectE2.setAttribute("id","t");
				document.getElementById("d").insertBefore(selectE2,document.getElementById("p"));
		    }
		    if(selectedText=="Sports"){
	    		// if(typeof(selectE2)!='undefined'){selectE2.remove();}  
	    		// if(typeof(selectE1)!='undefined'){selectE1.remove();}
				var selectE3=document.createElement("select");
				var opE1=document.createElement("option");
				var opE2=document.createElement("option");
				var opE3=document.createElement("option");
				selectE3.add(opE1);
				selectE3.add(opE2);
				selectE3.add(opE3);
				opE1.text="Cricket";
				opE1.value="3a";
				opE2.text="FootBall";
				opE2.value="3b";
				opE3.text="Badminton";
				opE3.value="3c";	
				selectE3.setAttribute("id","t");
				document.getElementById("d").insertBefore(selectE3,document.getElementById("p"));
			}
    	}
</script>
<script>
	window.onscroll = function() {myFunction()};

	var navbar = document.getElementById("navbar");
	var sticky = navbar.offsetTop;

	function myFunction() {
	  if (window.pageYOffset >= sticky) {
	    navbar.classList.add("sticky")
	  } else {
	    navbar.classList.remove("sticky");
	  }
	}
</script>
</body>
</html>