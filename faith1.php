<!doctype html>
<html>
  <head>
     <title>Church Management System</title><!--title of the webpage-->
	 <!--css for index.php pages-->
	 <link type="text/css" rel="stylesheet" href="../css/stylesheet_index_pages.css">
  </head>
  <body>
     <!--main  body-->
	 <div id="main_pages">
	 
	   <!--header-->
	   <header id="header_id">
	     <h1 id="heading"><a href="admin/adminsignin.php">Church Management System</a></h1>
	   </header>
	   
	   <!--navigation bar-->
	   <div>
	     <nav id="nav_page">
	       <ul>
		     <li><a href="../index1.php">Home</a></li>
			 <li><a href="about1.php">About Us</a></li>
			 <li><a href="faith1.php">Faith Formation</a></li>
			 <li id="signing"><a href="signout1.php">Sign Out</a></li>
			 <li id="signing"><a href="../signup.php">Sign Up</a></li>
		   </ul>
	      </nav>
	   </div>
	   <!--side pages-->
	   <div class="side_page">
	      <form method="post" action="faith1.php">
		    <table>
			  <tr>
			    <td>User Name:</td>
				<td><input type="text" name="username" placeholder="User Name" /></td>
			  </tr>
			  <tr>
			    <td>Password:</td>
				<td><input type="password" name="password" placeholder="Password"></td>
			  </tr>
			  <tr>
			    <td></td>
				<td><input type="submit" name="subscribe" value="Subscribe" /></td>
			  </tr>
			</table>
		  </form>
	   </div>
	   <!--body parts-->
	   <div class="faith_page_image">
	      <form method="post" action="faith1.php">
		    <table width="100%" border="0px">
			   <tr>
			      <td colspan="2" align="center">Picture Section</td>
			   </tr>
			   <tr>
			     <td><img src="../media/image/img1.jpg" id="image" /></td>
				 <td>Image Description .............................</td>
			   </tr>
			   <tr>
			      <td colspan="2">For More Picture.... <a href="faith_picture1.php">Click Here</td>
			   </tr>
			</table>
		  </form>
	   </div>
	   <div class="faith_page_video">
	       <form method="post" action="faith.php">
		    <table width="100%" border="0px">
			   <tr>
			      <td colspan="2" align="center">Video Section</td>
			   </tr>
			   <tr>
			     <td><video src="../media/video/video1.mp4" controls="controls" width="480px" height="320px" /></td>
				 <td>Video Description............................</td>
			   </tr>
			   <tr>
			      <td colspan="2">For More Video....  <a href="faith_vedio1.php">Click Here</td>
			   </tr>
			</table>
		  </form>         
	   </div>
	   <div class="faith_page_audio">
	       <form method="post" action="faith.php">
		    <table width="100%" border="0px">
			   <tr>
			      <td colspan="2" align="center">Musics Section</td>
			   </tr>
			   <tr>
			     <td><audio src="../media/audio/audio1.m4a" controls="controls" /></td>
				 <td>Musics Description..............................</td>
			   </tr>
			   <tr>
			      <td colspan="2">For More Musics....  <a href="faith_musics1.php">Click Here</td>
			   </tr>
			</table>
		  </form>
	   </div>
	   
	   <!--footer-->
	   <div class="footer_page">
	      <h3 id="footer_home">@Copy Right 2017 Great Commession Church</h3>
	   </div>
	   
	 </div>
  </body>
</html>
<?php
  session_start();
  include("database.php");
  if(isset($_POST['subscribe'])){
	  $username=$_POST['username'];
	  $password=$_POST['password'];
	  $subscribe=$_POST['subscribe'];
	  $sql = "SELECT*FROM registration WHERE username='$username' AND password='$password' ";
	  $result = mysqli_query($con,$sql);
	  if(mysqli_fetch_array($result)){
		  echo "<script>alert('Subscription Successful')</script>";
		  $sql1="INSERT INTO subscriber(username,password,subscribe)VALUES('$username','$password','$subscribe')";
		  $result1=mysqli_query($con,$sql1);
		  if(result1){echo "";}
		  else{echo "";}
	  }else{
		  echo "<script>alert('Retry again')</script>";
	  }
  }
?>