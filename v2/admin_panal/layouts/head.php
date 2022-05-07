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
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="/admin_panal/assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/admin_panal/assets/css/owl.theme.css">
    <link rel="stylesheet" href="/admin_panal/assets/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- modals CSS
		============================================ -->
        <link rel="stylesheet" href="/admin_panal/assets/css/modals.css">
        <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/datapicker/datepicker3.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/form/all-type-forms.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/admin_panal/assets/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/admin_panal/assets/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/alerts.css">
<!-- notifications CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="/admin_panal/assets/css/notifications/notifications.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="/admin_panal/assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="/admin_panal/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->