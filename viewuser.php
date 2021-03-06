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
	     <table width="100%" border="1">
	        <tr>
			   <td colspan="10" align="center"><h3>View Users</h3></td>
			</tr>
    		<tr>
			  <td>S.N.</td>
			  <td>Name</td>
			  <td>Username</td>
			  <td>Email</td>
			  <td>Password</td>
			  <td>Address</td>
			  <td>Phone No.</td>
			  <td>Occupation</td>
			  <td>Gender</td>
			  <td>Date</td>
			</tr>
			<?php 
		     include("../include/database.php");
			 $sql = "SELECT*FROM registration";
			 $result =mysqli_query($con,$sql);
			 while($row=mysqli_fetch_array($result)){
		   ?>
			<tr>
			  <td><?php echo $row['id']?></td>
			  <td><?php echo $row['fname']?></td>
			  <td><?php echo $row['username']?></td>
			  <td><?php echo $row['email']?></td>
			  <td><?php echo $row['password']?></td>
			  <td><?php echo $row['address']?></td>
			  <td><?php echo $row['phoneno']?></td>
			  <td><?php echo $row['occupation']?></td>
			  <td><?php echo $row['gender']?></td>
			  <td><?php echo $row['date']?></td>
			</tr>
			<?php
			 }
			 ?>
		  <table>
	   </div>
	      
	 </div>
  </body>
</html>