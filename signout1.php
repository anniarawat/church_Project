<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo "<script>alert('Sign Out Success full.')</script>";
   header('Refresh: 0; URL = ../index.php');
?>