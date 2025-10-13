<?php $srv_root = __DIR__;
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}?>
<?php include_once("$srv_root/include/all.php"); ?>
<?php include_once("include/socials.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all', 'socials']); ?>
    <body>
      <div class="flex-wrapper">
        <h1 style="text-align: center; font-size: 40px; text-decoration: underline;">Pizza2d1's Project Page</h1>
        <?php 
        echo navbar();
        echo project_boxes();      
        echo "<br><br><br><br><br>";
        echo footer()
        ?>
      </div>
    </body>
</html>
