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
			 <li><a href="contact.php">Contact Us</a></li>
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
	   <div class="main_page">
	      <h1>About US</h1> <br>
		  <h2>Welcome to Great Commission Church </h2><br>
 
          <p>It is indeed our great privilege and honor 
             from the Lord to become His lovely bride and stable tool for bringing glory to 
             Him by worshiping in spirit and truth and fulfilling His divine will here on earth.
		  </p><br>

 
          <p>This is the church where all God’s children worship Him and serve one another in unity 
			 and love with a great heart for becoming the blessings for the communities they are living in.
			 This is the church established by God himself upon the rock (Jesus and His unfailing word, the Bible) 
			 to become a hope for the nations by spreading good news of salvation and also to become channel of 
			 blessings by sowing the love of God in the lives of all people regardless of their genders, 
			 color of their skin, background and their geographical boundaries. 
		  </p><br>

 
          <p>This is where, in His holy and mighty name, the hopeless finds hope, 
             sinners find the way to be cleansed, captives find the way of freedom,the tears will are wiped away,
             one with hunger and thirst is satisfied with living bread and water of life,the sick will be made healed,
             the lonely will find true friends,the weak is made strong,the depressed finds a real joy and peace,the poor 
             enjoys the blessings of God,and all of those who are weary and heavy laden will get rest.
		  <p><br>

 
          <p>Therefore this is the place everyone should be and meet someone who created us, 
             loved us unconditionally ,died for our sins, resurrected for our victory and is with us forever. 
             His name is Jesus Christ.
		  </p><br>
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