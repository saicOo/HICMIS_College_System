<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
include PAGE_PATH."/../init.php";
new Auth;
$exam = new Exam;

$exams= $exam->displayExam();

date_default_timezone_set('America/Los_Angeles');
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
        exams
        </h1>
        <p class="mx-auto text-white  mt-20 mb-40">
          Welcome to EducationGive you lectures and Skation
        </p>
        <div class="link-nav">
          <span class="box">
            <a href="/student_panal/">Home </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="#">exams </a>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ End banner Area ================= -->

  <!-- ================ Start Feature Area ================= -->
  <section class="other-feature-area">
      <div class="container">
        <div class="feature-inner row">
          <div class="col-lg-12">
            <div class="section-title text-left">
              <h2>
                Features That <br />
                Can Avail By Everyone
              </h2>
            </div>
          </div>
        <?php foreach($exams as $item): ?>
          <?php if(date("Y-m-d h:i A", strtotime($item['exam_datetime'])) >= date("Y-m-d h:i A") ): ?>
          <div class="col-lg-4 col-md-6">
            <div class="other-feature-item">
              <i class="ti-medall-alt"></i>
              <h4><?php echo $item['exam_title'] ?></h4>
              <div>
                <p>
                  <?php echo $item['total_question'] ?> Questions
                </p>
                <p>
                Exam Time <?php echo $item['exam_duration'] ?>
                </p>
              </div>
              <?php if($item['status'] === "created"): ?>
                <?php if($exam->checkEnroll($item['exam_id']) === "completed"): ?>
                <h5><span>Finish Exam !!!!</span></h5>
                <?php else: ?>

                <h5><a href="/student_panal/padges/exam/?ref=<?php echo $item['exam_id'] ."&page=1"?>">Start Exam</a></h5>

                <?php endif ?>


                <?php else: ?>
                  <h5><span>Waiting ... </span></h5>
                  <?php endif ?>
            </div>
          </div>
          <?php endif ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- ================ End Feature Area ================= -->

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
