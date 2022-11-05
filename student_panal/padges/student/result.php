<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
include PAGE_PATH."/../init.php";
new Auth;
    $student = new Student; 
    $result =  $student->result($_SESSION['code_std']);




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
        Result Exams
        </h1>
        <p class="mx-auto text-white  mt-20 mb-40">
          Welcome to EducationGive you lectures and Skation
        </p>
        <div class="link-nav">
          <span class="box">
            <a href="/student_panal/">Home </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="#">Result Exams </a>
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
							<h4 class="category-title">Result Your Exams</h4>
							<ul class="cat-list">
                                <?php foreach($result as $item): ?>
								<li>
									<span class="d-flex justify-content-between">
										<p><?php echo $item['exam_title'] ?></p>
										<p><?php echo $item['mark'] .' Of '. $item['total_question']  ?></p>
									</span>
								</li>
                                <?php endforeach ?>
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
