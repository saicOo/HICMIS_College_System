<?php
session_start();
define("PAGE_PATH",dirname(__DIR__));
function __autoload($class){
    require PAGE_PATH."/../controllers/".$class.".php";
}
new Auth;
$exam = new Exam;
$exams =  $exam->display();

if(isset($_POST['not-accept'])){
    $code_std = $_POST['code'];
    $accepted = "not accept";
    $exam->accepted($code_std,$accepted);
}
if(isset($_POST['accept'])){
    $code_std = $_POST['code'];
    $accepted = "accept";
    $exam->accepted($code_std,$accepted);
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
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">>
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
                                        <th>datetime</th>
                                        <th>duration</th>
                                        <th>No Question</th>
                                        <th>status</th>
                                        <th>Setting</th>
                                    </tr>
                                    <?php
                                     foreach($exams as $item): ?>
                                    <tr>
                                        <td><?php echo $item['exam_id'] ?></td>
                                        <td><?php echo $item['exam_title'] ?></td>
                                        <td><?php echo $item['exam_datetime'] ?></td>
                                        <td><?php echo $item['exam_duration'] ?></td>
                                        <td><?php echo $item['total_question'] ?> Question</td>
                                        <td><?php echo $item['status'] ?></td>
                                        <td>
                                            <form method="post">
                                                <?php if($item['status'] == "pending"): ?>
                                                    <input type="hidden" name="status" value="<?php echo $item['pending'] ?>">
                                                    <button name="pending" class="btn btn-custon-rounded-three btn-success" ><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> pending</button>
                                                    <?php else: ?>
                                                        <input type="hidden" name="status" value="<?php echo $item['completed'] ?>">
                                                        <button name="completed" class="btn btn-custon-rounded-three btn-danger"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> completed</button>
                                                        <?php endif ?>
                                            </form>
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
