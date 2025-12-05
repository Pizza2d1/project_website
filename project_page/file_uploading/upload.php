<?php
$srv_root = __DIR__;
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}
include_once("$srv_root/includes/all.php");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    #echo "File is not an image.";
    #$uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists. Name: ".$_FILES["fileToUpload"]["name"];
  $uploadOk = 0;
}

// Check file size
#if (!isGranted()) {
#  if ($_FILES["fileToUpload"]["size"] > 10000000) { // 10 GB
#    echo "Sorry, your file is too large.";
#    $uploadOk = 0;
#  }
#} else {
#  if ($_FILES["fileToUpload"]["size"] > 100000000) { // 10 GB
#    echo "Sorry, your file is too large.";
#    $uploadOk = 0;
#  }
#} 

// Allow certain file formats
$image_ext = array("jpg", "png", "jpeg", "gif", "webm"); 
$video_ext = array("mp4", "mov", "mkv", "webp"); 
$audio_ext = array("wav", "mp3", "m4a"); 
$archive_ext = array("zip", "gz", "iso", "tar", "7z"); 
if(in_array($imageFileType, $image_ext)) {
  echo "Your image was processed";
} elseif (in_array($imageFileType, $video_ext)) {
  echo "Your video was processed";
} elseif (in_array($imageFileType, $audio_ext)) {
  echo "Your audio was processed";
} elseif (in_array($imageFileType, $archive_ext)) {
  echo "Your archive file was processed";
} else {
  echo "Your file extension ".$imageFileType." was not allowed";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  echo $_FILES["fileToUpload"]["size"];
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<h1 style='text-align:center;'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</h1>";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>

<br>
<h1 style='text-align:center;'><a href="./uploads/">Check current uploads</a></h1>
