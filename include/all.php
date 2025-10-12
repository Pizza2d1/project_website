<?php
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
function navbar() {
return "
<nav class='navbar'>
    <ul>
        <li><a href='/'>Homepage</a></li>
        <li><a href='/project_page/projects/'>Projects</a></li>
        <li><a href='/project_page/certifications/'>Certifications</a></li>
        <li><a href='/project_page/socials/'>Socials</a></li>
    </ul>
</nav>
";
}
?>