<!-- Meta tags -->
<meta content="" name="description"> <!-- Fixed typo here -->
<meta content="" name="keywords">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="assets/DataTables/datatables.min.css" rel="stylesheet">
<link href="assets/css/jquery.datetimepicker.min.css" rel="stylesheet">
<link href="assets/css/select2.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="assets/font-awesome/css/all.min.css">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="assets/css/jquery-te-1.4.0.css">

<!-- jQuery and JS vendor files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- DataTables and other JS dependencies -->
<script src="assets/DataTables/datatables.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery.datetimepicker.full.min.js"></script>

<!-- Font Awesome JS -->
<script src="assets/font-awesome/js/all.min.js"></script>

<!-- jQuery Text Editor -->
<script src="assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>

<?php
// Check if session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Retrieve session variables with fallback values
$setting_name = isset($_SESSION['setting_name']) ? $_SESSION['setting_name'] : 'Default Name';
$setting_cover_img = isset($_SESSION['setting_cover_img']) ? $_SESSION['setting_cover_img'] : 'default.jpg';

// Example usage
echo "<title>{$setting_name}</title>";
?>
