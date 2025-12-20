<?php
include_once("includes/main_page.php");
include_once("includes/sql_functions.php");
include_once("includes/functions.php");
session_start();
[$names, $descriptions, $images, $prices] = getProductsSql();
$images_v = array_values($images);
$names_v = array_values($names);
$descriptions_v = array_values($descriptions);
$prices_v = array_values($prices);
?>
<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all', 'blocks']); ?>
    <body>
    <?php echo navbar(); ?>

<?php    
$count = 0;
$total = count($names);
for ($i=0; $i<$total; $i++) {
    $post_name = str_replace(" ", "_", $names_v[$i]);
    $change_name = str_replace(" ", "_", $names[$i+1].'change');
    if (isset($_POST[$change_name])) {$catch_change = $_POST[$change_name];} else $catch_change = "";
    if ($count == 0) echo "<div class='block-row'>";
    echo "
      <div class='block-column'>
          <div class='block-card'>
                <h3>".$names_v[$i]."</h3>
                <h3>".$images_v[$i]."</h3>
                <h3>".$descriptions_v[$i]."</h3>
                <form class='login-form' id='loginForm' novalidate, action='catalog.php', method='post'>
                    <input type='count' name='".$post_name."' value='0'>
                    <input type='submit'>
                </form>
          </div>
      </div>
    ";

    if ($count == 3 || $count+1 == $total) {
        echo "</div>";
        $count = 0; 
    } else {
        $count++;
    }
}
?>

    </body>
</html>

<?php # header('location: catalog.php'); ?>
