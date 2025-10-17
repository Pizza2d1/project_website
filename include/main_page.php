<?php
function project_boxes($amount_to_show) {
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
    if ($amount_to_show > $county) {
      $amount_to_show = $county;
    }

    $output = "";
    $output .= '<div class="show-row">';
    for ($i = 0; $i < $amount_to_show; $i++) {
      $output .= ($amount_to_show % 3) ? "<div class='show-column'>" : "<div class='movie-column'>";
      $output .= getInfoAsBox($info_boxes[$i]);
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
    "$projects_dir/laptop_server/img/laptop_setup.jpg", # Link to image that is displayed in the box, "NONE" if there is none
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

      new Info_Box(
    "Completed",
    "Python Website Maker",
    "https://github.com/Pizza2d1/website_indexing",
    "$projects_dir/python_website/img/python_website.png",
    "My tool that I used for making dynamic websties that were able to format html pages for video files and image boards that I decided to make. Made mostly because I wanted to understand everything about what I was doing rather than using a framework with docs longer than a book"),

      new Info_Box(
    "Completed",
    "Chromebook to Arch Laptop",
    "NONE",
    "$projects_dir/arch_chromebook/img/arch_chromebook.jpg",
    "I got a free chromebook when leaving high school (it was an extra that they gave me willingly, dw), but when I tried to use it, it was restricted to chromeOS (ew), so I spent some time and was able to hook a 512GB ssd up to it and install arch linux"),

      new Info_Box(
    "In Progress",
    "Soda Machine",
    "NONE",
    "NONE",
    "my friend and I are going to be making a soda machine for our robotics club as we are freee to do whatever project that we want, and since we don't know a lot about electrical engineering, we thought this would be a cool way to start it"),

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
        $image = (strtolower($info_box->image) == "none") ? "" : "<a href='$info_box->href'><img src=$info_box->image alt='Image not found' width='100%' height='auto'></a>";
        $link = (strtolower($info_box->href) == "none") ? "<h2>$info_box->title</h2>" : "<a href=$info_box->href><h2>$info_box->title</h2></a>";
        return "
            <div class='show-card'>
                $show_progress
                $link
                $image
                <h3>About:</h3>
                <div class='prog_about'><h4>$info_box->about</h4></div>
            </div>
        </div>";
};
function welcome() {
return "
<div class='welcome'>
<h1>Welcome!</h1>
<h2>My name is Nathan and this is my website where I store info about my current and past projects</h2>
</div>
";}
function github_advert() {
  echo "<br><div class='alert'><h3>If you would like to see more, most of my projects are available on <a href='https://github.com/pizza2d1/'>github</a></div><br>
  ";
}
?>