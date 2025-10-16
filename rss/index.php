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
      if ($file_to_read == "blog1.md") {
        $myfile = fopen("$file_to_read", "r") or die("Unable to open file!");
        $fileContents = fread($myfile,filesize("$file_to_read"));
        echo $Parsedown->text($fileContents);
        continue;
      }
      $myfile = fopen("$file_to_read", "r") or die("Unable to open file!");
      $fileContents = fread($myfile,filesize("$file_to_read"));
      $contentToAdd = $Parsedown->text($fileContents);
      fclose($myfile);
      $blogFilename = parseBlogname($file_to_read);
      $blogFileLocation = updateFile($blogFilename, $contentToAdd);
      echo "<h3><a href='".$blogFileLocation."'>".$blogFilename."</a></h3>";
    };

?>
  </body>
</html>


<?php
function format_toc($content) {
      #$ID_content = str_replace(' ', '_', substr($content, 1));
      $ID_content = str_replace(' ', '_', $content);
      return "<a href='$ID_content'>$content</a>";
}
function parseBlogname($file) {
  $handle = fopen($file, "r");
  if ($handle) {
      $firstLine = fgets($handle); // Read the first line and discard it
      $secondLine = fgets($handle); // Read the second line
  }
  if (str_contains($firstLine,"<h1>")) {
    $newFilename = $secondLine;
    $newFilename = substr($newFilename, 1);
  } else {
    $newFilename = $firstLine;
    $newFilename = substr($newFilename, 3);
  }
  $blogFileName = str_replace(["\n", "\r"], "", $newFilename);
  fclose($handle);
  return $blogFileName;
}
function updateFile($goodName, $content) {
  $newFilename = str_replace(" ", "_", $goodName);
  $newFilename = "./blogs/".$newFilename.".php";
  file_put_contents($newFilename, printToValidHtml($content));
  return $newFilename;
}
function printToValidHtml($content) {
return "
<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Webpage title</title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' href='penis.css'>
    <link rel='stylesheet' href='https://cdn.simplecss.org/simple.css'>
  </head>
  <body>
<h4><a href='../'>Back</a></h4>
".$content."
  </body>
</html>";
}
?>
