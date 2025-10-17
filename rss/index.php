<?php $srv_root = __DIR__;
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}?>

<?php
include_once("$srv_root/include/all.php");
include_once("includes/functions.php");   
include_once("includes/main.php");   
?>

<!DOCTYPE html>
<html lang="en">
<?php
  echo head(['penis','https://cdn.simplecss.org/simple.css']);
?>
  <body>
<?php
    echo "<h4><a href='/'>Homepage</a></h4>";
    markdownToHtml();
?>
  </body>
</html>


