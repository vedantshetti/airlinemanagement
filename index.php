<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    ob_start();
    include('header.php');
    include('admin/db_connect.php');

    // Retrieve settings from the database
    $query = $conn->query("SELECT * FROM system_settings LIMIT 1")->fetch_array();
    foreach ($query as $key => $value) {
        if (!is_numeric($key)) {
            $_SESSION['setting_' . $key] = $value;
        }
    }
    
    // Ensure session variables for settings are defined
    $setting_name = isset($_SESSION['setting_name']) ? $_SESSION['setting_name'] : 'Default Name';
    $setting_cover_img = isset($_SESSION['setting_cover_img']) ? $_SESSION['setting_cover_img'] : 'default.jpg';

    ob_end_flush();
    ?>

    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $setting_cover_img; ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    </style>
    <body id="page-top">
        <!-- Navigation -->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body text-white">
            </div>
        </div>
        <nav class="navbar navbar-expand-lg fixed-top py-3 bg-info" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $setting_name; ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=flights">Flight List</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : "home";
        include $page . '.php';
        ?>

        <!-- Modal and Preloader -->
        <div class="modal fade" id="confirm_modal" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <div id="delete_content"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="confirm" onclick="">Continue</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Modals -->
        <div class="modal fade" id="uni_modal" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="submit" onclick="$('#uni_modal form').submit()">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="uni_modal_right" role="dialog">
            <div class="modal-dialog modal-full-height modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="fa fa-arrow-right"></span>
                        </button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <div id="preloader"></div>
        
        <footer class="bg-info py-5">
            <br>
            <div class="container">
                <div class="small text-center text-muted">Copyright © 2021 - <?php echo $setting_name; ?></div>
            </div>
        </footer>

        <?php include('footer.php'); ?>
    </body>

    <?php $conn->close(); ?>
</html>
