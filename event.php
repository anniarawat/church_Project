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
	      <form method="post" action="event.php">
		     <table width="500px" border="1px">
			    <tr>
				  <td>Event Name</td>
				  <td><input type="text" name="eventname" placeholder="Event Name" /></td>
				</tr>
				<tr>
				  <td>Event Date</td>
				  <td><input type="text" name="eventdate" placeholder="Event Date" /></td>
				</tr>
				<tr>
				  <td>Event Time</td>
				  <td><input type="text" name="eventime" placeholder="Event Time" /></td>
				</tr>
				<tr>
				  <td></td>
				  <td><input type="submit" name="upload" value="Upload Event" /></td>
				</tr>
			 </table>
		  </form>
	   </div>
	   
	   <!--footer-->
	   <div class="footer_page">
	      
	   </div>
	   
	 </div>
  </body>
</html>