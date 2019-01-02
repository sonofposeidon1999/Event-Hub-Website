<?php include('login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<link rel="stylesheet" type="text/css" href="forum_css.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    p {
      font-color:red;
    }
    #rwords {
      font-color:white;
    }
    #reply {
      font-color:salmon;
    }
  </style>
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
      <a class="active" href="forum.php">Forum</a>
      <?php if(isset($_SESSION['success'])): ?>
      <a href="signup.php?logout='1'" style="float: right;" name="logout">Logout</a>
      <p id="wel" style="float: right; margin-top: 0px; margin-bottom: 0px; font-family: inherit; color: white; font-size: 16px">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <?php endif; ?>
      <?php if(!isset($_SESSION['success'])): ?>
        <a href="signin.php" style="float: right">Sign In</a>
      <?php endif; ?>
      <a href="contact.php" style="float: right;">About</a>
  </div>
	<br><br>
	<form>
		<textarea id="words" rows="5" cols="80" placeholder="Ask a question!!" style="resize: none"></textarea><br>
		<input type="button" onclick="getwords()" value="Enter" id="button"> <br>
	</form>

	<script type="text/javascript">

	function getwords() 
	{
  		text = words.value;

  		var para=document.createElement('p');
      para.innerHTML+='<p>'+"<?php echo $_SESSION['username']; ?>";
  		para.innerHTML += '<p>'+text;
  		document.body.appendChild(para);

  		// document.getElementById("para").innerHTML += '<p>'+text;
  		document.getElementById("words").value = "";

  		var reply=document.createElement('textarea');
  		reply.setAttribute('id','rwords');
  		reply.setAttribute('rows',5);
  		reply.setAttribute('cols',80);
  		reply.setAttribute('placeholder','Answer it!!');
  		document.body.appendChild(reply);
  		
  		var brk=document.createElement('br');
  		document.body.appendChild(brk);

  		var rbutton=document.createElement('input');
  		rbutton.setAttribute('type','button');
  		rbutton.setAttribute('value','Answer');
  		rbutton.setAttribute('id','button');
  		document.body.appendChild(rbutton);

  		rbutton.setAttribute('onclick','getr();');
	}	

	function getr()
	{
		text = rwords.value;

  		var para=document.createElement('p');
      para.innerHTML+='<p>'+"<?php echo $_SESSION['username'];?>"
  		para.innerHTML += '<p>'+text;
  		para.setAttribute('id','reply');
  		document.body.appendChild(para);
  		document.getElementById("rwords").value = "";

  		


	}

</script>
</body>
</html>