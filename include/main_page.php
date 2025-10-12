<?php
function project_boxes() {
    class Info_Box {
      public $progress_status;
      public $title;
      public $href;
      public $image;
      public $about;
    
      function __construct($progress_status, $title, $href, $image, $about) {
        $this->progress_status = $progress_status;
        $this->title = $title;
        $this->href = $href;
        $this->image = $image;
        $this->about = $about;
      }
    }
    
    $info_boxes = get_project_data();
    $county = count($info_boxes);

    $output = "";
    $output .= '<div class="show-row">'; 
    if ($county == 4) {
        foreach ($info_boxes as $info_box) {
        $output .= "<div class='show-column'>";
        $output .= getInfoAsBox($info_box);
        }
    } else {
        foreach ($info_boxes as $info_box) {
        $output .= "<div class='movie-column'>";
        $output .= getInfoAsBox($info_box);
        }
    }
    $output .= '</div>'; 
    return $output;
}
function get_project_data() {
    $projects_dir = "/project_page/projects";
    $info_boxes = [
      new Info_Box(
    "In progress",
    "My Server Setup", # Box Title
    "$projects_dir/laptop_server/", # Link to project page
    "$projects_dir/laptop_server/img/laptop_setup.jpg", # Link to image that is displayed in the box
    "My general server which hosts this website, my FTP server, and game servers for things like tmodloader and minecraft. Currently a mess as I am working with broken parts that I put together"), # Description of project

      new Info_Box(
    "On Hold",
    "My Operating System Built From Scratch",
    "$projects_dir/os_making/",
    "$projects_dir/os_making/img/qemu1.png",
    "Currently at the \"Bare Bones\" stage in the <a href='osdev.org'>OSDev guide website</a>"),

      new Info_Box(
    "On Hold",
    "pifetch",
    "$projects_dir/pifetch/",
    "$projects_dir/pifetch/img/pifetch_showcase.gif",
    "My neofetch/fastfetch alternative that can use gifs instead of ONLY still images,
    uses kitty for the terminal and image processing"),

    ];
    return $info_boxes;
}
function getInfoAsBox($info_box) {
        $ps = $info_box->progress_status;
        $show_progress = match (strtolower($ps)) {
            "completed" => "<div class='prog_completed'><h4>$ps</h4></div>",
            "in progress" => "<div class='prog_in_progress'><h4>$ps</h4></div>",
            "on hold" => "<div class='prog_on_hold'><h4>$ps</h4></div>",
        };
        return "
            <div class='show-card'>
                $show_progress
                <a href=$info_box->href><h2>$info_box->title</h2></a>
                <img src=$info_box->image alt='Image not found' width='100%' height='auto'>
                <h3>About:</h3>
                <h4>$info_box->about</h4>
            </div>
        </div>";
};
function winamp() {
  return "
  <div id='winamp-container'></div>
  <script src='https://unpkg.com/webamp@1.4.0/built/webamp.bundle.min.js'></script>
  <script src='js/webamp.js'></script>";
}
function welcome() {
return "
<h1 style='text-align:center'>Welcome!</h1>
<h2 style='text-align:center'>My name is Nathan and this is my website where I store info about my current and past projects</h2>
";}
?>