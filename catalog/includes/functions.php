<?php
include_once("sql_functions.php");
session_start();

function show_product($item_id, $has_link, $sectioned) {
  [$names, $descriptions, $images, $prices] = getProductsSql();
  $images_v = array_values($images);
  $names_v = array_values($names);
  $descriptions_v = array_values($descriptions);
  $prices_v = array_values($prices);
  if (count($names) < $item_id) {
    return "Value too high";
  }
  
  $output="";

  if ($sectioned) {
    $output .= "
      <div class='block-column'>
          <div class='block-card'>";
  }
  if ($has_link) {
    $output .= "
                <h3><a href='product.php?item_number=$item_id'>".$names_v[$item_id]."</a></h3>
                <a href='product.php?item_number=$item_id'><img src='img/".($item_id+1).".jpg' width=100%></a>
                <h3><a href='product.php?item_number=$item_id'>".$descriptions_v[$item_id]."</a></h3>
    ";
  } else {
    $output .= "
                <h3>".$names_v[$item_id]."</h3>
                <img src='img/".($item_id+1).".jpg' width=100%>
                <h3>".$descriptions_v[$item_id]."</h3>
                <form action='product.php?item_number=$item_id', method='post'>
			            <input name='amount' value='0'>
                  <input type='submit'>
                </form>
    ";
  }

  if ($sectioned) {
    $output .= "
          </div>
      </div>";
  }

  return $output;
}

function isGranted() {
  if (isset($_SESSION['granted'])) return true;
  return false;
}

function head($css_list) {
    return "
    <head>
        <meta charset='UTF-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <title>Pizza2d1's Webpage</title>
        <link rel='icon' href='/img/favicon.png' type='image/x-icon'>
    " . css_pointers($css_list) . "
    </head>";
}
function css_pointers($css_list) {
    $output = '';
    foreach ($css_list as $css_name) {
        if (str_contains($css_name, 'https:')) {
            $output .= "<link rel='stylesheet' href='$css_name'>";
        } else {
            $output .= "<link rel='stylesheet' href='css/".$css_name.".css'>";
        }
    }
    return $output;
}

function navbar() {
  if (isGranted()) {
    $output = "
<nav class='navbar'>
    <ul>
        <li><a href='/catalog'>Homepage</a></li>
        <li><a href='cart.php'>Cart</a></li>
        <li><a href='product.php'>Products</a></li>
        <div class='navbar-right'>
          <li><a href='logout.php'>Logout</a></li>
          <li><a>Hello ".$_SESSION['username']."</a></li>
        </div>
    </ul>   
</nav>";
  } else {
    $output = "
<nav class='navbar'>
    <ul>
        <li><a href='/catalog'>Homepage</a></li>
        <li><a href='login.php?please=1'>Cart</a></li>
        <li><a href='product.php'>Products</a></li>
        <div class='navbar-right'>
          <li><a href='create-account.php'>Create Account</a></li>
          <li><a href='login.php'>Login</a></li>
        </div>
    </ul>   
</nav>";
  }

return $output;
}

function footer() { # https://stackoverflow.com/questions/4575826/how-to-push-a-footer-to-the-bottom-of-page-when-content-is-short-or-missing
    return "
      <div class='footer'>
        <div class='mw-footer-container' style='color: white;'>
            <footer>
                <ul>
                    <li>This page was last updated on 12/6/25 at 11:17 PM</li>
                    <li>Big plans for this website, it will be a hub of knowledge and joy <div  style='color: red; display:inline'>(jolly </div><div style='color: green; display:inline'>season)</div></li>
                </ul>
                <ul>
                    <li><a href='https://en.wikipedia.org/wiki/Terry_A._Davis'>The man, the myth, the legend</a></li>
                    <li><a href='/project_page/socials/'>Contact Me!</a></li>
                </ul>
            </footer>
        </div>
      </div>
    ";
}

function create_profile_dirs() {
    if (!is_dir("/account_uploads/".$_SESSION['username']."_uploads/")) mkdir("/account_uploads/".$_SESSION['username']."_uploads/", 0766);
}


?>

