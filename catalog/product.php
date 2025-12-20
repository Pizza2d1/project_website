<?php
include_once("includes/functions.php");
session_start();
$item_number = (isset($_GET['item_number'])) ? $_GET['item_number'] : "";
$amount = (isset($_POST['amount'])) ? $_POST['amount'] : "";
[$names, $descriptions, $images, $prices] = getProductsSql();
$names_v = array_values($names);
$images_v = array_values($images);
$descriptions_v = array_values($descriptions);
$cart_add = (isset($_POST['amount'])) ? "Added ".$amount." of ".$names_v[$item_number] : "";
$provide_links = false;
?>

<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all', 'blocks']); ?>
    <body>
      <h1 style="text-align: center; font-size: 40px; text-decoration: underline;"><?= $names_v[$item_number] ?></h1>
    <?php echo navbar(); ?>
    <br><br>

<?php    
$count = 0;
$total = count($names);
$provide_links = false;
for ($i=0; $i<$total; $i++) {
    if ($count == 0) {
        echo "<div class='block-row'>";
        echo show_product($i,$provide_links,true);
        $count++;
    } elseif ($count != 3 && $count+1 != $total) {
        echo show_product($i,$provide_links,true);
        $count++;
    } else {
        echo show_product($i,$provide_links,true);
        echo "</div>";
        $count = 0; 
    }
    #if ($count == 3 || $count+1 == $total) {
    #    echo show_product($i,$provide_links,true);
    #    echo "</div>";
    #    $count = 0; 
    #    echo "<div class='block-row'>";
    #} else {
    #    echo show_product($i,$provide_links,true);
    #    $count++;
    #}
}
?>



    <?php 
    
    echo show_product($item_number,$provide_links);
    echo $cart_add;
    ?>
    </body>
</html>
