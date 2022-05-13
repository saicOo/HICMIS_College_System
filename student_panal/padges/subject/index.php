<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
// ******** get method subject id  ********//
if(isset($_GET['ref'])){
    try{
      // ref_id =======> supject id
      $ref_id = $_GET['ref'];
      $presence = new Presence;
      $presence->addPresence($ref_id);
      
// ********** display all data Material index of Subject ***********//
    $material = new Material;
    $disblaymaterial = $material->display($ref_id);
  
// *********** get data  Subject and Level index of Material ***************//
    $subject = new Subject;
    $subjectRow = $subject->show($ref_id);
  
    $sub_name = $subjectRow['name'];
    $lev_name = $subjectRow['lev_name'];
    $lev_id = $subjectRow['lev_id'];
// **********************************************************//
// *********** get data  Lecture***************//
$lectures = new Lecture;

// **********************************************************//
if(empty($presence) || empty($disblaymaterial) || empty($subjectRow)){
  $_SESSION['break'] = "A breach has occurred in the system, 
and the error has been sent to the administrator";
header('location:/student_panal/');
exit;
}
}
catch(Exception $e) {
  $_SESSION['break'] = "A breach has occurred 
  in the system, and the error has been sent to 
  the administrator";
  header('location:/student_panal/');
  exit;
}
}else{
  $_SESSION['break'] = "A breach has occurred in the system, 
  and the error has been sent to the administrator";
    header('location:/student_panal/');
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
        <?php echo $subjectRow['name'] ?>
        </h1>
        <p class="mx-auto text-white  mt-20 mb-40">
          Welcome to EducationGive you lectures and Skation
        </p>
        <div class="link-nav">
          <span class="box">
            <a href="/student_panal/">Home </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="#"><?php echo $subjectRow['name'] ?> </a>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ End banner Area ================= -->


<div class="whole-wrap mb-30">
  <div class="container">
<div class="section-top-border">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">الموضوع</th>
      <th scope="col">تاريخ المحاضرة</th>
      <th scope="col">المحتوي</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($disblaymaterial as $item): ?>
    <tr>
      <th scope="row"><?php echo $item['description'] ?></th>
        <td><?php echo $item['date_mat'] ?></td>
    <td>
        <?php 
        $disblaylecture = $lectures->display($item['id']);
        foreach($disblaylecture as $lecture):
        ?>
      <a class="mr-4" href="/student_panal/padges/display/?ref=<?php echo $lecture['lecture_id']?>"><?php echo $lecture['type']?></a>
      <?php endforeach ?>
    </td>

    </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>
</div>
</div>

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
