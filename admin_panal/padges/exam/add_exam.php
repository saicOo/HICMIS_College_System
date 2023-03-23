<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
include PAGE_PATH."/../init.php";
new Auth;
$Level = new Level;
// get all levels
$displayLev = $Level->display();
$exam = new Exam;
// store new exam
if(isset($_POST['submit'])){
    $sub_id = isset($_POST['sub_id']) ?$_POST['sub_id'] :"";
    $request = array(
        'title'=>  $_POST['title'],
        'exam_datetime'=>  $_POST['exam_datetime'],
        'duration'=>  $_POST['duration'],
        'total_question'=>  $_POST['total_question'],
        'lev_id'=> $_POST['lev_id'],
        'sub_id'=>  $sub_id,
    );
 $exam->store($request);
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
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload" autocomplete="off">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="title" id="title" type="text" class="form-control" placeholder="title" autofocus value="<?php if(isset($_POST['title']))echo $_POST['title'] ?>">
                                                                </div>
                                                                <div class="form-group " >
                                                                    <label>Date Expire Exam</label>
                                                                    <div >
                                                                        <input name="exam_datetime" type="datetime-local" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="duration" class="form-control">
																		<option value="">Select duration</option>
																		<option value="5 Minute">5 Minute</option>
																		<option value="30 Minute">30 Minute</option>
																		<option value="1 hour">1 Hour</option>
																		<option value="2 hour">2 Hour</option>
																	</select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                    <select name="lev_id" id="level" class="form-control levels">
                                                                    <option value="">Select Level</option>
                                                                    <?php foreach($displayLev as $item): ?>
                                                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                        <?php endforeach ?>																			
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="sub_id" class="form-control subjects">
                                                                    <option>-- Select Subject --</option>														
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="total_question" class="form-control">
																		<option value="">Select Total Question</option>
																		<option value="5">5 Question</option>
																		<option value="10">10 Question</option>
																		<option value="15">15 Question</option>
																		<option value="20">20 Question</option>
																	</select>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                                                                    
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

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
        <script type="text/javascript">
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
</script>