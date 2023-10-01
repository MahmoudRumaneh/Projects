<?php 
  session_start();
  session_destroy();
  
  // Ensure that the browser doesn't cache the page
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  
  // Redirect to the home page
  header("Location: index.php");
  exit();
