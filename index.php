<?php

    // Config Vars
    $main_url = "http://YOUR IP OR DOMAIN/";
    $max_alloc_space = 5;
    $max_alloc_space_bytes = $max_alloc_space * 1000000000; 
    $max_alloc_space_formated = $max_alloc_space_bytes / 1000000000;
    $whitlisted_folders = array(".", "..");
    $folder_to_scan = scandir("PATH TO SCAN"); //eg. /var/www/html/ 
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            :root {
                --bg-1:         #17191C;
                --bg-2:         #1D1F23;
                --accent:       #3A3B3F;

                --red:          #FF4444;
                --yellow:       #FFB341;
                --blue:         #41AAFF;
                --green:        #0AFF74;
                --green-lite:   #85FFBA;

                --text-1:       #FFFFFF;
                --text-2:       #EBEBEB;

                /* ext. */
                --html:         #ffa340;
                --php:          #a291ff;
                --txt:          #ffffff;
                --folder:       #ffdd63;
                --css:          #34aeeb;
                --js:           #ebae34;
            }


            body {
                background: var(--bg-1);
                color: #fff;
                margin-top: 100px;
            }

            p {
                margin: 0px !important;
            }

            .top-nav {
                background: var(--bg-2);
                border-bottom: 2px solid var(--accent);
            }

            .top-nav i {
                color: var(--text-1);
            }

            .top-nav button.toggel-btn {
                border: none !important;
                background: transparent !important;
                font-size: 25px;
            }

            .item_list {
                background: var(--bg-2);
                color: #fff;
                padding: 10px;
                border-radius: 10px;
                margin: 0px 0px 10px 0px;
                border: 2px solid var(--accent);
            }

            .item_list_link {
                text-decoration: none !important;
                color: var(--text-1);
            }

            .item_list_link:hover {
                color: var(--text-2);
            }

            progress {
                width: 100%;
                height: 15px;
            }

            progress {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

            progress[value] {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

            progress:not([value]) {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

            progress::-webkit-progress-bar {
                background: var(--bg-1);
                border-radius: 3px;
            }

            progress::-webkit-progress-value {
                background: var(--green);
                border-radius: 3px;
            }

            .alignleft {
                float: left;
            }
            .alignright {
                float: right;
            }

            .sidebar {
                background: var(--bg-2);
                border-radius: 10px;
                min-height: 0px;
                padding-top: 15px;
                padding-bottom: 15px;
                border: 2px solid var(--accent);
            }

            div.sidebar div.small-box-info {
                color: var(--text-1);
            }

            div.sidebar div.small-box-info .nav-item {
                background-color: var(--bg-1);
                border-radius: 10px;
                margin: 5px 10px 5px 10px;
                padding: 20px;
                border: 2px solid var(--accent);
            }

            div.sidebar div.small-box-info .nav-item-btn {
                background-color: var(--green);
                color: #000;
                border-radius: 10px;
                margin: 5px 10px 5px 10px;
                padding: 5px 20px 5px 20px;
                border: none;
            }

            div.sidebar div.small-box-info button.nav-item-btn a {
                color: #000;
            }

            div.sidebar div.small-box-info a {
                color: var(--text-1);
                text-decoration: none;
            }

            .create_new_modal {
                display: none; 
                position: fixed;
                z-index: 1;
                padding-top: 100px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0,0,0,0.9);
            }
            
            .create_new_modal_content {
                position: relative;
                background-color: var(--bg-2);
                border-radius: 10px;
                margin: auto;
                padding: 0;
                width: 40%;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s;
                border: 2px solid var(--accent);
            }
            
            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0} 
                to {top:0; opacity:1}
            }
            
            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }
            
            .close {
                color: white;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: var(--text-2);
                text-decoration: none;
                cursor: pointer;
            }

            .create_new_modal_header {
                padding: 10px 10px;
                background-color: var(--bg-1);
                color: white;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .create_new_modal_body {
                padding: 2px 16px;
            }

            .create_new_modal_body label,
            .create_new_modal_body input {
                font-size: 20px;
            }

            .create_new_modal_body .nav-item-btn {
                width: 100%;
                margin: 50px 0px 10px 0px !important;
            }

            .create_new_modal_body .create_new_modal_input {
                background: transparent;
                border: none;
                color: var(--text-1);
            }

            .create_new_modal_body .create_new_modal_input:focus,
            .create_new_modal_body .create_new_modal_input:active {
                outline-width: 0;
            }

            /* Alerts */
            .error {
                padding: 15px;
                background-color: var(--red);
                color: var(--text-1);
                margin: 0px 0px 20px 0px;
                border-radius: 10px;
            }

            .warning {
                padding: 15px;
                background-color: var(--yellow);
                color: var(--text-1);
                margin: 0px 0px 20px 0px;
                border-radius: 10px;
            }

            .info {
                padding: 15px;
                background-color: var(--blue);
                color: var(--text-1);
                margin: 0px 0px 20px 0px;
                border-radius: 10px;
            }

            .success {
                padding: 15px;
                background-color: var(--green);
                color: var(--text-1);
                margin: 0px 0px 20px 0px;
                border-radius: 10px;
                color: #000;
            }

            .success .closebtn{
                color: #000;
            }

            .success .closebtn:hover {
                color: #222;
            }
            
            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }
            
            .closebtn:hover {
                color: var(--text-2)
            }

            .option_btn button {
                border: none;
                border-radius: 5px;
                margin: 10px 0px 0px 0px;
                background: var(--bg-1);
                border: 2px solid var(--accent);
                color: var(--text-2);
            }

            .divider {
                border-bottom: 2px solid var(--accent);
                padding-bottom: 5px;
            }

            .element_block {
                background-color: var(--bg-1);
                padding: 5px;
                margin: 5px 0px 5px 0px;
                border-radius: 5px;
                border: 1px solid var(--accent);
            }

            .element_link {
                color: var(--text-1);
                text-decoration: none;
            }

            .element_link:hover {
                color: var(--text-2);
            }
        </style>
    </head>
    <body>

        <nav class="navbar top-nav fixed-top">
            <div class="container">

                <button class="toggel-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

            </div>
        </nav>

        <div class="container">
            <div class="row">

                <?php
                if(isset($_GET['create_new'])) {
                    $new_project = $_POST['project_name'];

                    if(is_dir($new_project) === false) {
                        echo "<script>window.location.replace('$main_url');</script>";
                        mkdir($new_project);
                        echo "<div class='col-sm-12'>";
                        echo "    <div class='success'>";
                        echo "        <span class='closebtn' onclick=" . "this.parentElement.style.display='none';" . "><i class='fas fa-times-circle'></i></span>";
                        echo "        <strong>Success: </strong> Project <strong>$new_project</strong> created.";
                        echo "    </div>";
                        echo "</div>";
                    }
                    elseif(is_dir($new_project) === true ) {
                        echo "<div class='col-sm-12'>";
                        echo "    <div class='error'>";
                        echo "        <span class='closebtn' onclick=" . "this.parentElement.style.display='none';" . "><i class='fas fa-times-circle'></i></span>";
                        echo "        <strong>Error: </strong> Project <strong>$new_project</strong> already exists.";
                        echo "    </div>";
                        echo "</div>";
                    }
                }
                ?>

                <div class="col-sm-3 collapse show" id="navbarTogglerDemo01">
                    <div class="sidebar">

                        <div class="small-box-info">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                <button class="nav-item-btn" id="myBtn"><i class="fas fa-folder-plus"></i> Create New</button>

                                <div id="myModal" class="create_new_modal">

                                    <div class="create_new_modal_content">
                                        <div class="create_new_modal_header">
                                            <span class="close">&times;</span>
                                            <h2>Create new Project</h2>
                                        </div>
                                        <div class="create_new_modal_body">

                                            <form action="?create_new" method="POST">

                                                <div class="divider">
                                                    <label>Project Name:</label>
                                                    <input type="text" class="create_new_modal_input" name="project_name" placeholder="MyProject" required>
                                                </div>

                                                <button class="nav-item-btn" type="submit"><i class="fas fa-plus-circle"></i> New</button>

                                            </form>

                                        </div>
                                    </div>

                                </div>

                                <li class="nav-item">
                                    <i class="fas fa-list"></i>
                                    <a class="menu-link" href="<?php echo $main_url?>">Dashboard</a>
                                </li>

                                <?php
                                    foreach ($folder_to_scan as $element) {

                                        if(is_dir($element)) {
                                            if(in_array($element, $whitlisted_folders)) {
                                                continue;
                                            }
                                            else {

                                                echo "  <li class='nav-item'>";
                                                echo "      <a class='menu-link' href='$element'><i class='fas fa-folder'></i> $element</a>";
                                                echo "  </li>";
                                            }
                                        }

                                    }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="row">

                        <?php

                        function folderSize($dir) {

                            $count_size = 0;
                            $count = 0;
                            $dir_array = scandir($dir);

                            foreach($dir_array as $filename){
                                if($filename!=".." && $filename!=".") {

                                    if(is_dir($dir."/".$filename)){
                                        $new_foldersize = foldersize($dir."/".$filename);
                                        $count_size = $count_size+ $new_foldersize;
                                    }

                                    else if(is_file($dir."/".$filename)) {
                                        $count_size = $count_size + filesize($dir."/".$filename);
                                        $count++;
                                    }
                                }
                            }
                            return $count_size;
                        }

                        function sizeFormat($bytes, $mode){ 
                            $kb = 1024;
                            $mb = $kb * 1024;
                            $gb = $mb * 1024;
                            $tb = $gb * 1024;
                            
                            if($mode == true) {
                                if (($bytes >= 0) && ($bytes < $kb)) {
                                    return $bytes . ' B';
                                } 

                                elseif (($bytes >= $kb) && ($bytes < $mb)) {
                                    $kb_val = floatval($bytes / $kb);
                                    return number_format((float)$kb_val, 2) . ' KB';
                                }

                                elseif (($bytes >= $mb) && ($bytes < $gb)) {
                                    $mb_val = floatval($bytes / $mb);
                                    return number_format((float)$mb_val, 2) . ' MB';
                                } 

                                elseif (($bytes >= $gb) && ($bytes < $tb)) {
                                    $gb_val = floatval($bytes / $gb);
                                    return number_format((float)$gb_val, 2) . ' GB';
                                }
                                
                                elseif ($bytes >= $tb) {
                                    $tb_val = floatval($bytes / $tb);
                                    return number_format((float)$tb_val, 2) . ' TB';
                                } 
                                
                                else {
                                    return $bytes . ' B';
                                }
                            }
                            else {
                                return $bytes;
                            }
                        }

                        foreach ($folder_to_scan as $element) {
                            if(is_dir($element)) {
                                if(in_array($element, $whitlisted_folders)) {
                                    continue;
                                }
                                else {
                                    echo "<div class='col-sm-6'>";
                                    echo "  <div class='item_list'>";
                                    echo "      <h4><i class='fas fa-folder'></i><a href='$element'class='item_list_link'> $element</a></h4>";
                                    echo "      <p class='alignleft'>" . sizeFormat(folderSize($element), true) . "</p>";
                                    echo "      <p class='alignright'>" . $max_alloc_space_formated . " GB</p>";
                                    echo "      <progress value='" . sizeFormat(folderSize($element), false) . "' max='" . $max_alloc_space_bytes . "'>" . sizeFormat(folderSize($element), true) . "</progress> ";
                                    echo "      <form methode='get'>";
                                    echo "          <div class='option_btn'>";
                                    echo "              <button class='col-3' name='delete' value='$element'>Delete</button>";
                                    echo "              <form action='?create_new' methode='POST'>";
                                    echo "                  <input type='hidden' name='name' value='$element'/>";
                                    echo "                  <button type='submit' class='col-3'>Info</button>";
                                    echo "              </form>";
                                    echo "          </div>";
                                    echo "      </form>";

                                    if(isset($_GET['name'])) {
                                        if($_GET['name'] == $element) {

                                            $project_dir_array = scandir($_GET['name']);
                                            $folders = 0;
                                            $files = 0;
                
                                            foreach ($project_dir_array as $current_element) {

                                                $path_to = $_GET['name'] . "/" . $current_element;

                                                if($current_element == "." || $current_element == "..") {
                                                    continue;
                                                }
                                                else {

                                                    if(is_dir($element . "/" . $current_element)) {
                                                        $folders = $folders + 1;
                                                        echo '<div class="element_block">';
                                                        echo 'ㅤ';
                                                        echo '<p class="alignleft"><i class="fas fa-folder" style="color: var(--folder);"></i> <a class="element_link" href="' . $path_to . '">' . $current_element . "</a></p>";
                                                        echo '<p class="alignright" style="color: var(--text-2);">' . sizeFormat(folderSize($path_to), 1) . '</p>';
                                                        echo '</div>';
                                                    }
                                                    elseif($_GET['name'] . "/" . is_file($current_element)) {
                                                        $files = $files + 1;
                                                        $file_ext = pathinfo($current_element);

                                                        if($file_ext['extension'] == "php") {
                                                            echo '<div class="element_block" style="clear: both;">';
                                                            echo 'ㅤ';
                                                            echo '<p class="alignleft"><i class="fab fa-php" style="color: var(--php);"></i> <a class="element_link" href="' . $path_to . '">' . $current_element . "</a></p>";
                                                            echo '<p class="alignright" style="color: var(--text-2);">' . sizeFormat(filesize($path_to), 1) . '</p>';
                                                            echo '</div>';
                                                        }
                                                        elseif($file_ext['extension'] == "html") {
                                                            echo '<div class="element_block">';
                                                            echo 'ㅤ';
                                                            echo '<p class="alignleft"><i class="fab fa-html5" style="color: var(--html);"></i> <a class="element_link" href="' . $path_to . '">' . $current_element . "</a></p>";
                                                            echo '<p class="alignright" style="color: var(--text-2);">' . sizeFormat(filesize($path_to), 1) . '</p>';
                                                            echo '</div>';
                                                        }

                                                        elseif($file_ext['extension'] == "txt" || $file_ext['extension'] == "ruby") {
                                                            echo '<div class="element_block">';
                                                            echo 'ㅤ';
                                                            echo '<p class="alignleft"><i class="fas fa-file-alt" style="color: var(--txt);"></i> <a class="element_link" href="' . $path_to . '">' . $current_element . "</a></p>";
                                                            echo '<p class="alignright" style="color: var(--text-2);">' . sizeFormat(filesize($path_to), 1) . '</p>';
                                                            echo '</div>';
                                                        }

                                                        elseif($file_ext['extension'] == "css") {
                                                            echo '<div class="element_block">';
                                                            echo 'ㅤ';
                                                            echo '<p class="alignleft"><i class="fab fa-css3-alt" style="color: var(--css);"></i> <a class="element_link" href="' . $path_to . '">' . $current_element . "</a></p>";
                                                            echo '<p class="alignright" style="color: var(--text-2);">' . sizeFormat(filesize($path_to), 1) . '</p>';
                                                            echo '</div>';
                                                        }

                                                        elseif($file_ext['extension'] == "js") {
                                                            echo '<div class="element_block">';
                                                            echo 'ㅤ';
                                                            echo '<p class="alignleft"><i class="fab fa-js" style="color: var(--js);"></i> <a class="element_link" href="' . $path_to . '">' . $current_element . "</a></p>";
                                                            echo '<p class="alignright" style="color: var(--text-2);">' . sizeFormat(filesize($path_to), 1) . '</p>';
                                                            echo '</div>';
                                                        }

                                                    }
                                                }
                                            }
                                            
                                            echo "<div class='divider'></div>";
                                            echo '<i class="fas fa-folder" style="color: var(--folder);"></i> Folders = ';
                                            echo $folders;
                                            echo '<br>';
                                            echo '<i class="fas fa-file-alt" style="color: var(--txt);"></i> Files = ';
                                            echo $files;
                                            echo '<br>';
                                        }
                                    }

                                    echo "  </div>";
                                    echo "</div>";
                                }
                            }
                            else {
                                continue;
                            }

                        }

                        if(isset($_GET['delete'])) {
                            $new_project = $_GET['delete'];
                            echo $new_project;

                            foreach ($folder_to_scan as $element) {
                                if($new_project == $element) {
                                    rmdir($new_project);
                                    echo "<script>window.location.replace('$main_url');</script>";
                                }
                                else {
                                    continue;
                                }
                            }
                        }

                        ?>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scripts -->
        <script src="https://simplyswift.de/dist/plugins/JQuery/jquery-3.6.0.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>

        <script>
            $('.alert').alert()
        </script>
    </body>
</html>