<?php $srv_root = __DIR__;
session_start();
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}
include_once("$srv_root/includes/all.php");       

if (!isGranted()) header('location: /');;
if (!is_dir(__DIR__."/UPLOADS/".$_SESSION['username']."_uploads/")) mkdir(__DIR__."/UPLOADS/".$_SESSION['username']."_uploads/", 0755);
if (!is_dir(__DIR__."/UPLOADS/".$_SESSION['username']."_uploads/ENCRYPTED")) mkdir(__DIR__."/UPLOADS/".$_SESSION['username']."_uploads/ENCRYPTED", 0755);
#if (!is_file($_SESSION['username']."_uploads/index.php")) copy("includes/index.php", $_SESSION['username']."_uploads/index.php");
#if (!is_file($_SESSION['username']."_uploads/videos.php")) copy("includes/videos.php", $_SESSION['username']."_uploads/videos.php");
#if (!is_file($_SESSION['username']."_uploads/audios.php")) copy("includes/audios.php", $_SESSION['username']."_uploads/audios.php");
#if (!is_file($_SESSION['username']."_uploads/images.php")) copy("includes/images.php", $_SESSION['username']."_uploads/images.php");
#if (!is_file($_SESSION['username']."_uploads/archives.php")) copy("includes/archives.php", $_SESSION['username']."_uploads/archives.php");
?>

<!DOCTYPE html>
<html lang="en-US">
  <?php echo head(['all']); ?>
  <style>
    form {
      background-color: #f0f0f0;
      padding: 20px;
      border-radius: 8px;
      max-width: 500px;
      margin: 0 auto;
      font-family: sans-serif;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    .selected-file {
      margin-top: 10px;
      font-size: 0.9em;
      color: #555;
    }
  </style>
  <body>
    <?php echo navbar(); ?>
    <form id="uploadForm" method="post" action="upload.php" enctype="multipart/form-data">
      <input type="hidden" name="UPLOAD_IDENTIFIER" value="<?php echo uniqid(); ?>" id="upload_id">
      <label for="file">Select a file to upload:</label>
      <input id="file" type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
      <div class="selected-file" id="selectedFile"></div>
    </form>
    <?php if (isset($_SESSION['upload_name'])) echo $_SESSION['upload_name']." was uploaded"; ?>
    <h3><a href="main.php">Check your current uploads</a></h3>
    <h3>Currently allowed file types:</h3>
    <h3>Images</h3>
    <h4>"JPG", "PNG", "JPEG", "GIF", "WEBM"</h4>
    <h3>Videos</h3>
    <h4>"MP4", "MOV", "MKV", "WEBP"</h4>
    <h3>Audio</h3>
    <h4>"WAV", "MP3", "M4A"</h4>
    <h3>Archive</h3>
    <h4>"ZIP", "GZ", "ISO", "TAR", "7Z"</h4>
    <h3>Upload size is limited to ~10GB</h3>
    <h3>Still working on a good progress bar, I really don't want to learn javascript to do it</h3>


  </body>
</html>