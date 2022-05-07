<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;

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
        <?php echo "test" ?>
        </h1>
        <p class="mx-auto text-white  mt-20 mb-40">
          Welcome to EducationGive you lectures and Skation
        </p>
        <div class="link-nav">
          <span class="box">
            <a href="/student_panal/">Home </a>
            <i class="lnr lnr-arrow-right"></i>
            <a href="#"><?php echo "test" ?> </a>
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
        <div class="py-2 mb-4 h4"><b>Q. which option best describes your job role?</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            <form method="post">
            <label class="options">Small Business Owner or Employee
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
            <label class="options">Nonprofit Owner or Employee
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
            <label class="options">Journalist or Activist
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
            <label class="options">Other
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>
    <div class="d-flex align-items-center pt-3">
        <div id="prev">
            <button class="btn btn-primary">Previous</button>
        </div>
        <div class="ml-auto mr-sm-5">
            <button class="btn btn-success">Next</button>
        </div>
    </div>
    </form>
</div>
</div>

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
