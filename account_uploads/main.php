<?php $srv_root = __DIR__;
session_start();
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}
include_once("$srv_root/includes/all.php");
include_once("includes/functions.php");

$imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
$videoExtensions = ['mp4', 'mov', 'mkv', 'webm', 'm4v'];
$audioExtensions = ['mp3', 'm4a', 'wav'];
$archiveExtensions = ['iso', 'tar', 'gz', 'zip', '7z'];

// Get all files in the current directory
$files = scandir(__DIR__."/".$_SESSION['username']."_uploads");

// Filter files that are images
$images = array_filter($files, function ($file) use ($imageExtensions) {
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
return in_array($ext, $imageExtensions);
});
$videos = array_filter($files, function ($file) use ($videoExtensions) {
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
return in_array($ext, $videoExtensions);
});
$audios = array_filter($files, function ($file) use ($audioExtensions) {
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
return in_array($ext, $audioExtensions);
});
$archives = array_filter($files, function ($file) use ($archiveExtensions) {
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
return in_array($ext, $archiveExtensions);
});


?>
<!DOCTYPE html>
<html lang="en">
<?php echo head(['all','uploads']); ?>
<style>
* {
  box-sizing: border-box; /* Ensures width includes padding and border */
}

.info-box {
  width: 250px;           /* Sets a specific width for the box */
  padding: 15px;          /* Space between the content and the border */
  border: 1px solid #ccc; /* A thin, solid gray border */
  margin: 10px;           /* Space outside the box, separating it from other elements */
  background-color: #f9f9f9; /* A light background color */
  border-radius: 5px;     /* Slightly rounded corners for a softer look */
  font-family: sans-serif; /* Readable font */
}

.info-box h3 {
  margin-top: 0;          /* Remove default top margin from the heading */
  font-size: 1.1em;       /* Adjust the title font size */
}

.info-box p {
  margin-bottom: 0;       /* Remove default bottom margin from the paragraph */
  font-size: 0.9em;       /* Adjust the description font size */
  color: #555;            /* Softer color for the description text */
}

</style>
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

        <h1>Videos</h1>
        <div class='gallery'>
            <?php foreach ($videos as $video): ?>
                <h3><?= htmlspecialchars($video) ?></h3>
                <video width=1320 height=720 controls preload=auto>
                    <source src='<?= $_SESSION['username']."_uploads/".htmlspecialchars($video) ?>' type='video/mp4'>
                </video>
            <?php endforeach; ?>
        </div>

        <h1>Audio Lounge</h1>
        <div class='gallery'>
            <?php foreach ($audios as $audio): ?>
                <li><a href='<?= $_SESSION['username']."_uploads/".htmlspecialchars($audio) ?>' download><?= $_SESSION['username']."_uploads/".htmlspecialchars($audio) ?></a></li>
                <audio controls>
                    <source src='<?= $_SESSION['username']."_uploads/".htmlspecialchars($audio) ?>' type='audio/mp3'>
                </audio>
            <?php endforeach; ?>
        </div>

        <h1>Archived Files</h1>
        <div class='gallery'>
            <?php foreach ($archives as $archive): ?>
                <h3><a download href='<?= $_SESSION['username']."_uploads/".htmlspecialchars($archive) ?>'><?= $_SESSION['username']."_uploads/".htmlspecialchars($archive) ?></a></h3>
            <?php endforeach; ?>
        </div>

    <?php else : ?>
      <h3>You're not supposed to be here</h3>
      <?php header("refresh:2;url=/"); ?>
    <?php endif; ?>
</body>
</html>
