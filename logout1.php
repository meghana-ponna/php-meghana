<?php
   session_start();
   unset($_SESSION["Email"]);
   unset($_SESSION["password"]);
   
   echo 'You have loggedout from session';
   header('Refresh: 2; URL = login1.php');
?>