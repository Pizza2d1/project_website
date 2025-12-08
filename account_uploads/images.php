<?php $srv_root = __DIR__;
session_start();
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}
include_once("$srv_root/includes/all.php");
include_once("includes/functions.php");
// Define allowed image extensions
$imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

// Get all files in the current directory
$files = scandir(__DIR__."/".$_SESSION['username']."_uploads");

// Filter files that are images
$images = array_filter($files, function ($file) use ($imageExtensions) {
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
return in_array($ext, $imageExtensions);
});
?>
<!DOCTYPE html>
<html lang="en">
<?php echo head(['all','uploads']); ?>
<body>
    <?php echo navbar(); ?>
    <?php if (isGranted()) : ?>
      <?php display_options(); ?>
          <h1>Image Gallery</h1>
          <div class='gallery'>
              <?php foreach ($images as $image): ?>
                  <a href='<?= $_SESSION['username']."_uploads/".htmlspecialchars($image) ?>'><img src='<?= $_SESSION['username']."_uploads/".htmlspecialchars($image) ?>' alt='<?= $_SESSION['username']."_uploads/".htmlspecialchars($image) ?>'></a>
              <?php endforeach; ?>
          </div>
    <?php else : ?>
      <h3>You're not supposed to be here</h3>
      <?php header("refresh:2;url=/"); ?>
    <?php endif; ?>
</body>
</html>
