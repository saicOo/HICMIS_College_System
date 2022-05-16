<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
    $student = new Student; 
    $std_single =  $student->show($_SESSION['code_std']);




#########################################################
        // <!-- start header area -->
        require_once PAGE_PATH."/../layouts/header.php";  
############################################################
?>

<!-- ================ start banner Area ================= -->
<section class="banner-area">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-12 banner-right">
        <h1 class="text-white">
        My Profile
        </h1>
        <p class="mx-auto text-white  mt-20 mb-40">
          Welcome to EducationGive you lectures and Skation
        </p>
        <div class="link-nav">
          <span class="box">
            <a href="/HICMIS/student_panal/">Home </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="#">My Profile </a>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ End banner Area ================= -->
	<!-- Start post-content Area -->
	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget post-category-widget">
							<h4 class="category-title"><?php echo $std_single['name'] ?></h4>
							<ul class="cat-list">
								<li>
									<span class="d-flex justify-content-between">
										<p>Level</p>
										<p><?php echo $std_single['lev_name'] ?></p>
									</span>
								</li>
								<li>
									<span class="d-flex justify-content-between">
										<p>Code</p>
										<p><?php echo $std_single['code_st'] ?></p>
									</span>
								</li>
								<li>
									<span class="d-flex justify-content-between">
										<p>National</p>
										<p><?php echo $std_single['national'] ?></p>
									</span>
								</li>
								<li>
									<span class="d-flex justify-content-between">
										<p>Address</p>
										<p><?php echo $std_single['address'] ?></p>
									</span>
								</li>
								<li>
									<span class="d-flex justify-content-between">
										<p>Phone</p>
										<p><?php echo $std_single['phone'] ?></p>
									</span>
								</li>
								<li>
									<span class="d-flex justify-content-between">
										<p>Gender</p>
										<p><?php echo $std_single['gender'] ?></p>
									</span>
								</li>
								<li>
									<span class="d-flex justify-content-between">
										<p>Birthday</p>
										<p><?php echo $std_single['birthday'] ?></p>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End post-content Area -->
        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
