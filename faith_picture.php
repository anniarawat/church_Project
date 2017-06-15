<!doctype html>
<html>
  <head>
     <title>Church Management System</title><!--title of the webpage-->
	 <!--css for index.php pages-->
	 <link type="text/css" rel="stylesheet" href="css/stylesheet_index_pages.css">
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
		     <li><a href="index.php">Home</a></li>
			 <li><a href="about.php">About Us</a></li>
			 <li><a href="faith.php">Faith Formation</a></li>
			 <li><a href="Contact.php">Contact Us</a></li>
			 <li id="signing"><a href="signin.php">Sign In</a></li>
			 <li id="signing"><a href="signup.php">Sign Up</a></li>
		   </ul>
	      </nav>
	   </div>
	   <!--side pages-->
	   <div class="side_page">
	      <form method="post" action="index.php">
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
	   <div class="faith_page_image_x">
	      <form method="post" action="faith_picture.php">
		    <table width="100%" border="0px">
			   <tr>
			      <td colspan="2" align="center">Picture Section</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 1</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img1.jpg" id="image" /></td>
				 <td>Image of Our Choir</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 2</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img2.jpg" id="image" /></td>
				 <td>image of Our Church Members</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 3</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img3.jpg" id="image" /></td>
				 <td>Image of Crusade in 2014</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 4</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img4.jpg" id="image" /></td>
				 <td>Image of Crusade in 2015</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 5</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img5.jpg" id="image" /></td>
				 <td>Image of church service</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 6</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img6.jpg" id="image" /></td>
				 <td>Image of Crusade in 2015</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 7</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img7.jpg" id="image" /></td>
				 <td>Image of Crucade in 2016</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 8</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img8.jpg" id="image" /></td>
				 <td>Image of Crusade in 1017</td>
			   </tr>
			   <tr>
			      <td colspan="2" align="left">Picture 9</td>
			   </tr>
			   <tr>
			     <td><img src="media/image/img9.jpg" id="image" /></td>
				 <td>image of Fresh air open campaign</td>
			   </tr>
			   <tr>
			     <td colspan="2" align="center"><a href="faith_musics.php">Musics...</a>  <a href="faith_vedio.php">Video...</a></td>
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
  include("include/database.php");
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