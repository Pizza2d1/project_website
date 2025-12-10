<?php $srv_root = __DIR__;
session_start();
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}
include_once("$srv_root/includes/all.php");

?>
<?php 
function display_options() {
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
    $videoExtensions = ['mp4', 'mov', 'mkv', 'webm', 'm4v'];
    $audioExtensions = ['mp3', 'm4a', 'wav'];
    $archiveExtensions = ['iso', 'tar', 'gz', 'zip', '7z'];
    
    $files = scandir($_SESSION['username']."_uploads");
    
    $images = count(array_filter($files, function ($file) use ($imageExtensions) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, $imageExtensions);
    }));
    $videos = count(array_filter($files, function ($file) use ($videoExtensions) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, $videoExtensions);
    }));
    $audios = count(array_filter($files, function ($file) use ($audioExtensions) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, $audioExtensions);
    }));
    $archives = count(array_filter($files, function ($file) use ($archiveExtensions) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, $archiveExtensions);
    }));

    echo "
    <nav class='navbar'>
        <ul>
            <li><a href='main.php'>All</a></li>
            <li><a href='images.php'>Images: ".$images."</a></li>
            <li><a href='videos.php'>Videos: ".$videos."</a></li>
            <li><a href='audios.php'>Audio: ".$audios."</a></li>
            <li><a href='archives.php'>Archives: ".$archives."</a></li>
        </ul>   
    </nav>";


}
function display_images() {
echo "
    <h1>Image Gallery</h1>
    <div class='gallery'>
        <?php foreach (\$images as \$image): ?>
            <a href='<?= htmlspecialchars(\$image) ?>'><img src='<?= htmlspecialchars(\$image) ?>' alt='<?= htmlspecialchars(\$image) ?>'></a>
        <?php endforeach; ?>
    </div>
";
}
function display_videos() {
echo "
    <h1>Videos</h1>
    <div class='gallery'>
        <?php foreach (\$images as \$image): ?>
            <h3><?= htmlspecialchars(\$image) ?></h3>
            <video width=1320 height=720 controls preload=auto>
                <source src='<?= htmlspecialchars(\$image) ?>' type='video/mp4'>
            </video>
        <?php endforeach; ?>
    </div>
";
}
function display_audios() {
echo "
    <h1>Audio Lounge</h1>
    <div class='gallery'>
        <?php foreach (\$images as \$image): ?>
            <li><a href='<?= htmlspecialchars(\$image) ?>' download><?= htmlspecialchars(\$image) ?></a></li>
            <audio controls>
                <source src='<?= htmlspecialchars(\$image) ?>' type='audio/mp3'>
            </audio>
        <?php endforeach; ?>
    </div>
";
}
function display_archives() {
echo "
    <h1>Archived Files</h1>
    <div class='gallery'>
        <?php foreach (\$images as \$image): ?>
            <h3><a download href='<?= htmlspecialchars(\$image) ?>'><?= htmlspecialchars(\$image) ?></a></h3>
        <?php endforeach; ?>
    </div>
";
}

?>
