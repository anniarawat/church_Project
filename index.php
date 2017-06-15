<!doctype html>
<html>
  <head>
     <title>Church Management System</title><!--title of the webpage-->
	 <!--css for index.php pages-->
	 <link type="text/css" rel="stylesheet" href="css/stylesheet_index_pages.css">
	 <style>
        .imageSlider {display:none;}
     </style>
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
			    <td colspan="2">Subscribe</td>
			  </td>
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
		  <div id="request">
		     <h3><a href="userRequest.php">Request</a></h3>
		  </div>
	   </div>
	      
	   <!--body parts-->
	   <div class="main_page_index">
	       <table width="100%" border="0px" align="center">
		     <tr>
			   <td></td>
			   <td>
                <div style="max-width:500px">
                  <img class="imageSlider" src="media/image/img1.jpg" style="width:150%; height:300px">
                  <img class="imageSlider" src="media/image/img2.jpg" style="width:150%; height:300px">
                  <img class="imageSlider" src="media/image/img3.jpg" style="width:150%; height:300px">
                </div>
			  </td>
			  <td></td>
			 </tr>
			</table>
			
			<form method="post" action="index.php">
			  <table width="100%" border="0px">
			     <tr>
				    <td>
					<fieldset >
					    <table width="100%" border="0px">
						    <tr>
							   <td colspan="3" align="center"><h2>Event Management</h2></td>
						    </tr>
							<tr>
							   <td><h3>Event</h4></td>
							   <td><h3>Date</h3></td>
							   <td><h3>Time</h3></td>
						    </tr>
							<?php
			                  include("include/database.php");
				              $sql = "SELECT*FROM eventmgmt";
				              $result=mysqli_query($con,$sql);
				               while($row=mysqli_fetch_array($result)){
			                ?>
							<tr>
			                   <td><?php echo "<b><u>".$row['eventname']."</b></u>" ?></td>
				               <td><?php echo $row['eventdate'] ?></td>
				               <td><?php echo $row['eventime'] ?></td>
			                </tr>
							<?php }?>
						</table>
					</fieldset>
					</td>
					<td>
					<fieldset>
					    <table width="100%" border="0px">
						    <tr>
							   <td colspan="3" align="center"><h2>Appointment</h2></td>
						    </tr>
							<tr>
							   <td><h3>Name</h4></td>
							   <td><h3>address</h3></td>
							   <td><h3>Result</h3></td>
						    </tr>
							<?php
			                  include("include/database.php");
				              $sql = "SELECT*FROM appointmentmgmt";
				              $result=mysqli_query($con,$sql);
				               while($row=mysqli_fetch_array($result)){
			                ?>
							<tr>
			                   <td><?php echo "<b><u>".$row['name']."</b></u>" ?></td>
				               <td><?php echo $row['address'] ?></td>
				               <td><?php echo $row['appointment_result'] ?></td>
			                </tr>
							<?php }?>
						</table>
					</fieldset>
					</td>
				 </tr>
			  </table>
			</form>
	   </div>
	   
	   <!--footer-->
	   <div class="footer_page">
	      <h3 id="footer_home">@Copy Right 2017 Great Commession Church</h3>
	   </div>
	   <script>
        var churchIndex = 0;
        imageSlide();

        function imageSlide() {
              var i;
              var x = document.getElementsByClassName("imageSlider");
            for (i = 0; i < x.length; i++) {
                   x[i].style.display = "none";  
            }
            churchIndex++;
           if (churchIndex > x.length) {churchIndex = 1}    
                  x[churchIndex-1].style.display = "block";  
                  setTimeout(imageSlide, 1000); // Change image every 5 seconds
        }
       </script>
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
  if(isset($_POST['appointment'])){
	  $name=$_POST['name'];
	  $address=$_POST['address'];
	  $phoneno=$_POST['phoneno'];
	  $appointment_sql="INSERT INTO appointmentmgmt(name,address,phoneno,date)VALUES('$name','$address','$phoneno',NOW())";
	  $appointment_result = mysqli_query($con,$appointment_sql);
	  if($appointment_result){
		  echo "<script>alert('Appointment request submited')</script>";
	  }else{
		  echo "<script>alert('Retry again')</script>";
	  }
  }
?>