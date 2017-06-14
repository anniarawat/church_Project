<?php
  include("database.php");
  $id="";
  $fname="";
  $email="";
  $address="";
  $phoneno="";
  $about="";
  $gender="";
  function getPosts(){
	  $posts=array();
	  $posts[0]=$_POST['id'];
	  $posts[1]=$_POST['fname'];
	  $posts[2]=$_POST['email'];
	  $posts[3]=$_POST['address'];
	  $posts[4]=$_POST['phoneno'];
	  $posts[5]=$_POST['about'];
	  $posts[6]=$_POST['gender'];
	  return $posts;
  } 
  //search
  if(isset($_POST['search'])){
	  $data = getPosts();
	  $search_sql = "SELECT * FROM requestmgmt WHERE id = '$data[0]'";
	  $search_result = mysqli_query($con, $search_sql);
	  if($search_result){
		  if(mysqli_num_rows($search_result)){
			  while($row=mysqli_fetch_array($search_result)){
				   $id=$row['id'];
				   $fname=$row['fname'];
				   $email=$row['email'];
				   $address=$row['address'];
				   $phoneno=$row['phoneno'];
				   $about=$row['about'];
				   $gender=$row['gender'];
			  }
		  }else{
			  echo "<script>alert('No data')</script>";
		  }
	  }else{
		  echo "<script>alert('Error')</script>";
	  }
   }
   //delete
   if(isset($_POST['delete'])){
	  $data = getPosts();
	  $delete_sql = "DELETE FROM requestmgmt WHERE id = '$data[0]'";
	  $delete_result = mysqli_query($con, $delete_sql);
	  if($delete_result){
		    echo "<script>alert('Data delted successfully')</script>";
	   }else{
		  echo "<script>alert('Retry again')</script>";
	  }
   }
   //insert data
   if(isset($_POST['request'])){
	  $fname=$_POST['fname'];
	  $email=$_POST['email'];
	  $address=$_POST['address'];
	  $phoneno=$_POST['phoneno'];
	  $about=$_POST['about'];
	  $gender=$_POST['gender'];
	  $sql="INSERT INTO requestmgmt(fname,email,address,phoneno,about,gender,date)VALUES('$fname','$email','$address','$phoneno','$about','$gender',NOW())";
	  $result=mysqli_query($con,$sql);
	  if($result){
		  echo "<script>alert('Request uploaded successfully');</script>";
	  }else{
		  echo "<script>alert('Retry Again');</script>";
	  }
  }
?>
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
	      <form method="post" action="userRequest1.php">
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
	   <div class="main_page_index">
	      <form action="userRequest1.php" method="post">
  <table width="350" border="0" align="center">
     <tr>
	    <td>Prayer Request Form</td>
	 </tr>
  </table>
  <table width="350" border="0" align="center">
    <tr>
	  <td>Request ID:</td>
	  <td><input type="text" name="id" placeholder="Request ID" value="<?php echo $id;?>"></td>
	</tr>
	<tr>
	  <td>Full Name:</td>
	  <td><input type="text" name="fname" placeholder="Full Name" value="<?php echo $fname;?>"></td>
	</tr>
	<tr>
	  <td>Email:</td>
	  <td><input type="text" name="email" placeholder="Email"  value="<?php echo $email;?>"></td>
	</tr>
	<tr>
	  <td>Address:</td>
	  <td><input type="text" name="address" placeholder="Address" value="<?php echo $address;?>"></td>
	</tr>
	<tr>
	  <td>Phone No.:</td>
	  <td><input type="text" name="phoneno" placeholder="Full Name" value="<?php echo $phoneno;?>"></td>
	</tr>
	<tr>
	  <td>About</td>
	  <td><textarea type="text" name="about" placeholder="Type your request"  value="<?php echo $about;?>"></textarea></td>
	</tr>
	<tr>
	  <td>Gender:</td>
	  <td>Male<input type="radio" name="gender" value="male">Female<input type="radio"  name="gender" value="female"  value="<?php echo $gender;?>"></td>
	</tr>
	<tr>
	  <td colspan="2" align="center">
	      <input type="submit" value="Submit Request" name="request">
	      <input type="submit" value="Find Request" name="search">
		  <input type="submit" value="Delte Request" name="delete">
	  </td>
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

