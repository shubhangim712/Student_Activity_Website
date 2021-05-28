<?php

session_start();

// Unset all the session variables
$_SESSION = array();

   if(session_destroy())
   {
      header("location: main.php");
   }
   exit;
?>