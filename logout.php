<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo "<script>alert('Logout')</script>";
   header('Refresh: 0; URL = ../index.php');
?>