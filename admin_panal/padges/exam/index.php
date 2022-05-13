<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
$exam = new Exam;
$exam->checkDateEaxam();
$exams =  $exam->display();
$level = new Level;
$levels =  $level->display();
// **********************************************************//
// ******** change created exam ******** //
if(isset($_POST['pending'])){
    $exam_id = $_POST['exam_id'];
    $status = "created";
    $exam->status($exam_id,$status);
}
// **********************************************************//
// ******** change pending exam ******** //
if(isset($_POST['created'])){
    $exam_id = $_POST['exam_id'];
    $status = "pending";
    $exam->status($exam_id,$status);
}
// **********************************************************//
// ******** display exams index of level ******** //
if(isset($_GET['change'])){
    $level_id = $_GET['level'];
    $exams =  $exam->displayOfLevel($level_id);
}
// **********************************************************//
// ******** If delete, delete a exam ******** //
if(isset($_GET['destroy'])){
    $exam_id = $_GET['destroy'];
    $exam->destroy($exam_id);
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
                                            <li><span class="bread-blod">all Exam</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <form class="form-inline" method="GET">
                                    <?php foreach($levels as $item): ?>
                                    <label class="radio-inline">
                                    <input type="radio" name="level" id="inlineRadio1" value="<?php echo $item['id'] ?>"> <?php echo $item['name'] ?>
                                    </label>
                                    <?php endforeach ?>
                                    <button name="change" type="submit" class="btn btn-default">Implement</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header area -->
        <div class="product-status mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <h4>Departments List</h4>
                            <div class="add-product">
                               
                            </div>
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Expiry Date</th>
                                        <th>Duration</th>
                                        <th>Question</th>
                                        <th>No Question</th>
                                        <th>Status</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php
                                     foreach($exams as $item): 
                                        $quesCuont =  $exam->questionCount($item['exam_id'])['c'];
                                     ?>
                                    <tr>
                                        <td><?php echo $item['exam_id'] ?></td>
                                        <td><?php echo $item['exam_title'] ?></td>
                                        <td><?php echo date("Y-m-d h:i A", strtotime($item['created_at']))  ?></td>
                                        <td><?php echo date("Y-m-d h:i A", strtotime($item['exam_datetime']))  ?></td>
                                        <td><?php echo $item['exam_duration'] ?></td>
                                        <td><a href="/admin_panal/padges/question/index.php?ref=<?php echo $item['exam_id'] ?>"> show</a></td>
                                        <td><?php echo $quesCuont ." Of ". $item['total_question'] ?></td>
                                        <td><span class="ps-setting"><?php echo $item['status'] ?></span></td>
                                        <td>
                                            <?php if($item['total_question'] <= $quesCuont): ?>
                                            <form method="post">
                                                <?php if($item['status'] == "pending"): ?>
                                                    <input type="hidden" name="exam_id" value="<?php echo $item['exam_id'] ?>">
                                                    <button name="pending" class="btn btn-custon-rounded-three btn-success" ><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> created</button>
                                                    <?php elseif($item['status'] == "created"): ?>
                                                        <input type="hidden" name="exam_id" value="<?php echo $item['exam_id'] ?>">
                                                        <button name="created" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> pending</button>
                                                        <?php else: ?>
                                                            <a href="/admin_panal/padges/exam/result_exam.php?ref=<?php echo $item['exam_id'] ?>">Show Result</a>
                                                        <?php endif ?>
                                                    </form>
                                                    <?php else: ?>
                                                        <a data-toggle="tooltip" title="delete"href="?destroy=<?php echo $item['exam_id']?>" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    <?php endif ?>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- start footer area -->
        <?php  require_once PAGE_PATH."/../layouts/footer.php"; ?>
        <!-- end footer area -->
