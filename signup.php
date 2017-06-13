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
			 
			 <li id="signing"><a href="signin.php">Sign In</a></li>
			 <li id="signing"><a href="signup.php">Sign Up</a></li>
		   </ul>
	      </nav>
	   </div>
	  <!--side pages-->
	   <div class="side_page">
	      <form method="post" action="signup.php">
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
	      <form action="signup.php" method="post">
             <table width="350px" border="0px" align="center">
               <tr>
	              <td>User Registration Form</td>
	           </tr>
             </table>
             <table width="350px" border="0px" align="center">
	           <tr>
	             <td>Full Name:</td>
	             <td><input type="text" name="fname" placeholder="Full Name"></td>
	           </tr>
	           <tr>
	             <td>User Name:</td>
	             <td><input type="text" name="username" placeholder="User Name"></td>
	           </tr>
	           <tr>
	              <td>Email:</td>
	              <td><input type="text" name="email" placeholder="Email"></td>
	           </tr>
	           <tr>
	              <td>Password:</td>
	              <td><input type="password" name="password" placeholder="Password"></td>
	           </tr>
               <tr>
	              <td>Address:</td>
	               <td><input type="text" name="address" placeholder="Address"></td>
	           </tr>
	           <tr>
	              <td>Phone No.:</td>
	              <td><input type="text" name="phoneno" placeholder="Phone No"></td>
	           </tr>
	           <tr>
	              <td>Occupation:</td>
	              <td><input type="text" name="occupation" placeholder="Occupation"></td>
	           </tr>
	           <tr>
	             <td>Gender:</td>
	             <td>Male<input type="radio" name="gender" value="male" />Female<input type="radio"  name="gender" value="female" /></td>
	           </tr>
	           <tr>
	              <td></td>
	              <td><input type="submit" value="Sign Up" name="signup"></td>
	           </tr>
	           <tr>
	              <td></td>
	              <td><input type="submit" value="Sign In" name="signin"></td>
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
  include("include/database.php");
  if(isset($_POST["signup"])){
	  $fname=$_POST['fname'];
	  $username=$_POST['username'];
	  $email=$_POST['email'];
	  $password=$_POST['password'];
	  $address=$_POST['address'];
	  $phoneno=$_POST['phoneno'];
	  $occupation=$_POST['occupation'];
	  $gender=$_POST['gender'];
	  #$date=date("d/m/y");
	  $sql="INSERT INTO registration(fname,username,email,password,address,phoneno,occupation,gender,date) VALUES('$fname','$username','$email','$password','$address','$phoneno','$occupation','$gender',NOW())";
	  $result=mysqli_query($con,$sql);
	  if($result){
		  echo "<script>alert('Successfull');</script>";
	  }else{
		  echo "<script>alert('Retry');</script>";
	  }
  }
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