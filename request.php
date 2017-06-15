<?php
  include("../include/database.php");
  $id="";
  $fname="";
  $email="";
  function getPosts(){
	  $posts=array();
	  $posts[0]=$_POST['id'];
	  $posts[1]=$_POST['fname'];
	  $posts[2]=$_POST['email'];
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
?>
<!doctype html>
<html>
  <head>
     <title>Church Management System</title><!--title of the webpage-->
	 <!--css for index.php pages-->
	 <link type="text/css" rel="stylesheet" href="../css/stylesheet_admin.css">
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
			 <li id="signing"><a href="../include/logout.php">Sign Out</a></li>
		   </ul>
	      </nav>
	   </div>
	   
	   <!--side pages-->
	   <div class="side_page">
	      <div id="side_admin">
		    <ul>
		      <li><a href="adminpage.php">Manage Event</a></li>
			  <li><a href="request.php">Manage Request</a></li>
			  <li><a href="subscription.php">View Subscription</a></li>
			  <li><a href="viewuser.php">View User</a></li>
			  <li><a href="appointment.php">Priest Appointment</a></li>
		    </ul>
		  </div>
	   </div>
	   
	   <!--body parts-->
	   <div class="main_page">
	      <form method="post" action ="request.php">
		     <table width="350px" border="1px">
			    <tr>
				   <td colspan="2" align="center"><h3>User Request Delete Section</h3></td>
				</tr>
				<tr>
				   <td>User ID:</td>
				   <td><input type="text" name="id" placeholder="User ID" value="<?php echo $id;?>" /></td>
				</tr>
				<tr>
				  <td>Name:</td>
				  <td><input type="text" name="fname" placeholder="Full Name"  value="<?php echo $fname;?>"/></td>
				</tr>
				<tr>
				  <td>Email</td>
				  <td><input type="text" name="email" placeholder="Email"  value="<?php echo $email;?>"/></td>
				</tr>
				<tr>
				  <td colspan="2" align="center">
				      <input type="submit" value="Find Event" name="search" />
					  <input type="submit" value="Delete Event" name="delete" />
				  </td>
				</tr>
			 </table>
		  </form><br><br><br>
	      <form method="post" action="request.php">
		     <table width="100%" border="1px">
			     <tr>
				     <td colspan="8" align="center"><h3>Request Management Section</h3></td>
				 </tr>
			     <tr>
				    <td>Name</td>
					<td>Email</td>
					<td>Address</td>
					<td>Phone No.</td>
					<td>About</td>
					<td>Gender</td>
					<td>Date</td>
				 </tr>
			     <?php
				      include("../include/database.php");
				      $sql = "SELECT*FROM requestmgmt";
				      $result = mysqli_query($con,$sql);
				      while($row=mysqli_fetch_array($result)){
				 ?>
				<tr>
			      <td><?php echo $row['fname']?></td>
			      <td><?php echo $row['email']?></td>
			      <td><?php echo $row['address']?></td>
			      <td><?php echo $row['phoneno']?></td>
				  <td><?php echo $row['about']?></td>
				  <td><?php echo $row['gender']?></td>
				  <td><?php echo $row['date']?></td>
				  <td><?php echo ""; ?></td>
			    </tr>
				<?php } ?>
			 </table>
		  </form>
	   </div>
	 </div>
  </body>
</html>