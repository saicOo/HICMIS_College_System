<?php
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header('location:/admin_panal/padges/auth/login.php');
    exit;
  }
  
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>College System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $assets ?>img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo $assets ?>css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo $assets ?>css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/educate-custon-icon.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- modals CSS
		============================================ -->
        <link rel="stylesheet" href="<?php echo $assets ?>css/modals.css">
        <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/datapicker/datepicker3.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/form/all-type-forms.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo $assets ?>css/metisMenu/metisMenu-vertical.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/alerts.css">
    <!-- notifications CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="<?php echo $assets ?>css/notifications/notifications.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $assets ?>css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo $assets ?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>