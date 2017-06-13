<?php 
	session_start();
	include("include/database.php");
	$id = $_POST['id'];
	$id = $_GET['id'];
	$query ="DELETE*FROM eventmgmt WHERE id = '$id'";
	$result = mysqli_query($con,$query);
    if($result){
	}else{
	}
 ?>