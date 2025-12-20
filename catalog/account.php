<?php
include_once("includes/functions.php");
session_start();

if (!isGranted()) {
  echo "<h2>You are not logged in yet, sending you back to the login screen</h2>";
  header('refresh:3;url=/session/');
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <?php echo head(['all','https://cdn.simplecss.org/simple.css']); ?>
    <body>

    <?php 
  if (isGranted()) {
    echo navbar();
    echo "<h1>Hello ".$_SESSION['username']."</h1>";
  }
    ?>
    </body>
</html>
