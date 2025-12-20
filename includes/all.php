<?php
session_start();
include_once('navbar.php');

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
        } elseif ($css_name[0] == ".") {
            $output .= "<link rel='stylesheet' href='css/".substr($css_name, 1).".css'>";
        } else {
            $output .= "<link rel='stylesheet' href='/CSS/$css_name.css'>";
        }
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
function winamp() {
  return "
  <div id='winamp-container'></div>
  <script src='https://unpkg.com/webamp@1.4.0/built/webamp.bundle.min.js'></script>
  <script src='/js/webamp.js'></script>";
}

function create_profile_dirs() {
    if (!is_dir("/account_uploads/".$_SESSION['username']."_uploads/")) mkdir("/account_uploads/".$_SESSION['username']."_uploads/", 0766);
}
?>
