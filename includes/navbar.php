<?php
function navbar() {
  if (!isGranted()) {
    return "
<nav class='navbar'>
    <ul>
        <li><a href='/'>Homepage</a></li>
        <li><a href='/project_page/projects/'>Projects</a></li>
        <li><a href='/project_page/certifications/'>Certifications</a></li>
        <li><a href='/shows/'>Shows</a></li>
        <div class='dropdown'>
            <button class='dropbtn'>Others
            <i class='fa fa-caret-down'>
            </button>
            <div class='dropdown-content'>
                <a href='/rss/'>RSS blog</a>
                <a href='/teto/'>Kasane Teto</a>
            </div>
        </div>
        <div class='navbar-right'><li><a href='/login.php'>Login</a></li></div>
    </ul>   
</nav>";
  } else {
    return "
<nav class='navbar'>
    <ul>
        <li><a href='/'>Homepage</a></li>
        <li><a href='/project_page/projects/'>Projects</a></li>
        <li><a href='/project_page/certifications/'>Certifications</a></li>
        <li><a href='/shows/'>Shows</a></li>
        <div class='dropdown'>
            <button class='dropbtn'>Others
            <i class='fa fa-caret-down'>
            </button>
            <div class='dropdown-content'>
                <a href='/rss/'>RSS blog</a>
                <a href='/teto/'>Kasane Teto</a>
                <a href='/project_page/file_uploading/'>File uploading (testing)</a>
                <a href='/project_page/file_uploading/uploads/'>File Uploads</a>
            </div>
        </div>
        <div class='dropdown'>
            <button class='dropbtn'>Hello ".$_SESSION["username"]."
            <i class='fa fa-caret-down'>
            </button>
            <div class='dropdown-content'>
                <a href='/account.php'>Profile</a>
                <a href='/account_uploads'>Personal File Uploading</a>
                <a href='/account_uploads/main.php'>Personal File Drive</a>
            </div>
        </div>
        <div class='navbar-right'><li><a href='/logout.php'>Logout</a></li></div>
    </ul>   
</nav>";
  }
}
?>
