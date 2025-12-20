<?php
include_once("includes/functions.php");
include_once("includes/sql_functions.php");
session_start();

[$usernames, $passwords] = getUsersSql();
$_SESSION['usernames'] = $usernames;
$_SESSION['passwords'] = $passwords;

#$err_code=0;
#if (isset($_POST['username'])) {$catch_username = $_POST['username']; $err_code+=1;} else $catch_username = '';
#if (isset($_POST['password'])) {$catch_password = $_POST['password']; $err_code+=2;} else $catch_password = '';
$check_username = (isset($_POST['username'])) ? $_POST['username'] : '';
$check_password = (isset($_POST['password'])) ? $_POST['password'] : '';
$check_src = (isset($_GET['please'])) ? $_GET['please'] : 0;
#if (isset($_POST['password'])) echo pizzaHash($_POST['password']);

if (in_array($catch_username, $usernames)) {
  if (pizzaHash($catch_password) == $passwords[array_search($catch_username, $usernames)]) {
    $_SESSION['granted'] = true;
    $_SESSION['username'] = $catch_username;
  }
}
    
?>
<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['all', 'login2']);?>
    <body>

    <?php if (!isGranted()) : ?>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
            <?php if ($check_src) : ?>
            <h3 style='color:black'>Please login before looking in your cart</h3>
            <?php endif ?>

                <div class="form-group">
                    <div class="input-wrapper">
                        <h3><a href="/catalog">Back to main page</a></h3>
                        <div class="input-line"></div>
                        <div class="ripple-container"></div>
                    </div>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="material-logo">
                    <div class="logo-layers">
                        <div class="layer layer-1"></div>
                        <div class="layer layer-2"></div>
                        <div class="layer layer-3"></div>
                    </div>
                </div>
                <h2>Sign in</h2>
                <p>to continue to your account</p>
            </div>
            
            <form class="login-form" id="loginForm" novalidate, action='login.php', method='post'>
                <div class="form-group">
                    <div class="input-wrapper">
                       <!--  <input type="email" id="email" name="email" required autocomplete="email"> -->
			                  <?php
                          echo "<input type='text' id='email' name='username' value='$catch_username' required>";
			                  ?>
                        <label for="email">Email</label>
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

                <div class="form-options">
                    <a href="/penisbobo.php" class="forgot-password">Forgot password?</a>
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

            <div class="divider">
                <span>or</span>
            </div>

            <div class="signup-link">
                <p>Don't have an account? <a href="create-account.php" class="create-account">Create account</a></p>
            </div>
        </div>
    </div>

    <!-- <script src="/js/login.js"></script> -->

    <?php else : ?>
        <?php header('location: /catalog'); ?>
    <?php endif; ?>
    </body>
</html>
