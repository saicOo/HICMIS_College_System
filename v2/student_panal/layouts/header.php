<?php
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header('location:/student_panal/login/index.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="/student_panal/assets/img/fav.png" />
  <!-- Author Meta -->
  <meta name="author" content="colorlib" />
  <!-- Meta Description -->
  <meta name="description" content="" />
  <!-- Meta Keyword -->
  <meta name="keywords" content="" />
  <!-- meta character set -->
  <meta charset="UTF-8" />
  <!-- Site Title -->
  <title>Eclipse Education</title>

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet" />
  <!--
      CSS
      =============================================
    -->
    <link rel="stylesheet" href="/student_panal/assets/css/linearicons.css" />
    <link rel="stylesheet" href="/student_panal/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/student_panal/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="/student_panal/assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="/student_panal/assets/css/owl.carousel.css" />
    <link rel="stylesheet" href="/student_panal/assets/css/nice-select.css">
    <link rel="stylesheet" href="/student_panal/assets/css/hexagons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" />
    <link rel="stylesheet" href="/student_panal/assets/css/main.css" />
</head>

<body>
  	<!-- ================ Start Header Area ================= -->
	<header class="default-header">
		<nav class="navbar navbar-expand-lg  navbar-light">
			<div class="container">
				<a class="navbar-brand" href="/student_panal/" style="font-size: 800;color: #fff; font-weight: bold;">
       
          <img class="image-brand" src="/student_panal/assets/img/graduation-cap (3).png" alt="Mountain View"> HICMIS 
        

				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="lnr lnr-menu"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
					<ul class="navbar-nav">
						
						<!-- Dropdown -->
            
						<li class="dropdown">
             
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <?php echo $_SESSION['name'] ?>
							</a>
              
							<div class="dropdown-menu">
								<a class="dropdown-item" href="blog-home.html">Student Data</a>
								<a class="dropdown-item" href="?logout">log out</a>
							</div>
						</li>
           
					
					</ul>
				</div>
			</div>
		</nav>
		
	</header>
	<!-- ================ End Header Area ================= -->