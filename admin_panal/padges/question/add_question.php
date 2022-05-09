<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
$exam = new Exam;
$displayExam = $exam->display();
$question = new Question;
if(isset($_POST['submit'])){
    $request = array(
        'question_title'=>  $_POST['question_title'],
        'answer_option'=>  $_POST['answer_option'],
        'option_title1'=>  $_POST['option_title1'],
        'option_title2'=>  $_POST['option_title2'],
        'option_title3'=>  $_POST['option_title3'],
        'option_title4'=>  $_POST['option_title4'],
        'exam_id'=> $_POST['exam_id'],
    );

 $question->store($request);

}
#########################################################
// <!-- Start head area -->
require_once PAGE_PATH."/../layouts/head.php";
    // <!-- Start Left menu area -->
require_once PAGE_PATH."/../layouts/sidebar.php"; 
        // <!-- start header area -->
require_once PAGE_PATH."/../layouts/header.php"; 
############################################################
?>

<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu" style="text-align: left;">
                                            <li><a href="/admin_panal/">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Add Exam</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start aleart area -->
        <?php if(!empty($exam->messErrors)): ?>
            <div class="container">
        <div class="alert alert-warning alert-success-style3 alert-success-stylenone">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
					<span class="icon-sc-cl" aria-hidden="true">×</span>
				</button>
            <?php foreach($exam->messErrors as $errors): ?>
            <i class="fa fa-exclamation-triangle edu-warning-danger admin-check-pro admin-check-pro-none" aria-hidden="true"></i>
            <p class="message-alert-none text-center"><strong>Warning!</strong> <?php echo  $errors ?></p>
            <?php endforeach ?>
        </div>
        </div>
        <?php endif ?>
        <!-- start aleart area -->
        <!-- end header area -->
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Basic Information</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="question_title" id="question_title" type="text" class="form-control" placeholder="question_title" value="<?php if(isset($_POST['question_title']))echo $_POST['question_title'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="exam_id" class="form-control">
                                                                    <option value="">Select Level</option>
                                                                    <?php foreach($displayExam as $item): ?>
                                                                        <option value="<?php echo $item['exam_id'] ?>"><?php echo $item['exam_title'] ?></option>
                                                                        <?php endforeach ?>																			
																		</select>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <select name="answer_option" class="form-control">
																		<option value="">Select answer_option</option>
																		<option value="1">Option 1</option>
																		<option value="2">Option 2</option>
																		<option value="3">Option 3</option>
																		<option value="4">Option 4</option>
																	</select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                    <input name="option_title1" id="option_title1" type="text" class="form-control" placeholder="option_title1" value="<?php if(isset($_POST['option_title1']))echo $_POST['option_title1'] ?>">
                                                                </div>
                                                            <div class="form-group">
                                                                    <input name="option_title2" id="option_title2" type="text" class="form-control" placeholder="option_title2" value="<?php if(isset($_POST['option_title2']))echo $_POST['option_title2'] ?>">
                                                                </div>
                                                            <div class="form-group">
                                                                    <input name="option_title3" id="option_title3" type="text" class="form-control" placeholder="option_title3" value="<?php if(isset($_POST['option_title3']))echo $_POST['option_title3'] ?>">
                                                                </div>
                                                            <div class="form-group">
                                                                    <input name="option_title4" id="option_title4" type="text" class="form-control" placeholder="option_title4" value="<?php if(isset($_POST['option_title4']))echo $_POST['option_title4'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
        <!-- <script type="text/javascript">
            $(document).on('change','.levels',function(){
            level = $(this).val();
            console.log(level);
            $.ajax({
                method:'POST',
                url:'/admin_panal/padges/exam/ajax.php',
                dataType: "json",
                data: {lev: level},
                success: function(data,status){
                    console.log(data);
                    console.log(status);
                    var subjects = '<option>-- Select Subject --</option>';
                    var arr = data.subject.length;
                    var aa = data.subject;
                   
                    for(var i=0;i<arr;i++){
                       subjects += '<option value="'+aa[i].id+'">'+aa[i].name+'</option>';
                    }
                    $(".subjects").html(subjects);
                }
            })
        });
        </script> -->