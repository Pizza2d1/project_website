<?php
include_once("includes/functions.php");   
include_once("includes/main.php");   
?>

<!DOCTYPE html>
<html lang="en">
<?php
  echo head(['https://cdn.simplecss.org/simple.css']);
?>
  <body>
<?php
    echo "<h4><a href='/'>Homepage</a></h4>";
    markdownToHtml();
?>
  </body>
</html>


