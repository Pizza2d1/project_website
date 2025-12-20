<?php
function showArtistBlocks($dir) {
$artists = scandir($dir);
$debug = false;

$music['artists'] = [];
$artists = array_diff($artists, [".", "..", "index.php"]);
$count = 0;
foreach ($artists as $artist) {
    $covers = [];
    if ($debug) {
    echo "<br>";
    echo "A";
    echo "<br>";
    echo "scanning albums: ".$dir."/".$artist;
    echo "<br>";}
    $albums = scandir($dir."/".$artist);
    $albums = array_diff($albums, [".", "..", "index.php"]);
    $music['artists'][] = $artist;
    foreach ($albums as $album) {
        if ($debug) {
        echo "<br>";
        echo "a";
        echo "<br>";
        echo "scanning files: ".$dir."/".$artist."/".$album;
        echo "<br>";
        }
        $files = scandir($dir."/".$artist."/".$album);
        
        $pattern = '/jpg$|png$/';
        $matches = preg_grep($pattern, $files);
        foreach ($matches as $match) if ($match!=null) $covers[$album] = $artist."/".$album."/".$match;

        $music['artists'][$artist][] = $album;
        $files = array_diff($files, [".", "..", "index.php"]);
        foreach ($files as $file) {
            if ($debug) {
            echo "FILE: ".$file;
            echo "<br>";
            }
            $music['artists'][$artist][$album][] = $file;
        }
    }

    if ($count == 0) echo "<div class='block-row'>";
    echo "
      <div class='block-column'>
          <div class='block-card'>
              <h3><a href='".basename($dir)."/$artist'>$artist</h3>
              ";
              echo ($imagey == null) ? "" : "<img src=\"$imagey\" alt='Image not found' width='100%' height='auto'>";
              $keys = array_keys($covers);
              foreach ($keys as $key) echo ($covers[$key] == null) ? "" : "<a href='".basename($dir)."/$artist/$key'><img src=\"$covers[$key]\" alt='Image not found' width='30%' height='auto'></a>";
    echo "
          </div>
      </div>
    ";
    if ($count == 3) {
        echo "</div>";
        $count = 0; 
    } else {
        $count++;
    }
}

}
?>
