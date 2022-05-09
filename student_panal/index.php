<?php
session_start();

function __autoload($class){
    require "controllers/".$class.".php";
}
new Auth;

$subject = new Subject;
$disblaySub = $subject->display($_SESSION['lev_id']);
#########################################
        // <!-- start header area -->
require_once "./layouts/header.php"; 
        // <!-- end header area -->
##########################################
?>
 <!-- ================ start banner Area ================= -->
 <section class="banner-area">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-12 banner-right">
        <h1 class="text-white">
        Home
        </h1>
        <p class="mx-auto text-white  mt-20 mb-40">
          Welcome to EducationGive you lectures and Skation
        </p>
        <div class="link-nav">
          <span class="box">
            <a href="/student_panal/">Home </a>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ End banner Area ================= -->
<section class="popular-course-area section-gap">
  <div class="container-fluid">
    <div class="row justify-content-center section-title">
      <div class="col-lg-12">
        <h2>
         HICMIS <br>
          
        </h2>
        <p>
          Dear children are students of the High Institute of Computing and Management Information Systems.
          Welcome to the website of the High Institute for Computing and Management Information Systems, wishing you success.
        </p>
      </div>
    </div>

    <div class="owl-carousel popuar-course-carusel owl-theme owl-loaded">
    <?php foreach($disblaySub as $item): ?>
      <div class="single-popular-course">
        <div class="thumb">
          <img class="f-img img-fluid mx-auto" src="assets/img/h2.webp" alt="" />
        </div>
        <div class="details">
          <div class="d-flex justify-content-between mb-20">
            <p class="name"><?php echo date("Y/m/d h:i A", strtotime($item['pres_date'])) ?>  اخر دخول للطالب</p>
          </div>
          <a href="/student_panal/padges/subject/?ref=<?php echo $item['id'] ?>">
              <h4><?php echo $item['name'] ?></h4>
            </a>
              <div class="bottom d-flex mt-15">
                <p class="ml-20"><?php echo $subject->countMaterial($item['id']) ?> عدد المحاضرات</p>
              </div>
            </div>
      </div>
      <?php endforeach ?>
      <div class="single-popular-course">
        <div class="thumb">
          <img class="f-img img-fluid mx-auto" src="assets/img/h2.webp" alt="" />
        </div>
        <div class="details">
          <div class="d-flex justify-content-between mb-20">
          </div>
          <a href="/student_panal/padges/exam/?ref=1">
              <h4>اختبار الامتحانات</h4>
            </a>
              <div class="bottom d-flex mt-15">
              </div>
            </div>
      </div>
  </div>
</section>
        <!-- start footer area -->
        <?php  require_once "./layouts/footer.php"; ?>
        <!-- end footer area -->
