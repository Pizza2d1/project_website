<?php $srv_root = __DIR__;
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}?>
<?php include_once("$srv_root/include/all.php"); ?>        
<?php 
if (!is_dir('./uploads')) {
    mkdir('./uploads', 0766);
}
?>

<!DOCTYPE html>
<html lang="en-US">
  <?php echo head(['all']); ?>
  <body>
    <div 'class=centered;'>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
    </form>
    </div>
    <h3>Currently only JPG, JPEG, PNG, GIF, and WEBM files are allowed.(images basically)</h3>
  </body>
</html>
