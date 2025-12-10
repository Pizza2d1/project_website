<?php $srv_root = __DIR__;
session_start();
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}
include_once("$srv_root/includes/all.php");
include_once("includes/functions.php");
// Define allowed image extensions
$archiveExtensions = ['iso', 'tar', 'gz', 'zip', '7z'];

// Get all files in the current directory
$files = scandir(__DIR__."/UPLOADS/".$_SESSION['username']."_uploads");

// Filter files that are images
$images = array_filter($files, function ($file) use ($archiveExtensions) {
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
return in_array($ext, $archiveExtensions);
});
?>
<!DOCTYPE html>
<html lang="en">
<?php echo head(['all','uploads']); ?>
<body>
    <?php echo navbar(); ?>
    <?php if (isGranted()) : ?>
        <?php display_options(); ?>
            <h1>Archived Files</h1>
            <div class='gallery'>
                <?php foreach ($images as $image): ?>
                    <h3><a download href='<?= $_SESSION['username']."_uploads/".htmlspecialchars($image) ?>'><?= $_SESSION['username']."_uploads/".htmlspecialchars($image) ?></a></h3>
                <?php endforeach; ?>
            </div>
    <?php else : ?>
      <h3>You're not supposed to be here</h3>
      <?php header("refresh:2;url=/"); ?>
    <?php endif; ?>
</body>
</html>
