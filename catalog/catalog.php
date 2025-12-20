<?php 
include_once("includes/sql_functions.php");
include_once("includes/functions.php");
session_start();
[$names, $descriptions, $images, $prices] = getProductsSql();
if (isset($_GET['item_number'])) echo $_GET['item_number'];
?>

<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all', 'blocks']); ?>
    <body>
    <h1 style="text-align: center; font-size: 40px; text-decoration: underline;">Pizza2d1's Project Page</h1>
    <?php echo navbar(); ?>
<br><br>
<?php
$count = 0;
$total = count($names);
$provide_links = true;
for ($i=0; $i<$total; $i++) {
    if ($count == 0) echo "<div class='block-row'>";

    echo show_product($i,$provide_links);

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
