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
	     <h1 id="heading"><a href="adminsignin.php">Church Management System</a></h1>
	   </header>
	   
	   <!--navigation bar-->
	   <div>
	     <nav id="nav_page">
	       <ul>
		     <li><a href="../index.php">Home</a></li>
			 <li><a href="../about.php">About Us</a></li>
			 <li><a href="../faith.php">Faith Formation</a></li>
			 <li><a href="../contact.php">Contact Us</a></li>
			 <li id="signing"><a href="../signin.php">Sign In</a></li>
			 <li id="signing"><a href="../signup.php">Sign Up</a></li>
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
	   <div class="main_page">
           <form action="adminsignin.php" method="post">
		      <table width="350" border="0" align="center">
			    <tr>
				   <td><h3>Admin Login Pages<h3></td>
				</tr>
			  </table>
              <table width="350" border="0" align="center">
	            <!--<tr>
				  <td>Name:</td>
				  <td><input type="text" name="name" placeholder="Name" /></td>
				</tr>-->
				<tr>
				  <td>User Name:</td>
				  <td><input type="text" name="username" placeholder="User Name" /></td>
				</tr>
				<tr>
				  <td>Password:</td>
				  <td><input type="password" name="password" placeholder="Password" /></td>
				</tr>
				<!--
				<tr>
				  <td>Email:</td>
				  <td><input type="text" name="email" placeholder="User Name" /></td>
				</tr>-->
				<tr>
				  <td></td>
				  <td><input type="submit" name="adminlogin" value="Admin Login" /></td>
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
  include("../include/database.php");
  if(isset($_POST['adminlogin'])){
	  $username=$_POST['username'];
	  $password=$_POST['password'];
	  $sql = "SELECT*FROM admin WHERE  username='$username' AND password='$password'";
	  $result = mysqli_query($con,$sql);
	  if(mysqli_fetch_array($result)){
		  echo "<script>alert('Login Successful');
		        window.location.replace('adminpage.php');
		  </script>";
	  }else{
		  echo "<script>alert('Retry again')</script>";
	  }
  }
?>

<?php
  session_start();
  include("../include/database.php");
  if(isset($_POST['subscribe'])){
	  $username=$_POST['username'];
	  $password=$_POST['password'];
	  $subscribe=$_POST['subscribe'];
	  $sql = "SELECT*FROM registration WHERE name='$name' AND username='$username' AND password='$password' email='$email' ";
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