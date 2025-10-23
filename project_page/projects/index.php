<?php $srv_root = __DIR__;
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}?>

<?php include_once("$srv_root/include/all.php"); ?>   
<?php include_once("$srv_root/include/main_page.php"); ?>   
<!DOCTYPE html>
<html lang="en-US">
<?php echo head(['all','main_page'])?>
    <body>
        <h1 style="text-align: center; font-size: 40px; text-decoration: underline;">Pizza2d1's Projects</h1>
        <?php
          echo navbar();
          echo github_advert();
          echo project_boxes(99); # Just show everything
          echo footer()
          
        ?>
    </body>
</html>