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


    #echo $username;
    #echo $email;
    #echo $pfp;
    #echo $about;
    #echo $description;
    #echo $site;
?>
<!DOCTYPE html>
<html lang="en-US">
    <?php echo head(['account', 'all']);?>
    <body>

    <?php if (!isGranted()) : ?>
      <?php header('location: /'); ?>
    <?php else : ?>
          <?php echo navbar(); ?>
<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="container">
                      <div class="item"><img src="<?= ($pfp != null || $pfp == "default") ? $pfp : "https://www.bootdey.com/img/Content/avatar/avatar7.png" ?>" alt="Admin" class="rounded-circle" width="200"></div>
                      <div class="item description">
                        <h3>Description</h3>
                        <?= ($description != null) ? $description : "No decription available" ?>
                      </div>
                    </div>
                    <div class="mt-3">
                      <h4><?= $username ?></h4>
                      <p class="text-secondary mb-1"><?= ($about != null) ? $about : "No about me available" ?></p>
                      <p class="text-secondary mb-1"><?= ($email != null) ? $email : "No email was provided" ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary"><?= ($site != null) ? "<a href='$site'>$site</a>" : 'Site was not provided' ?></span>
                  </li>
                </ul>
              </div>
            </div>
            </div>
          </div>
        </div>
    </div>
    <a href="create-profile.php">Create Profile</a>

    <?php endif; ?>
    </body>
</html>
