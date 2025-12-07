<?php
    session_start();
    include_once("includes/all.php");
    include_once("includes/sql_functions.php");
    
    [$emails, $pfps, $abouts, $descriptions, $sites] = getProfilesSql();
    $username = $_SESSION['username'];
    $email = (isset($emails[$username])) ? $emails[$username] : "";
    $pfp = (isset($pfps[$username])) ? $pfps[$username] : "";
    $about = (isset($abouts[$username])) ? $abouts[$username] : "";
    $description = (isset($descriptions[$username])) ? $descriptions[$username] : "";
    $site = (isset($sites[$username])) ? $sites[$username] : "";
    

    $catch_email = (isset($_POST['email'])) ? $_POST['email'] : "";
    $catch_pfp = (isset($_POST['pfp'])) ? $_POST['pfp'] : "";
    $catch_about = (isset($_POST['about'])) ? $_POST['about'] : "";
    $catch_description = (isset($_POST['description'])) ? $_POST['description'] : "";
    $catch_site = (isset($_POST['site'])) ? $_POST['site'] : "";
?>
<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['https://cdn.simplecss.org/simple.css']) ?>

    <h3><a href="/">Homepage</a></h3>
		<form action='create-profile.php' method='post'>	
    <input type='text' name='pfp' placeholder='Profile Picture', value=<?= $pfp ?>>
    <br>
    <input type='text' name='email' placeholder='Email', value=<?= $email ?>>
    <br>
    <input type='text' name='about' placeholder='About', value=<?= $about ?>>
    <br>
    <input type='text' name='description' placeholder='Description', value=<?= $description ?>>
    <br>
    <input type='text' name='site' placeholder='Website', value=<?= $site ?>>
    <br>
    <input type="submit" value="Update Profile" name="submit_button">
    <input type="reset">
		</form>	
    <a href='/account.php'>Profile Page</a>
    <?php
    echo "balls";

    if (isset($_POST['submit_button'])) {
      if (isset($catch_email)) SqlQuery("UPDATE profiles SET email = '".$catch_email."' WHERE username = '".$username."';");
      if (isset($catch_pfp)) SqlQuery("UPDATE profiles SET pfp_image = '".$catch_pfp."' WHERE username = '".$username."';");
      if (isset($catch_about)) SqlQuery("UPDATE profiles SET about = '".$catch_about."' WHERE username = '".$username."';");
      if (isset($catch_site)) SqlQuery("UPDATE profiles SET site = '".$catch_site."' WHERE username = '".$username."';");
      if (isset($catch_description)) SqlQuery("UPDATE profiles SET description = '".$catch_description."' WHERE username = '".$username."';");
    }
    echo "balls";
    ?>
    </body>
</html>
