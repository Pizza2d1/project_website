<?php
    session_start();
    include_once("includes/all.php");
    include_once("includes/sql_functions.php");
    
    [$usernames, $passwords, $admins] = getUsersSql();

    $catch_username = '';
    $catch_password = '';
    $catch_repassword = '';
    $err_code=0;
    if (isset($_POST['username'])) $catch_username = $_POST['username']; $err_code+=1;
    if (isset($_POST['password'])) $catch_password = $_POST['password']; $err_code+=2;
    if (isset($_POST['repassword'])) $catch_repassword = $_POST['repassword']; $err_code+=4;
?>
<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all', 'login2']);?>
    <body>



    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                
                <div class="form-group">
                    <div class="input-wrapper">
                        <h3><a href="/">Back to main page</a></h3>
                        <div class="input-line"></div>
                        <div class="ripple-container"></div>
                    </div>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="material-logo">
                    <div class="logo-layers">
                        <div class="layer ac-layer-1"></div>
                        <div class="layer ac-layer-2"></div>
                        <div class="layer ac-layer-3"></div>
                    </div>
                </div>
                <h2>Account Creation</h2>
                <p>I ripped this design off the internet</p>
            </div>
            
            <form class="login-form" id="loginForm" novalidate, action='create-account.php', method='post'>
                <div class="form-group">
                    <div class="input-wrapper">
                       <!--  <input type="email" id="email" name="email" required autocomplete="email"> -->
			                  <?php
                          echo "<input type='text' id='email' name='username' value='$catch_username' required>";
			                  ?>
                        <label for="email">Username</label>
                        <div class="input-line"></div>
                        <div class="ripple-container"></div>
                    </div>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <div class="input-wrapper password-wrapper">
                        <!-- <input type="password" id="password" name="password" required autocomplete="current-password"> -->
			                  <?php
			                    echo "<input type='password' id='password' name='password' required autocomplete='current-password' value=''>";
			                  ?>
                        <label for="password">Password</label>
                        <div class="input-line"></div>
                        <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <div class="toggle-ripple"></div>
                            <span class="toggle-icon"></span>
                        </button>
                        <div class="ripple-container"></div>
                    </div>
                    <span class="error-message" id="passwordError"></span>
                </div>
                <div class="form-group">
                    <div class="input-wrapper password-wrapper">
                        <!-- <input type="password" id="password" name="password" required autocomplete="current-password"> -->
			                  <?php
			                    echo "<input type='password' id='password' name='repassword' required autocomplete='current-password' value=''>";
			                  ?>
                        <label for="password">Confirm Password</label>
                        <div class="input-line"></div>
                        <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <div class="toggle-ripple"></div>
                            <span class="toggle-icon"></span>
                        </button>
                        <div class="ripple-container"></div>
                    </div>
                    <span class="error-message" id="passwordError"></span>
                </div>

                <button type="submit" class="login-btn material-btn">
                    <div class="btn-ripple"></div>
                    <span class="btn-text">SIGN IN</span>
                    <div class="btn-loader">
                        <svg class="loader-circle" viewBox="0 0 50 50">
                            <circle class="loader-path" cx="25" cy="25" r="12" fill="none" stroke="currentColor" stroke-width="3"/>
                        </svg>
                    </div>
                </button>
            </form>
            
            <?php if ($catch_password == $catch_repassword && !in_array($catch_username, $usernames) && $catch_username != '' && $catch_password != '' && strlen($catch_password) >= 6) : ?>
            <div class="signup-link">
                <p>Account added to database</p>
                <p><a href="login.php">Back to login</a></p>
            </div>
            <?php elseif (in_array($catch_username, $usernames)) : ?>
                <p>User already exists</p>
            <?php elseif (strlen($catch_password) < 6 && $catch_password != null) : ?>
                <p>Password must be longer than 6 characters</p>
            <?php endif; ?>

            <div class="divider">
                <span>or</span>
            </div>

            <div class="signup-link">
                <p>Already have an account? <a href="/login.php" class="create-account">Log In</a></p>
            </div>
        </div>
    </div>

    <script src="/js/login.js"></script>



<!--
    <h3><a href="/">Homepage</a></h3>

		<form action='create-account.php' method='post'>	
    <input type='text' name='username' placeholder='Username'>
    <br>
		<input type='text' name='password' placeholder='Password'>
		<input type='text' name='repassword' placeholder='Verify Password'>
    <input type="submit" value="Create Account">
    <input type="reset">
		</form>	
    <a href='/login.php'>Login Page</a>
            -->
    <?php
    #switch ($err_code) {
    #case 0:
    #    echo "please enter values for username and password";
    #    break;
    #case 6:
    #    echo "Didn't enter username";
    #    break;
    #case 5:
    #    echo "Didn't enter password";
    #    break;
    #case 3:
    #    echo "Didn't enter verification password";
    #    break;
    #case 4:
    #    echo "Didn't enter username or password";
    #    break;
    #case 2:
    #    echo "Didn't enter username or verification password";
    #    break;
    #}

    if ($catch_password == $catch_repassword && !in_array($catch_username, $usernames) && $catch_username != '' && $catch_password != '' && strlen($catch_password) >= 6) {
      $hashedPassword = pizzaHash($catch_password);
      SqlQuery("insert into users (username, password, is_admin) values ('".$catch_username."','".$hashedPassword."', false);");
      SqlQuery("insert into profiles (username) values ('".$catch_username."');");
    }
?>
    </body>
</html>
