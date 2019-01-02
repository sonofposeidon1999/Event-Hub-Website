<?php
	include('login.php');
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<!-- <link rel="stylesheet" href="kuchbhi.css"> -->
<body background-color="#1A1A1D">
	<div class="navbar">
		<div style=" padding:14px 16px; width:100px;height: 17px; float: left; background: #333">
		<b style="padding-top: 2px; padding-bottom: 2px; font-size:20px; color: white; font-size: 17px"><i>EventHub</i></b>
		</div>
	  <a class="active" href="home.php">Home</a>
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
	
	<div class="row" style="background: #ff3333;">
		<h2 style="margin-left: 10px; font-size: 40px; font-color: #D9B310">All Events</h2>
	  <div class="column" style="background: white;opacity: 1;">
	    <div class="card">
	    	<?php // $e=0; ?>
	        <div class="container" name="<?php echo $e ?>">
		      	<img src="srm-hackathon.jpg" alt="SRM" style="width:100%">
		        <h2>Hackathon</h2>
		        <p>SRM institute of Science and Technology</p>
		        <div class="middle">
		        	 <p><button type="submit" class="button" id="butt1" name="srm">View</button></p>
		        </div>
	        </div>
	    </div>
	  </div>
	  <div class="column" id="demo1" style="background: white;">
	    <div class="card">
	      <div class="container">
	      	<img src="NMIMS-sports.jpg" alt="Samarthya" style="width:100%">
	        <h2>Samarthya</h2>
	        <p>Narsee Monjee Institute of Management Studies</p>
	        <div class="middle">
	        	<p><button class="button" id="butt2">View</button></p>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="column" style="background: white;">
	    <div class="card">
	      <div class="container">
	      	<img src="NLV-jodhpur-sports.jpg" alt="Yuvardha IV" style="width:100%">
	        <h2>Yuvardha</h2>
	        <p>NLV Jodhpur</p>
	        <div class="middle">
	        	<p><button class="button" id="butt3">View</button></p>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="column" style="background: white;opacity: 1;">
	    <div class="card">
	    	<?php  $e=0; ?>
	        <div class="container" name="<?php echo $e ?>">
		      	<img src="125-cultural.jpg" alt="Synapse" style="width:100%">
		        <h2>Synapse</h2>
		        <p>Maulana Azad Medical College</p>
		        <div class="middle">
		        	 <p><button class="button" id="butt1">View</button></p>
		        </div>
	        </div>
	    </div>
	  </div>
	</div>
	<div class="row" style="background: #ff3333;">
			<h2 style="margin-left: 10px; font-size: 40px; font-color: #D9B310">All Events</h2>
		  <div class="column" style="background: white;opacity: 1;">
		    <div class="card">
		    	<?php // $e=0; ?>
		        <div class="container" name="<?php echo $e ?>">
			      	<img src="srm-hackathon.jpg" alt="SRM" style="width:100%">
			        <h2>Hackathon</h2>
			        <p>SRM institute of Science and Technology</p>
			        <div class="middle">
			        	 <p><button class="button" id="butt1">View</button></p>
			        </div>
		        </div>
		    </div>
		  </div>
		</div>
<!-- 		<script> function f1(){<?php //header('location:event_viewing.php'); ?>}</script>
 -->	<script type="text/javascript">
		document.getElementById("butt1").addEventListener("click","goToLink1()",false);
		document.getElementById("butt2").addEventListener("click","goToLink2()",false);
		document.getElementById("butt3").addEventListener("click","goToLink3()",false);

	 	function goToLink(number)
	 	{
	 		$GLOBAL['eid']=number;
	 		alert(number);
	 		// header('location: event_viewing.php');
	 	}
	</script>
	<script type="text/javascript">
		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky")
		  }
		  else {
		    navbar.classList.remove("sticky");
		  }
		}
		window.onscroll = function() {myFunction()};
		var navbar = document.getElementById("navbar");

		// Get the offset position of the navbar
		var sticky = navbar.offsetTop;
		// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
		
		alert('flag0');
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "1234";
			$dbname = "proj";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			if (!$conn)
			{
				die("Connection failed: " . mysqli_connect_error());
			}
			else 
			{
				echo "no result";
			}
				// else {
				// 	die("Success");
				// }
				$sql = "SELECT * FROM event";
				$result = mysqli_query($conn,$sql);

				//echo "flag1";
				if (!$result || mysqli_num_rows($result) > 0) {
				    // output data of each row
				    echo "flag2";
				    while($row = mysqli_fetch_row($result)) {
				        echo 'var div1=document.createElement("div");
						div1.setAttribute("class","column");";
						var div2=document.createElement("div");
						div2.setAttribute("class","card");
						var div3=document.createElement("div");
						div3.setAttribute("class","container");
						var img1=document.createElement("img");
						img1.setAttribute("src",'.$row["image"].');
						var he=document.createElement("h2");
						he.innerHTML='.$row["title"].';
						var para1=document.createElement("p");
						para1.innerHTML='.$row["description"].';
						evar div4=document.createElement("div");
						div4.setAttribute("id","middle");
						var para2=document.createElement("p");
						var but=document.createElement("button");
						but.setAttribute("class","button");
						but.setAttribute("id","butt");
						but.innerHTML="View";
						alert("flag2");
						div1.add(div2);
						div2.add(div3);
						div3.add(img1);
						div3.add(he);
						div3.add(para1);
						div3.add(div4);
						div4.add(para2);
						para2.add(but);
						document.getElementByClassName("row").insertBefore(div1,document.getElementById("demo1"));';
						echo "title:".$row["title"];
						echo "Organiser's Name".$row["name"];
				    }
				} else {
				    echo "0 results";
				}
				// mysqli_close($conn);
		?>

		// var div1=document.createElement("div");
		// div1.setAttribute("class","column");
		// var div2=document.createElement("div");
		// div2.setAttribute("class","card");
		// var div3=document.createElement("div");
		// div3.setAttribute("class","container");
		// var img1=document.createElement("img");
		// img1.setAttribute("src",'momentum-gurgaon.jpg');
		// var he=document.createElement("h2");
		// he.innerHTML='something';
		// var para1=document.createElement("p");
		// para1.innerHTML='blah blah blah';
		// var div4=document.createElement("div");
		// div4.setAttribute("id","middle");
		// var para2=document.createElement("p");
		// var but=document.createElement("button");
		// but.setAttribute("class","button");
		// but.setAttribute("id","butt");
		// but.innerHTML="View";
		// alert("flag2");
		// div1.add(div2);
		// div2.add(div3);
		// div3.add(img1);
		// div3.add(he);
		// div3.add(para1);
		// div3.add(div4);
		// div4.add(para2);
		// para2.add(but);
		// document.getElementByClassName("row").insertBefore(div1,document.getElementById("demo1"));
		// title:.$row["title"];
		// Organiser's Name.$row["name"];
	</script>
</body>
</html>