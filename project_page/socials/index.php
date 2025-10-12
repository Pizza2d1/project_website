<?php include_once("include/var_declaration.php"); ?>        
<?php include_once("$srv_root/include/all.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Pizza2d1's Webpage</title>
        <link rel="stylesheet" href="/CSS/all.css">
        <link rel="stylesheet" href="/CSS/socials.css">
        <link rel="icon" href="assets/ALL/android-chrome-512x512.png" type="image/x-icon">
    </head>
    <body>
      <div class="flex-wrapper">
        <?php echo navbar(); ?>
        <?php echo project_boxes(); ?>        
      </div>

      <?php echo footer() ?>
        
    </body>
</html>


<?php 
function project_boxes() {
    class Info_Box {
      public $title;
      public $href;
      public $image;
    
    function __construct($title, $href, $image) {
        $this->title = $title;
        $this->href = $href;
        $this->image = $image;
      }
    }
    
    $info_boxes = get_social_data();
    $county = count($info_boxes);

    $output = "<div class='row'>";
    foreach ($info_boxes as $info_box) {
        $output .= "
        <div class='column'>
        <a href='$info_box->href'><h2>$info_box->title</h2></a>
        <a href='$info_box->href'><img src='$info_box->image' alt='$info_box->title' width='100%' height='auto'></a>
        </div>";
    }
    return $output;
}
function get_social_data() {
    $projects_dir = "/project_page/projects";
    $info_boxes = [
      new Info_Box(
    "Github", 
    "https://github.com/pizza2d1/", 
    "img/github.png"), 

      new Info_Box(
    "Youtube",
    "https://www.youtube.com/@Pizza2d1",
    "img/youtube.png"),

      new Info_Box(
    "LinkedIn",
    "https://www.linkedin.com/in/pizza2d1/",
    "img/linkedin.png"),

      new Info_Box(
    "Discord",
    "https://discordapp.com/users/714918826831118436",
    "img/discord.png"),
    ];
    return $info_boxes;
}
?>