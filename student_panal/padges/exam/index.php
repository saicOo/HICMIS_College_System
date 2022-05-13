<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
$exam = new Exam;
if(isset($_GET['ref'])){
    $exam_id = $_GET['ref'];
    // **********************************************************//
// ******** If I click to finish the exam, it will return a value true ******** //
    $finish = isset($_POST['finish']) ? true : false;
    $exam->enrollExam($exam_id,$finish);
 // **********************************************************//
// ******** Make sure to return to the start page ******** //
    $page = isset($_GET['page'])?$_GET['page']:1;
    $examRow =  $exam->showExam($exam_id);
    // $page = $_GET['page'];
    // **********************************************************//
// ******** show single question index of exam and page ******** //
    $question = $exam->showQuestion($exam_id,$page);
    $ques_id = $question['question_id'];
    $option = $exam->option($ques_id);
    shuffle($option);
    if(empty($question) || empty($examRow)){
        $_SESSION['break'] = "A breach has occurred in the system, 
    and the error has been sent to the administrator";
      header('location:/student_panal/');
      exit;
    } 
}else{
    $_SESSION['break'] = "A breach has occurred in the system, 
    and the error has been sent to the administrator";
      header('location:/student_panal/');
      exit;
  }
// **********************************************************//
// ******** Go to the next page and save the answer ******** //
if(isset($_POST['next'])){
    $exam_id = $_GET['ref'];
    $page = $_GET['page'];
    $option =  $_POST['option'];
    $exam->saveAnswarNext($exam_id,$page,$ques_id,$option);
}
// **********************************************************//
// ******** Go to the previous page and save the answer ******** //
if(isset($_POST['prev'])){
    $exam_id = $_GET['ref'];
    $page = $_GET['page'];
    $option =  $_POST['option'];
    $exam->saveAnswarPrev($exam_id,$page,$ques_id,$option);
}

#########################################################
        // <!-- start header area -->
require_once PAGE_PATH."/../layouts/header.php"; 
############################################################
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');


.question{
    width: 75%;
}
.options{
    position: relative;
    padding-left: 40px;
}
#options label{
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    cursor: pointer;
}
.options input{
    opacity: 0;
}
.checkmark {
    position: absolute;
    top: -1px;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #04091e;
    border: 1px solid #ddd;
    border-radius: 50%;
}
.options input:checked ~ .checkmark:after {
    display: block;
}
.options .checkmark:after{
    content: "";
	width: 10px;
    height: 10px;
    display: block;
	background: white;
    position: absolute;
    top: 50%;
	left: 50%;
    border-radius: 50%;
    transform: translate(-50%,-50%) scale(0);
    transition: 300ms ease-in-out 0s;
}
.options input[type="radio"]:checked ~ .checkmark{
    background: #21bf73;
    transition: 300ms ease-in-out 0s;
}
.options input[type="radio"]:checked ~ .checkmark:after{
    transform: translate(-50%,-50%) scale(1);
}
.btn-primary{
    background-color: #04091e;
    color: #ddd;
    border: 1px solid #ddd;
}
.btn-primary:hover{
    background-color: #21bf73;
    border: 1px solid #21bf73;
}
.btn-success{
    padding: 5px 25px;
    background-color: #21bf73;
}
@media(max-width:576px){
    .question{
        width: 100%;
        word-spacing: 2px;
    } 
}
</style>
 <!-- ================ start banner Area ================= -->
 <section class="banner-area">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-12 banner-right">
        <h1 class="text-white">
        <?php echo $examRow['exam_title'] ?>
        </h1>
        <p class="mx-auto text-white  mt-20 mb-40" id="timer">
          
        </p>
        <div class="link-nav">
          <span class="box">
            <a href="/student_panal/">Home </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="#"><?php echo "Question" ." ". $page ?> </a>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ End banner Area ================= -->


<div class="whole-wrap mb-30">
<div class="container q mt-sm-5 my-1">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 mb-4 h4"><b><?php echo $question['question_title'] ?></b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            <form method="post">
            <label class="options"><?php echo $option[0]['option_title'] ?>
                <input type="radio" name="option" value="<?php echo $option[0]['option_number'] ?>"
                 <?php if( $exam->checkOption($question['question_id']) == $option[0]['option_number']) echo "checked"  ?> >
                <span class="checkmark"></span>
            </label>
            <label class="options"><?php echo $option[1]['option_title'] ?>
                <input type="radio" name="option" value="<?php echo $option[1]['option_number'] ?>"
                <?php if( $exam->checkOption($question['question_id']) == $option[1]['option_number']) echo "checked"  ?>>
                <span class="checkmark"></span>
            </label>
            <label class="options"><?php echo $option[2]['option_title'] ?>
                <input type="radio" name="option" value="<?php echo $option[2]['option_number'] ?>"
                <?php if( $exam->checkOption($question['question_id']) == $option[2]['option_number']) echo "checked"  ?>>
                <span class="checkmark"></span>
            </label>
            <label class="options"><?php echo $option[3]['option_title'] ?>
                <input type="radio" name="option" value="<?php echo $option[3]['option_number'] ?>"
                <?php if( $exam->checkOption($question['question_id']) == $option[3]['option_number']) echo "checked"  ?>>
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="d-flex align-items-center pt-3">
        <div id="prev">
            <button name="finish" class="btn btn-primary">Finish</button>
            <button name="prev" class="btn btn-primary">Previous</button>
        </div>
        <div class="ml-auto mr-sm-5">
            <button name="next" class="btn btn-success">Next</button>
        </div>
    </div>
    </form>
</div>
</div>

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
        <script type="text/javascript">
    
$(document).ready(function(){
    var endTime ="<?php echo $examRow['exam_duration'] ?>";
    var exam =<?php echo $examRow['exam_id'] ?>;
    setInterval(() => {
   
        $.ajax({
            url:"/student_panal/padges/exam/timerExam.php",
            method:"post",
            data:{duration:endTime,exam:exam},
            
            success:function(data){
                $("#timer").html(data);
            }
        });
    
    }, 1);
  });

</script>
