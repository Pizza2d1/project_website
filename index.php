<?php include_once("include/main_page.php"); ?>        
<?php include_once("include/all.php"); ?>        
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Pizza2d1's Webpage</title>
        <link rel="stylesheet" href="/CSS/all.css">
        <link rel="stylesheet" href="/CSS/buttons.css">
        <link rel="stylesheet" href="/CSS/main_page.css">
        <link rel="icon" href="assets/ALL/android-chrome-512x512.png" type="image/x-icon">
    </head>
    <body>
      <div class="flex-wrapper">
        <h1 style="text-align: center; font-size: 40px; text-decoration: underline;">Pizza2d1's Project Page</h1>
        <?php
          echo navbar();
          #echo winamp();
          echo welcome();
          echo project_boxes(3);
        ?>        
      </div>
        
      <?php echo footer() ?>
        
    </body>
</html>