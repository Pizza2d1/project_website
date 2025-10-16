<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Webpage title</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="penis.css">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
  </head>
  <body>
<?php

    $mdFiles = glob("*.md"); 
    
    require_once 'Parsedown.php';
    $Parsedown = new Parsedown();
    $allBlogText = "";
    foreach ($mdFiles as $file_to_read) {
      $myfile = fopen("$file_to_read", "r") or die("Unable to open file!");
      $fileContents = fread($myfile,filesize("$file_to_read"));
      fclose($myfile);
      $allBlogText .= $Parsedown->text($fileContents);
    };

    echo $allBlogText;

?>
  </body>
</html>
<?php
    function format_toc($content) {
          #$ID_content = str_replace(' ', '_', substr($content, 1));
          $ID_content = str_replace(' ', '_', $content);
          return "<a href='$ID_content'>$content</a>";
    }
?>
