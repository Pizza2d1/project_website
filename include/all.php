<?php

function head($css_list) {
    return "
    <head>
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
            $output .= "<link rel='stylesheet' href='/CSS/$css_name.css'>";
        }
    }
    return $output;
}

function navbar() {
return "
<nav class='navbar'>
    <ul>
        <li><a href='/'>Homepage</a></li>
        <li><a href='/project_page/projects/'>Projects</a></li>
        <li><a href='/project_page/certifications/'>Certifications</a></li>
        <div class='dropdown'>
            <button class='dropbtn'>Others
            <i class='fa fa-caret-down'>
            </button>
            <div class='dropdown-content'>
                <a href='/rss/'>RSS blog</a>
                <a href='/teto/'>Kasane Teto</a>
                <a href='/project_page/file_uploading/'>File uploading (testing)</a>
                <a href='/project_page/file_uploading/uploads/checkpoint.php'>File Uploads</a>
            </div>
        </div>
        <div class='navbar-social'><li><a href='/project_page/socials/'>Contact Me!</a></li></div>
    </ul>   
</nav>
";
}
function footer() { # https://stackoverflow.com/questions/4575826/how-to-push-a-footer-to-the-bottom-of-page-when-content-is-short-or-missing
    return "
      <div class='footer'>
        <div class='mw-footer-container' style='color: white;'>
            <footer>
                <ul>
                    <li>This page was last updated on 9/19/25 at 3:09 AM</li>
                    <li>I don't even know how much of this I will continue working on tbh</li>
                </ul>
                <ul>
                    <li><a href='https://en.wikipedia.org/wiki/Terry_A._Davis'>The man, the myth, the legend</a></li>
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
?>
