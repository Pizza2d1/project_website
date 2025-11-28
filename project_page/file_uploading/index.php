<?php $srv_root = __DIR__;
session_start();
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}?>
<?php include_once("$srv_root/includes/all.php"); ?>        
<?php 
if (!is_dir('./uploads')) {
    mkdir('./uploads', 0766);
}
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
    <h3>Currently only JPG, JPEG, PNG, GIF, and WEBM files are allowed. (images basically)</h3>
    <h3>1 GB file upload limit per file, unless you are logged in in which case you can upload 10GB files</h3>
    <h3>Still working on a good progress bar, I really don't want to learn javascript to do it</h3>
    <br><br><br>
    <div 'class=centered;'>
    <form id="uploadForm" method="post" action="upload.php" enctype="multipart/form-data">
      <input type="hidden" name="UPLOAD_IDENTIFIER" value="<?php echo uniqid(); ?>" id="upload_id">
      <label for="file">Select a file to upload:</label>
      <input id="file" type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
      <div class="selected-file" id="selectedFile"></div>
    </form>
    </div>


  </body>
</html>


