<?php
  include("../include/database.php");
  $id="";
  $eventname="";
  $eventdate="";
  $eventime="";
  function getPosts(){
	  $posts=array();
	  $posts[0]=$_POST['id'];
	  $posts[1]=$_POST['eventname'];
	  $posts[2]=$_POST['eventdate'];
	  $posts[3]=$_POST['eventime'];
	  return $posts;
  } 
  //search
  if(isset($_POST['search'])){
	  $data = getPosts();
	  $search_sql = "SELECT * FROM eventmgmt WHERE id = '$data[0]'";
	  $search_result = mysqli_query($con, $search_sql);
	  if($search_result){
		  if(mysqli_num_rows($search_result)){
			  while($row=mysqli_fetch_array($search_result)){
				   $id=$row['id'];
				   $eventname=$row['eventname'];
				   $eventdate=$row['eventdate'];
				   $eventime=$row['eventime'];
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
	  $delete_sql = "DELETE FROM eventmgmt WHERE id = '$data[0]'";
	  $delete_result = mysqli_query($con, $delete_sql);
	  if($delete_result){
		    echo "<script>alert('Data delted successfully')</script>";
	   }else{
		  echo "<script>alert('Retry again')</script>";
	  }
   }
   //update
   if(isset($_POST['update'])){
	  $data = getPosts();
	  $update_sql = "UPDATE eventmgmt SET id='$data[0]', eventname='$data[1]',eventdate='$data[2]',eventime='$data[3]' WHERE id = '$data[0]'";
	  $update_result = mysqli_query($con, $update_sql);
	  if($update_result){
		    echo "<script>alert('Data updated successfully')</script>";
	   }else{
		  echo "<script>alert('Retry again')</script>";
	  }
   }
   if(isset($_POST['upload'])){
	  $eventname=$_POST['eventname'];
	  $eventdate=$_POST['eventdate'];
	  $eventime=$_POST['eventime'];
	  $sql="INSERT INTO eventmgmt(eventname,eventdate,eventime)VALUES('$eventname','$eventdate','$eventime')";
	  $result=mysqli_query($con,$sql);
	  if($result){
		  echo "<script>alert('Event uploaded successfully');</script>";
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
	      <form method="post" action ="adminpage.php">
		     <table width="350px" border="1px">
			    <tr>
				   <td colspan="2" align="center"><h3>Event Manage Section</h3></td>
				</tr>
				<tr>
				   <td>Event ID:</td>
				   <td><input type="text" name="id" placeholder="Event ID" value="<?php echo $id;?>" /></td>
				</tr>
				<tr>
				  <td>Event Name:</td>
				  <td><input type="text" name="eventname" placeholder="Event Name"  value="<?php echo $eventname;?>"/></td>
				</tr>
				<tr>
				  <td>Event Date</td>
				  <td><input type="text" name="eventdate" placeholder="Event Date"  value="<?php echo $eventdate;?>"/></td>
				</tr>
				<tr>
				  <td>Event Time</td>
				  <td><input type="text" name="eventime" placeholder="Event Time"  value="<?php echo $eventime;?>"/></td>
				</tr>
				<tr>
				  <td colspan="2" align="center">
				      <input type="submit" value="Add Event" name="upload" />
				      <input type="submit" value="Find Event" name="search" />
					  <input type="submit" value="Update Event" name="update" />
				      <input type="submit" value="Delete Event" name="delete" />
				  </td>
				</tr>
			 </table>
		  </form>
		</div>  
	 </div>
  </body>
</html>
