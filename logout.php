<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo "<script>alert('Welcome to Home page')</script>";
   header('Refresh: 0; URL = ../index.php');
?>