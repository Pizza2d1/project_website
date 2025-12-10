<?php $srv_root = __DIR__;
$slash_count = substr_count($srv_root, '/');
for ($i = 3; $i < $slash_count; $i++) {$srv_root = dirname($srv_root);}
include_once("$srv_root/includes/all.php");
include_once("../includes/functions.php");
include_once("../includes/audio_func.php");

$audioExtensions = ['mp3', 'm4a', 'wav'];


?>

<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all','main_page']);?>
    <body>
    <?php echo navbar(); ?>
        <h1>Audio Lounge</h1>
        <div class='gallery'>
            <?php showArtistBlocks(__DIR__); ?>
        </div>

    </body>
</html>


<?php
#function sort_by_type($a, $b) {
#    $is_a_array = is_array($a);
#    $is_b_array = is_array($b);
#
#    if ($is_a_array === $is_b_array) {
#        return 0; 
#    }
#    return $is_a_array ? 1 : -1;
#}
#
#print_r($music);
##usort($music['artists'], 'sort_by_type');
#foreach ($music['artists'] as $a) {
#    if (is_array($a)) {
#    foreach ($a as $b) {
#        if (is_array($b)) {
#            $pattern = '/jpg$|png$/';
#            $matches = preg_grep($pattern, $b);
#            if ($debug) {
#            #print_r($matches);
#            #echo "<br>";
#            #foreach ($matches as $match) if ($match!=null) echo $match;
#            #echo "<br>";
#            }
#            foreach ($b as $c) {
#                if (is_array($c)) continue;
#                if ($debug) {
#                echo $c;
#                echo "<br>";
#                }
#            }   continue;
#        }
#        echo "
#            <div class='prog_about'><h4>$b</h4></div>
#        ";
#        }   continue;
#    }
#    echo "
#            </div>
#        </div>
#    </div>
#    ";
#
#    if ($debug) {
#    echo $a;
#    echo "<br>";
#    }
?>
