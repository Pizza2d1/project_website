<?php $srv_root = __DIR__;
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}?>

<?php include_once("$srv_root/include/all.php"); ?>   
<?php include_once("$srv_root/include/main_page.php"); ?>   
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Pizza2d1's Webpage</title>
        <link rel="stylesheet" href="/CSS/all.css">
        <link rel="stylesheet" href="/CSS/main_page.css">
        <link rel="icon" href="assets/ALL/android-chrome-512x512.png" type="image/x-icon">
    </head>
    <body>
      <div class="flex-wrapper">
        <h1 style="text-align: center; font-size: 40px; text-decoration: underline;">Pizza2d1's Projects</h1>
        <?php
          echo navbar();
          echo "<br><div class='alert'><h3>If you would like to see more, most of my projects are available on <a href='https://github.com/pizza2d1/'>github</a></div><br>";
          echo project_boxes(99); # Just show everything
        ?>        
      </div>
      <?php echo footer() ?>
    </body>
</html>