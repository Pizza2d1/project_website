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
    #$printString = "";
    #foreach ($mdFiles as $file_to_read) {
    #  $lines = file($file_to_read);//file in to an array
    #  $first_line = $lines[0];
    #  $second_line = $lines[1];
    #  if (substr($first_line, 0, 2) == "##") {
    #      $printString = str_replace('##', '', $first_line);
    #  } else {
    #      $printString = $second_line; 
    #  };
    #  echo format_toc($printString);
    #};
    
    require_once 'Parsedown.php';
    #require_once 'vendor/erusev/parsedown/Parsedown.php';
    #require_once 'vendor/caseyamcl/toc/src/HtmlHelper.php';
    #require_once 'vendor/caseyamcl/toc/src/TocGenerator.php';
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
