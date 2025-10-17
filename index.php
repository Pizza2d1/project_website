<?php include_once("include/main_page.php"); ?>        
<?php include_once("include/all.php"); ?>        
<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all', 'buttons', 'main_page']); ?>
    <body>
      <h1 style="text-align: center; font-size: 40px; text-decoration: underline;">Pizza2d1's Project Page</h1>
        <?php
          echo navbar();
          #echo winamp();
          echo welcome();
          echo project_boxes(3);
          echo footer();
        ?>        
    </body>
</html>
