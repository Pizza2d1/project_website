<?php
include_once("../../include/var_declaration.php");
include_once("$srv_root/include/all.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Webpage title</title>
    <meta charset="UTF-8">
    <style>
        h1, h2, h3, p {
            text-align: center;
        }
    </style>
  </head>
  <body>
<?php
navbar();
echo "
<h1>Projects:</h1>
<h3>Still working on making this pretty, come back later!</h3>
<p><a href='/'>Back to Homepage</a></p>
";

?>
  </body>
</html>   
