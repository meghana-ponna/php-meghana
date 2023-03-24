<?php
   session_start();
   unset($_SESSION["Email"]);
   unset($_SESSION["password"]);
   setcookie("Email", "", time()-(60*60*24*7));
   
   echo 'You have loggedout from session';
   header('Refresh: 2; URL = login1.php');
?>