<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
// ******** get method material id  ********//
if(isset($_GET['ref'])){
    try{
// ********** display all data Lecture index of Material ***********//
    $lecture_id = $_GET['ref'];
    $lecture = new Lecture;
    $lectRow = $lecture->show($lecture_id);
    $mate_id = $lectRow['material_id'];
    // *********** get data  Material and Subject index of Lecture ***************//
    $material = new Material;
    $mateRow = $material->show($mate_id);
    if(empty($mateRow) || empty($lectRow)){
        $_SESSION['break'] = "A breach has occurred in the system, 
    and the error has been sent to the administrator";
      header('location:/HICMIS/student_panal/');
      exit;
    } 
    
    $material_name = $mateRow['description'];
    $sub_name = $mateRow['name'];
    $sub_id = $mateRow['sub_id'];
    $lev_id = $mateRow['lev_id'];
    $lev_name = $mateRow['lev_name'];
}
catch(Exception $e) {
    $_SESSION['break'] = "A breach has occurred 
    in the system, and the error has been sent to 
    the administrator";
    header('location:/HICMIS/student_panal/');
    exit;
  }
  }else{
    $_SESSION['break'] = "A breach has occurred in the system, 
    and the error has been sent to the administrator";
      header('location:/HICMIS/student_panal/');
      exit;
  }
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
        <?php echo $mateRow['description'] . " <i class='lnr lnr-arrow-right'></i> " . $lectRow['type']?>
        </h1>
        <p class="mx-auto text-white  mt-20 mb-40">
          Welcome to EducationGive you lectures and Skation
        </p>
        <div class="link-nav">
          <span class="box">
            <a href="/HICMIS/student_panal/">Home </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="/HICMIS/student_panal/padges/subject/?ref=<?php echo  $mateRow['sub_id'] ?>"><?php echo $mateRow['name'] ?> </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="#"><?php echo $mateRow['description'] ?> </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="#"><?php echo $lectRow['type'] ?> </a>
           
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ End banner Area ================= -->


<section class="course-details-area section-gap">
  <div class="container">
      <div class="row">
          <div class="col-lg-8 course-details-left">
              <div class="main-image">
                <video width="100%" height="100%" controls  poster="../../assets/img/h2.webp">
                  <source src="../../../upload/<?php echo $lev_name .'/'. $mateRow['name'] .'/'. $mateRow['description'] .'/'. $lectRow['lecture_name'] ?>" type="video/mp4">
                
           
                </video>
              </div>
            
          </div>


          <div class="col-lg-4 right-contents">
              <ul>
                  <li>
                      <a class="justify-content-between d-flex" href="#">
                          <p>Subject</p>
                          <span><?php echo $mateRow['name'] ?></span>
                      </a>
                  </li>
                  <li>
                      <a class="justify-content-between d-flex" href="#">
                          <p>Material</p>
                          <span><?php echo $mateRow['description'] ?></span>
                      </a>
                  </li>
                  <li>
                      <a class="justify-content-between d-flex" href="#">
                          <p>Type </p>
                          <span><?php echo $lectRow['type'] ?></span>
                      </a>
                  </li>
                  <li>
                      <a class="justify-content-between d-flex" href="#">
                          <p>Date</p>
                          <span><?php echo $mateRow['date_mat'] ?></span>
                      </a>
                  </li>
                  <li>
                      <a class="justify-content-between d-flex" href="#">
                          <p>Time </p>
                          <span><?php echo $lectRow['date_lec'] ?></span>
                      </a>
                  </li>
                 
              </ul>
          

             
          </div>
      </div>
  </div>
</section>

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->

        